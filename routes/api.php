<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IncomeSourceController;
use App\Http\Controllers\Api\ProfitController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::name('api.')->group(function () {
        Route::apiResource('income-sources', IncomeSourceController::class);
        Route::apiResource('profits', ProfitController::class);
    });

    Route::get('/reports/monthly', [ReportController::class, 'monthly']);
    Route::get('/reports/monthly/{month}', [ReportController::class, 'monthlyDetail']);
    Route::get('/reports/summary', [ReportController::class, 'summary']);
});
