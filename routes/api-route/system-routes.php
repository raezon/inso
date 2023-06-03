<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\System\AuthController;
use App\Http\Controllers\API\System\ComercialController;
use App\Http\Controllers\API\System\MaintenanceController;
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

//comercial
Route::post('login-comercial', [ComercialController::class, 'signIn']);
Route::post('register-comercial', [ComercialController::class, 'signUp']);
Route::post('update-comercial/{id}', [ComercialController::class, 'update']);
Route::post('getAuthenticatedUser-comercial', [ComercialController::class, 'getAuthenticatedUser']);
//doctor
Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);
//assurant
Route::post('getQrcode', [AuthController::class, 'getQrcode']);
Route::post('login-assurant', [AuthController::class, 'signInAssurant']);
Route::post('getAuthenticatedUser', [AuthController::class, 'getAuthenticatedUser']);
Route::post('getOrdonance', [AuthController::class, 'getOrdonance']);

Route::resource('maintenance', MaintenanceController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
