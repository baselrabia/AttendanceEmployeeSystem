@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Leave
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Leave</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="/leave/assign" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Leave</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </thead>
                            <tbody>
                                @foreach( $leaves as $leave)

                                <tr>
                                    <td>{{$leave->leave_date}}</td>
                                    <td>{{$leave->user_id}}</td>
                                    <td>{{$leave->user->name}}</td>
                                    <td>{{$leave->leave_time}}
                                        @if( $leave->status == 1 )
                                        <span class="label label-warning pull-right">On Time</span>
                                        @else
                                        <span class="label label-danger pull-right">Early Go</span>
                                        @endif
                                    </td>
                                    <td>{{$leave->user->schedules->first()->time_in}} </td>
                                    <td>{{$leave->user->schedules->first()->time_out}}</td>
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
