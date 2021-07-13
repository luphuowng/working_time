<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DayoffController;

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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group([
], function ($router){

    Route::get('/cancel-dayoff/{id}', [DayoffController::class, 'getCancel']);
    Route::post('/approved-dayoff/{id}', [DayoffController::class, 'ApprovedDayOff']);
    Route::post('/dayoff-update/{id}', [DayoffController::class, 'updateDayOff']);
    Route::get('/dayoff-show/{id}', [DayoffController::class, 'showDayOff']);
    Route::get('/dayoff-edit/{id}', [DayoffController::class, 'editDayOff']);
    Route::get('/get-data', [DayoffController::class, 'getData']);
    Route::get('/approved', [DayoffController::class, 'getApproved']);
    Route::post('/dayoff-register', [DayoffController::class, 'postDayOff']);
    Route::get('/report', [DayoffController::class, 'getReport']);
    Route::get('/export', [DayoffController::class, 'export']);
});




