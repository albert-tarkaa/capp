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


Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::resource('categories','CategoryController');
Route::resource('attendance','AttendanceController');
Route::resource('entries','EntryController'); 
Route::get('entries/getCategory/{id}', 'EntryController@getCategory');
Route::post('attendance/show', 'AttendanceController@records');
Route::resource('members','memberController'); 