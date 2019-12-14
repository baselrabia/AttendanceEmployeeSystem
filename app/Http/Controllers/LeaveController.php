<?php

namespace App\Http\Controllers;

use DateTime;
use App\User;
use App\Overtime;
use App\Leave;
use App\Http\Requests\AttendanceEmp;
use Illuminate\Support\Facades\Hash;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.leave')->with(['leaves' => Leave::all()]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOvertime()
    {
        return view('admin.overtime')->with(['overtimes' => Overtime::all()]);
    }



    /**
     * assign leave to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(AttendanceEmp $request)
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
                    if ($leave->leave_time >= $employee->schedules->first()->time_out ) {
                        leaveController::overTime($employee);
                    }else{
                        $leave->status = 0;
                    }

                    $leave->save();
                } else {
                    return redirect()->route('leave.login')->with('error', 'you assigned your leave before');
                }
            } else {
                return redirect()->route('leave.login')->with('error', 'Failed to assign the leave');
            }
        }



        return redirect()->route('home')->with('success', 'Successful in assign the leave');
    }

    /**
     * assign over time for leave .
     *
     * @return \Illuminate\Http\Response
     */
    public static function overTime(User $employee)
    {
        $current_t = new DateTime(date("H:i:s"));
        $start_t = new DateTime($employee->schedules->first()->time_out);
        $difference = $start_t->diff($current_t)->format('%H:%I:%S');

        $overtime = new Overtime;
        $overtime->user_id = $employee->id;
        $overtime->duration   = $difference;
        $overtime->overtime_date  = date("Y-m-d");
        $overtime->save();
    }
}
