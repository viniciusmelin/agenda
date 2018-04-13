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

Route::get('/patient','PatientController@index')->name('patient.index');
Route::get('/patient/create','PatientController@create')->name('patient.create');
