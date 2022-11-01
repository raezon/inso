<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\System\AuthController;
use App\Http\Controllers\API\System\RoleController;
use App\Http\Controllers\API\System\UserController;
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


Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
