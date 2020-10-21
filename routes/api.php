<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DailyTimesheetController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AdminController;
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

Route::put('/admin/newproject', [AdminController::class, 'newProject']);
Route::put('/admin/uid={userID}/pid={projectID}', [AdminController::class, 'attachProjectToUser']);

Route::get('/projects', [ProjectsController::class, 'index']);
Route::get('/projects/{userID}', [ProjectsController::class, 'getAllProjectsForOneUser']);

Route::get('/dailytimesheet', [DailyTimesheetController::class, 'index']);
Route::get('/dailytimesheet/userid={userID}', [DailyTimesheetController::class, 'allTimesheetsForOneUser']);
Route::get('/dailytimesheet/userid={userID}/{date}', [DailyTimesheetController::class, 'allTimesheetForOneUserForDay']);
Route::get('dailytimesheet/{id}', [DailyTimesheetController::class, 'show']);
Route::put('/dailytimesheet/userid={userID}/projectid={projectID}', [DailyTimesheetController::class, 'updateOrCreate']);
