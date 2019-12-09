<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Schedule;
use App\Http\Requests\EmployeeRec;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee')->with(['employees'=> User::all(), 'schedules'=>Schedule::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRec $request)
    {
        $request->validated();

        $employee = new User;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->pin_code = bcrypt($request->pin_code);
        $employee->save();

        if($request->schedule){

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }

        $role = Role::whereSlug('emp')->first();

        $employee->roles()->attach($role);



        return redirect()->route('employees.index')->with('success', 'Employee Has Been Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRec $request, User $employee)
    {
        $request->validated();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->pin_code = bcrypt($request->pin_code);
        $employee->save();

        if ($request->schedule) {

            $employee->schedules()->detach();

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }



        return redirect()->route('employees.index')->with('success', 'Employee Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Has Been Deleted Successfully');
    }
}
