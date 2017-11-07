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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('timeslots', 'TimeslotController');

Route::resource('students', 'StudentController');

Route::resource('groups', 'GroupController');

Route::resource('attendance', 'AttendanceController',['except'=>['show','destroy']]);
Route::get('attendance/display','AttendanceController@display')->name('attendance.display');
Route::get('attendance/delete}','AttendanceController@delete')->name('attendance.delete');
Route::delete('attendance/{student_id}/{time_id}', 'AttendanceController@demolish')->name('attendance.demolish');

Route::resource('faculty', 'FacultyController');

