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

Route::get('/','CarController@index');
Route::resource('/cars','CarController');
Route::post('/cars','CarController@index')->name('cars.index');
Route::post('/add/car','CarController@store')->name('cars.store');
Route::resource('/commands','CommandController');
Route::get('/commands/{id}/create','CommandController@create')->name('command.create');

Route::delete('/commands/{commandId}/{carId}/delete','CommandController@deleteUserCommands')->name('commands.delete');

Route::get('/login','UsersController@login')->name('users.login');
Route::post('/auth','UsersController@auth')->name('users.auth');
Route::post('/logout','UsersController@logout')->name('users.logout');
Route::get('/register','UsersController@create')->name('users.register');
Route::post('/register','UsersController@register')->name('users.register');
Route::get('/user/{id}/profile','UsersController@show')->name('users.profile');
Route::get('/admin','adminsController@index')->name('admins.index');
