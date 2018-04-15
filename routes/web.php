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


Route::get('/doctor','DoctorController@index')->name('doctor.index');
Route::get('/doctor/create','DoctorController@create')->name('doctor.create');
Route::get('/doctor/edit/{id}','DoctorController@edit')->name('doctor.edit');
Route::post('/doctor/store','DoctorController@store')->name('doctor.store');
Route::patch('/doctor/update/{id}','DoctorController@update')->name('doctor.update');
Route::post('/doctor/delete','DoctorController@destroy')->name('doctor.delete');

Route::get('/patient','PatientController@index')->name('patient.index');
Route::get('/patient/create','PatientController@create')->name('patient.create');
Route::get('/patient/edit/{id}','PatientController@edit')->name('patient.edit');
Route::post('/patient/store','PatientController@store')->name('patient.store');
Route::patch('/patient/update/{id}','PatientController@update')->name('patient.update');
Route::post('/patient/delete','PatientController@destroy')->name('patient.delete');


Route::get('/scheduling','SchedulingController@index')->name('scheduling.index');
Route::get('/scheduling/create','SchedulingController@create')->name('scheduling.create');
Route::get('/scheduling/edit/{id}','SchedulingController@edit')->name('scheduling.edit');
Route::post('/scheduling/store','SchedulingController@store')->name('scheduling.store');
Route::patch('/scheduling/update/{id}','SchedulingController@update')->name('scheduling.update');
Route::post('/scheduling/delete','SchedulingController@destroy')->name('scheduling.delete');
Route::get('/scheduling/jsonPatient','SchedulingController@getJsonPatient')->name('patient.jsonPatient');
Route::get('/scheduling/jsonDoctor','SchedulingController@getJsonDoctor')->name('patient.jsonDoctor');



Route::get('/user','UserController@index')->name('user.index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/store','UserController@store')->name('user.store');
Route::patch('/user/update/{id}','UserController@update')->name('user.update');
Route::post('/user/delete','UserController@destroy')->name('user.delete');

Route::get('/role','RoleController@index')->name('role.index');
Route::get('/role/create','RoleController@create')->name('role.create');
Route::get('/role/edit/{id}','RoleController@edit')->name('role.edit');
Route::post('/role/store','RoleController@store')->name('role.store');
Route::patch('/role/update/{id}','RoleController@update')->name('role.update');
Route::post('/role/delete','RoleController@destroy')->name('role.delete');

Route::get('/permission','PermissionController@index')->name('permission.index');
Route::get('/permission/create','PermissionController@create')->name('permission.create');
Route::get('/permission/edit/{id}','PermissionController@edit')->name('permission.edit');
Route::post('/permission/store','PermissionController@store')->name('permission.store');
Route::patch('/permission/update/{id}','PermissionController@update')->name('permission.update');
Route::post('/permission/delete','PermissionController@destroy')->name('permission.delete');


