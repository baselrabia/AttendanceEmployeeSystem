<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Check;

class CheckController extends Controller
{
    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.check')->with(['checks' => Check::all()]);
    }

}
