<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProjectController;
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


Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
        // Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
        Route::post('get-profile', [AuthController::class, 'getProfile'])->middleware('auth:api')->name('get-profile');
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::prefix('project')->group(function (){
            Route::get('/', [ProjectController::class, 'index'])->name('project.index');
            Route::get('/{id}', [ProjectController::class, 'show'])->name('project.show');

            Route::middleware(['isLecturer'])->group(function (){
                Route::put('/{id}', [ProjectController::class, 'update'])->name('project.update');
                Route::post('/', [ProjectController::class, 'store'])->name('project.store');
                Route::delete('/{id}', [ProjectController::class, 'delete'])->name('project.delete');
            });
        });
    });

});
