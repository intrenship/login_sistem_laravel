<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/utama', 'CrudController@utama');
Route::get('/add', 'CrudController@create');
Route::post('/store', 'CrudController@store');
Route::get('/read/{id}', 'CrudController@show');
Route::get('/edit/{id}', 'CrudController@edit');
Route::post('/update/{id}', 'CrudController@update');
Route::get('/delete/{id}', 'CrudController@destroy');
