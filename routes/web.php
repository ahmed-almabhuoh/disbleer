<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisableController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('cpanel')->group(function () {
    Route::get('/', [DashboardController::class, 'getDashboard'])->name('backend.dashboard');

    // Resource Routes
    Route::resource('managers', ManagerController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('disables', DisableController::class);
    Route::resource('reports', ReportController::class);
});
