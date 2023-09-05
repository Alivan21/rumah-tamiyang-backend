<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cafe\CafeRevenueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Workshop\WorkshopServiceDescriptionController;
use App\Http\Controllers\Workshop\WorkshopServiceRevenueController;
use App\Http\Controllers\Workshop\WorkshopSparepartsDescriptionController;
use App\Http\Controllers\Workshop\WorkshopSparepartRevenueController;
use App\Http\Controllers\Workshop\WorkshopExpenseController;
use App\Http\Controllers\Workshop\WorkshopExpenseDescriptionController;
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

    });

    Route::middleware(['auth:api'])->group(function () {
        Route::group(['prefix' => 'profile'], function (){
            Route::get('/', [ProfileController::class, 'index']);
        });

        /**
         * Cafe Revenue
         */
        Route::group(['prefix' => 'cafe'], function (){
            Route::prefix('revenue')->group(function () {
                Route::get('/', [CafeRevenueController::class, 'index']);
                Route::post('/', [CafeRevenueController::class, 'store']);
                Route::get('/{id}', [CafeRevenueController::class, 'show']);
                Route::put('/{id}', [CafeRevenueController::class, 'update']);
                Route::delete('/{id}', [CafeRevenueController::class, 'destroy']);
            });
        });

        /**
         * Workshop | Bengkel
         */
        Route::group(['prefix' => 'workshop'], function (){

            /**
             * Service Revenue | Pendapatan Jasa
             */
            Route::prefix('service-revenue')->group(function () {
                   Route::get('/', [WorkshopServiceRevenueController::class, 'index']);
                   Route::post('/', [WorkshopServiceRevenueController::class, 'store']);
                   Route::get('/{id}', [WorkshopServiceRevenueController::class, 'show']);
                   Route::put('/{id}', [WorkshopServiceRevenueController::class, 'update']);
                   Route::delete('/{id}', [WorkshopServiceRevenueController::class, 'destroy']);
            });

            /**
             * Service Description | Keterangan Jasa
             */
            Route::prefix('service-description')->group(function () {
                Route::post('/', [WorkshopServiceDescriptionController::class, 'store']);
                Route::put('/{id}', [WorkshopServiceDescriptionController::class, 'update']);
                Route::delete('/{id}', [WorkshopServiceDescriptionController::class, 'destroy']);
            });

            /**
             * Sparepart Revenue | Pendapatan Sparepart
             */
            Route::prefix('sparepart-revenue')->group(function () {
                Route::get('/', [WorkshopSparepartRevenueController::class, 'index']);
                Route::post('/', [WorkshopSparepartRevenueController::class, 'store']);
                Route::get('/{id}', [WorkshopSparepartRevenueController::class, 'show']);
                Route::put('/{id}', [WorkshopSparepartRevenueController::class, 'update']);
                Route::delete('/{id}', [WorkshopSparepartRevenueController::class, 'destroy']);
            });

            /**
             * Sparepart Description | Keterangan Sparepart
             */
            Route::prefix('sparepart-description')->group(function () {
                Route::post('/', [WorkshopSparepartsDescriptionController::class, 'store']);
                Route::put('/{id}', [WorkshopSparepartsDescriptionController::class, 'update']);
                Route::delete('/{id}', [WorkshopSparepartsDescriptionController::class, 'destroy']);
            });

            /**
             * Expense | Pengeluaran
             */
            Route::prefix('expense')->group(function () {
                Route::get('/', [WorkshopExpenseController::class, 'index']);
                Route::post('/', [WorkshopExpenseController::class, 'store']);
                Route::get('/{id}', [WorkshopExpenseController::class, 'show']);
                Route::put('/{id}', [WorkshopExpenseController::class, 'update']);
                Route::delete('/{id}', [WorkshopExpenseController::class, 'destroy']);
            });

            /**
             * Expense Description | Keterangan Pengeluaran
             */
            Route::prefix('expense-description')->group(function () {
                Route::post('/', [WorkshopExpenseDescriptionController::class, 'store']);
                Route::put('/{id}', [WorkshopExpenseDescriptionController::class, 'update']);
                Route::delete('/{id}', [WorkshopExpenseDescriptionController::class, 'destroy']);
            });
        });
    });
});
