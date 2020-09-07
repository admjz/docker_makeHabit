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

Route::get('/', 'HabitController@index');

Auth::routes();

Route::get('/home', 'HabitController@index')->name('home');

Route::resource('habit', 'HabitController');

Route::resource('execution', 'ExecutionController', ['only' => ['store', 'edit', 'update', 'destroy']]);

Route::post('guest', 'Auth\LoginController@guestLogin')->name('login.guest');
