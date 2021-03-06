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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users','UserController@index')->name('users.index');
Route::post('/user/register','UserController@store')->name('user.register');
Route::get('/user/edit','UserController@edit')->name('user.edit');
Route::put('/user/update','UserController@update')->name('user.update');
Route::delete('/user/delete','UserController@delete')->name('user.delete');
