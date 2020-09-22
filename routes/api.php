<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::resource('/projects', 'ProjectController');
// Route::resource('/dailytimesheet','DailyTimesheetController');
Route::get('/projects', 'ProjectController@index');

Route::get('/dailytimesheet', 'DailyTimesheetController@index');
Route::get('/dailytimesheet/create', 'DailyTimesheetController@create');
Route::post('/dailytimesheet', 'DailyTimesheetController@store');
Route::get('dailytimesheet/{id}', 'DailyTimesheetController@show');
Route::get('dailytimesheet/{id}/edit', 'DailyTimesheetController@edit');
Route::post('/dailytimesheet/{id}', 'DailyTimesheetController@update');
