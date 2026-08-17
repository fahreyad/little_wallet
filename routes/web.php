<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IncomeSourceController;
use App\Http\Controllers\Admin\ProfitController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('income-sources', IncomeSourceController::class);
    Route::resource('profits', ProfitController::class);
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/monthly/{month}', [ReportController::class, 'monthly'])->name('reports.monthly');
});
