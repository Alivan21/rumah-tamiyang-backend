<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cafe\CafeRevenueController;
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


Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
        // Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');

    });

    Route::middleware(['auth:api'])->group(function () {
        Route::group(['prefix' => 'profile'], function (){
            Route::get('/', [ProfileController::class, 'index']);
        });

        Route::group(['prefix' => 'cafe'], function (){
            Route::prefix('revenue')->group(function () {
                Route::get('/', [CafeRevenueController::class, 'index']);
                Route::post('/', [CafeRevenueController::class, 'store']);
                Route::get('/{id}', [CafeRevenueController::class, 'show']);
                Route::put('/{id}', [CafeRevenueController::class, 'update']);
                Route::delete('/{id}', [CafeRevenueController::class, 'destroy']);
            });
        });
    });

});
