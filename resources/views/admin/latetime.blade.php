@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LateTime
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">LateTime</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="/attendance" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><b>Attendance Table</b></a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Late Time Duration</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </thead>
                            <tbody>
                                @foreach($latetimes as $latetime)

                                <tr>
                                    <td>{{$latetime->latetime_date}}</td>
                                    <td>{{$latetime->user_id}}</td>
                                    <td>{{$latetime->user->name}}</td>
                                    <td>{{$latetime->duration}}</td>
                                    <td>{{$latetime->user->schedules->first()->time_in}} </td>
                                    <td>{{$latetime->user->schedules->first()->time_out}}</td>
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
