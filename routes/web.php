<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['admin']], function () {
    Route::resource('/employees', 'EmployeeController');

    Route::get('/attendance', 'AttendanceController@index')->name('attendance');
    Route::get('/latetime', 'AttendanceController@indexLatetime')->name('indexLatetime');
    Route::get('/leave', 'LeaveController@index')->name('leave');
    Route::get('/overtime', 'LeaveController@indexOvertime')->name('indexOvertime');

    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::resource('/schedule', 'ScheduleController');




});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');



    Route::resource('/employees', 'EmployeeController', ['only' => [
        'show', 'index',
    ]]);

});

Route::get('/attendance/assign', function () {
    return view('attendance_leave_login');
})->name('attendance.login');

Route::post('/attendance/assign', 'AttendanceController@assign')->name('attendance.assign');


Route::get('/leave/assign', function () {
    return view('attendance_leave_login');
})->name('leave.login');

Route::post('/leave/assign', 'LeaveController@assign')->name('leave.assign');
