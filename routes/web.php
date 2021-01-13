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




Route::get('/students', 'StudentController@index')->name('students');
Route::get('/addstudent', 'StudentController@create')->name('addstudent');
Route::post('/addstudent', 'StudentController@store');
Route::get('/student/{id}', 'StudentController@show')->name('student.show');
Route::delete('/student/{id}', 'StudentController@destroy')->name('student.destroy');
Route::put('/editstudent/{id}', 'StudentController@update')->name('student.update');




Auth::routes();



Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', 'HomeController@welcomeindex');
