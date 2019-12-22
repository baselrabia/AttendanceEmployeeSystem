<?php

namespace App\Http\Controllers;

use App\User;
use App\Attendance;
use App\Check;
use App\Leave;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AttendanceEmp;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    /**
     * assign checks for attendance and leave for the employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(AttendanceEmp $request)
    {
        $request->validated();

        if ($employee = User::whereEmail(request('email'))->first()) {

            if (Hash::check($request->pin_code, $employee->pin_code)) {




                if(null == Check::whereUser_id($employee->id)->latest()->first()){
                    ApiController::newAttandance($employee);
                }else{
                    
                    if(Check::whereUser_id($employee->id)->latest()->first()->leave_time !== null){
                        ApiController::newAttandance($employee);
                    } else {
                        $check = Check::whereUser_id($employee->id)->latest()->first();
                        $check->leave_time = date("Y-m-d H:i:s");
                        $check->save();
                        return response()->json(['success' => 'Successful in assign the leave'], 200);
                    }

                }

            } else {
                return response()->json(['error' => 'Failed to assign the attendance'], 404);
            }
        }
        return response()->json(['success' => 'Successful in assign the attendance'], 200);
    }

    /**
     * create new attendance.
     * @param  user  $employee
     * @return \Illuminate\Http\Response
     */
    public function newAttandance($employee){
        $check = new Check;
        $check->user_id = $employee->id;
        $check->attendance_time = date("Y-m-d H:i:s");
        $check->leave_time = null;
        $check->save();
    }



    /**
     * assign attendance to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attendance(AttendanceEmp $request)
    {
         $request->validated();

        if ($employee = User::whereEmail(request('email'))->first()) {

            if (Hash::check($request->pin_code, $employee->pin_code)) {
                if (!Attendance::whereAttendance_date(date("Y-m-d"))->whereUser_id($employee->id)->first()) {
                    $attendance = new Attendance;
                    $attendance->user_id = $employee->id;
                    $attendance->attendance_time = date("H:i:s");
                    $attendance->attendance_date = date("Y-m-d");

                    if (!($employee->schedules->first()->time_in >= $attendance->attendance_time)) {
                        $attendance->status = 0;
                        AttendanceController::lateTime($employee);
                    };

                    $attendance->save();
                 } else {
                    return response()->json(['error' => 'you assigned your attendance before'], 404);
                }
            } else {
                return response()->json(['error' => 'Failed to assign the attendance'], 404);
            }
        }
        return response()->json(['success' => 'Successful in assign the attendance'], 200);

    }


    /**
     * assign leave to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function leave(AttendanceEmp $request)
    {
        $request->validated();

        if ($employee = User::whereEmail(request('email'))->first()) {

            if (Hash::check($request->pin_code, $employee->pin_code)) {
                if (!Leave::whereLeave_date(date("Y-m-d"))->whereUser_id($employee->id)->first()) {
                    $leave = new Leave;
                    $leave->user_id = $employee->id;
                    $leave->leave_time = date("H:i:s");
                    $leave->leave_date = date("Y-m-d");
                    // ontime + overtime if true , else "early go" ....
                    if ($leave->leave_time >= $employee->schedules->first()->time_out) {
                        leaveController::overTime($employee);
                    } else {
                        $leave->status = 0;
                    }

                    $leave->save();
                } else {
                    return response()->json(['error' => 'you assigned your leave before'], 404);
                }
            } else {
                return response()->json(['error' => 'Failed to assign the leave'], 404);
            }
        }

        return response()->json(['success' => 'Successful in assign the leave'], 200);
    }

}
