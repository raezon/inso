<?php

use App\Events\Hello;
use App\Http\Controllers\API\Core\AccountsController;
use App\Http\Controllers\API\Core\HospitalController;
use App\Http\Controllers\API\Core\RequestUsersController;
use App\Http\Controllers\API\Core\SpecialityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use Illuminate\Support\Facades\Session;

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



Route::middleware('auth:sanctum')->group(function () {
    Route::resource('account', AccountsController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('request-user', RequestUsersController::class);
    Route::resource('speciality', SpecialityController::class);
});
