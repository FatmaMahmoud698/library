<?php

use Illuminate\Support\facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/authors','ApiAuthorController@index');
Route::get('/authors/show/{id}','ApiAuthorController@show');
Route::middleware('UserAuth')->group(function(){
	Route::post('/authors/store','ApiAuthorController@store');
	Route::post('/authors/update/{id}','ApiAuthorController@update');
	Route::get('/authors/delete/{id}','ApiAuthorController@delete');
});