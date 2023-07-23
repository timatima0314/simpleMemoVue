<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleMemosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middlewarewe' => 'auth:sanctum'], function () {
    Route::apiResource('/simple-memo', SimpleMemosController::class);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('singUp', [RegisterController::class, 'register']);

    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
