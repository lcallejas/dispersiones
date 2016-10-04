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

Route::resource('/','LogController');
Route::resource('login','FrontController');
Route::resource('logout','FrontController@logout');
/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
Route::resource('user','UserController');
/*
|--------------------------------------------------------------------------
| Companies
|--------------------------------------------------------------------------
*/
Route::resource('company','CompanyController');
/*
|--------------------------------------------------------------------------
| Direct Movement
|--------------------------------------------------------------------------
*/
Route::get('directmov/dispersers/{id}','DirectMovController@createDispersers');
Route::resource('directmov','DirectMovController');
