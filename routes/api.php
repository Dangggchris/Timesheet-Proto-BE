<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DailyTimesheetController;
use App\Http\Controllers\ProjectsController;
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

Route::middleware('Cors')->post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', [ProjectsController::class, 'index']);

Route::get('/dailytimesheet', [DailyTimesheetController::class, 'index']);
Route::get('/dailytimesheet/{userID}/{date}', [DailyTimesheetController::class, 'allTimesheetForOneUser']);
Route::post('/dailytimesheet', [DailyTimesheetController::class, 'store']);
Route::get('dailytimesheet/{id}', [DailyTimesheetController::class, 'show']);
Route::post('/dailytimesheet/{id}', [DailyTimesheetController::class, 'update']);
