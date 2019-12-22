@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Checks
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Checks</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="/attendance/assign" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Attendance</th>
                                <th>Leave</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </thead>
                            <tbody>
                                @foreach( $checks as $check)

                                <tr>


                                    <td>{{substr($check->attendance_time, 0, 10)}}</td>
                                    <td>{{$check->user_id}}</td>
                                    <td>{{$check->user->name}}</td>
                                    <td>{{substr($check->attendance_time, 10)}}</td>
                                    <td>{{substr($check->leave_time, 10)}}</td>
                                    <td>{{$check->user->schedules->first()->time_in}} </td>
                                    <td>{{$check->user->schedules->first()->time_out}}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
