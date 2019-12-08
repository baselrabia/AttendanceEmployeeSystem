@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            OverTime
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">OverTime</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="/leave" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"> <b>Leave Table</b></a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>overtime</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </thead>
                            <tbody>
                                @foreach( $overtimes as $overtime)

                                <tr>
                                    <td>{{$overtime->overtime_date}}</td>
                                    <td>{{$overtime->user_id}}</td>
                                    <td>{{$overtime->user->name}}</td>
                                    <td>{{$overtime->duration}} </td>
                                    <td>{{$overtime->user->schedules->first()->time_in}} </td>
                                    <td>{{$overtime->user->schedules->first()->time_out}}</td>
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
