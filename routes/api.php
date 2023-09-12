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
use App\Http\Controllers\WorkshopOilWasteController;
use App\Http\Controllers\WasteHouse\WasteHouseWasteOilController;
use App\Http\Controllers\WasteHouse\WasteHouseProductionController;
use App\Http\Controllers\WasteHouse\WasteHouseIncomeController;
use App\Http\Controllers\WasteHouse\WasteHouseEnergyBoxController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Commons\Enums\RoleEnum;
use Illuminate\Support\Arr;

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


    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
        // Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    });

    Route::middleware(['auth:api'])->group(function () {
        /**
         * Admin
         */
        Route::group(['prefix' => 'admin', 'middleware' => ['role:'. RoleEnum::ADMIN->value]], function (){
            Route::get('/', [AdminController::class, 'index']);
            Route::post('/', [AdminController::class, 'store']);
            Route::get('/{id}', [AdminController::class, 'show']);
            Route::put('/{id}', [AdminController::class, 'update']);
            Route::delete('/{id}', [AdminController::class, 'destroy']);
        });

        Route::group(['prefix' => 'profile'], function (){
            Route::get('/', [ProfileController::class, 'index']);
        });

        /**
         * Cafe Revenue
         */
        Route::group(['prefix' => 'cafe', 'middleware' => ['role:'. Arr::join([RoleEnum::ADMIN->value, RoleEnum::USER_CAFE->value], '|')]], function (){
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
        Route::group(['prefix' => 'workshop', 'middleware' => ['role:'. Arr::join([RoleEnum::ADMIN->value, RoleEnum::USER_WORKSHOP->value], '|')]], function (){

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

            /**
             * Oil Waste | Limbah Oli
             */
            Route::prefix('oil-waste')->group(function () {
                Route::post('/', [WorkshopOilWasteController::class, 'store']);
                Route::put('/{id}', [WorkshopOilWasteController::class, 'update']);
                Route::delete('/{id}', [WorkshopOilWasteController::class, 'destroy']);
            });
        });

        Route::group(['prefix' => 'waste-house', 'middleware' => ['role:'. Arr::join([RoleEnum::ADMIN->value, RoleEnum::USER_WASTE_HOUSE->value], '|')]], function (){

            /**
             * Oil Waste | Limbah Oli Jelantah
             */
            Route::prefix('oil-waste')->group(function () {
                Route::get('/', [WasteHouseWasteOilController::class, 'index']);
                Route::get('/{id}', [WasteHouseWasteOilController::class, 'show']);
                Route::post('/', [WasteHouseWasteOilController::class, 'store']);
                Route::put('/{id}', [WasteHouseWasteOilController::class, 'update']);
                Route::delete('/{id}', [WasteHouseWasteOilController::class, 'destroy']);
            });

            /**
             * Production | Produksi
             */
            Route::prefix('production')->group(function (){
                Route::get('/', [WasteHouseProductionController::class, 'index']);
                Route::get('/{id}', [WasteHouseProductionController::class, 'show']);
                Route::post('/', [WasteHouseProductionController::class, 'store']);
                Route::put('/{id}', [WasteHouseProductionController::class, 'update']);
                Route::delete('/{id}', [WasteHouseProductionController::class, 'destroy']);
            });

            /**
             * Income | Pendapatan
             */
            Route::prefix('income')->group(function (){
                Route::get('/', [WasteHouseIncomeController::class, 'index']);
                Route::get('/{id}', [WasteHouseIncomeController::class, 'show']);
                Route::post('/', [WasteHouseIncomeController::class, 'store']);
                Route::put('/{id}', [WasteHouseIncomeController::class, 'update']);
                Route::delete('/{id}', [WasteHouseIncomeController::class, 'destroy']);
            });

            /**
             * Energy Box
             */
            Route::prefix('energy-box')->group(function () {
                Route::get('/', [WasteHouseEnergyBoxController::class, 'index']);
                Route::get('/{id}', [WasteHouseEnergyBoxController::class, 'show']);
                Route::post('/', [WasteHouseEnergyBoxController::class, 'store']);
                Route::put('/{id}', [WasteHouseEnergyBoxController::class, 'update']);
                Route::delete('/{id}', [WasteHouseEnergyBoxController::class, 'destroy']);
            });
        });
});
