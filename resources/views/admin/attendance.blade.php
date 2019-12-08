@extends('layouts.main')



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Attendance</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Attendance</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </thead>
                            <tbody>
                                @foreach( $attendances as $attendance)

                                <tr>
                                    <td>{{$attendance->attendance_date}}</td>
                                    <td>{{$attendance->user_id}}</td>
                                    <td>{{$attendance->user->name}}</td>
                                    <td>{{$attendance->attendance_time}}
                                        @if( $attendance->status == 1 )
                                        <span class="label label-warning pull-right">ontime</span>
                                        @else
                                        <span class="label label-danger pull-right">late</span>
                                        @endif
                                    </td>
                                    <td>{{$attendance->user->schedules->first()->time_in}} </td>
                                    <td>{{$attendance->user->schedules->first()->time_out}}</td>
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
