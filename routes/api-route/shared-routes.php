<?php

use App\Events\Hello;
use App\Http\Controllers\API\Shared\CarouselsController;
use App\Http\Controllers\API\Shared\CurrentClientsController;
use App\Http\Controllers\API\Shared\SettingsController;
use App\Http\Controllers\API\Shared\SocialMediaController;
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

    Route::resource('carousels', CarouselsController::class)->only([
        'Post','Patch','Delete'
    ]);
    Route::resource('current-clients', CurrentClientsController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('social-media', SocialMediaController::class);
});
Route::resource('carousels', CarouselsController::class)->except([
    'Get'
]);
