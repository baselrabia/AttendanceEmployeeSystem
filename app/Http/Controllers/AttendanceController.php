<?php

namespace App\Http\Controllers;

use DateTime;
use App\User;
use App\Latetime;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attendance')->with(['attendances'=> Attendance::all()]);
    }

    /**
     * Display a listing of the latetime.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLatetime()
    {
        return view('admin.latetime')->with(['latetimes' => Latetime::all()]);
    }



    /**
     * assign attendance to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request)
    {
        request()->validate([
            'email' => 'required|string|email|max:255|exists:users',
            'pin_code' => 'required|numeric|min:4',
        ]);



        if ($employee = User::whereEmail(request('email'))->first()){

            if (Hash::check($request->pin_code, $employee->pin_code)) {
                    if (!Attendance::whereAttendance_date(date("Y-m-d"))->whereUser_id($employee->id)->first()){
                        $attendance = new Attendance;
                        $attendance->user_id = $employee->id;
                        $attendance->attendance_time = date("H:i:s");
                        $attendance->attendance_date = date("Y-m-d");

                        if (!($employee->schedules->first()->time_in >= $attendance->attendance_time)){
                            $attendance->status = 0;
                        AttendanceController::lateTime($employee);
                        }
                        $attendance->save();

                    }else{
                        return redirect()->route('attendance.login')->with('error', 'you assigned your attendance before');
                    }
                } else {
                return redirect()->route('attendance.login')->with('error', 'Failed to assign the attendance');
            }
        }



        return redirect()->route('home')->with('success', 'Successful in assign the attendance');
    }

    /**
     * assign late time for attendace .
     *
     * @return \Illuminate\Http\Response
     */
    public function lateTime(User $employee)
    {
        $current_t= new DateTime(date("H:i:s"));
        $start_t= new DateTime($employee->schedules->first()->time_in);
        $difference = $start_t->diff($current_t)->format('%H:%I:%S');


        $latetime = new Latetime;
        $latetime->user_id = $employee->id;
        $latetime->duration   = $difference;
        $latetime->latetime_date  = date("Y-m-d");
        $latetime->save();

    }


}
