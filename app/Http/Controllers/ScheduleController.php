<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Http\Requests\ScheduleEmp;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schedule')->with('schedules', Schedule::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleEmp $request)
    {
        $request->validated();

        $schedule = new schedule;
        $schedule->slug = $request->slug;
        $schedule->time_in = $request->time_in;
        $schedule->time_out = $request->time_out;
        $schedule->save();





        return redirect()->route('schedule.index')->with('success', 'Schedule Has Been Created Successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleEmp $request, Schedule $schedule)
    {
        $request['time_in'] = str_split($request->time_in, 5)[0];
        $request['time_out'] = str_split($request->time_out, 5)[0];

        $request->validated();

        $schedule->slug = $request->slug;
        $schedule->time_in = $request->time_in;
        $schedule->time_out = $request->time_out;
        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule Has Been Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'schedule Has Been Deleted Successfully');
    }
}
