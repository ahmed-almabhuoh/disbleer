<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisableController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TestController;
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

Route::prefix('cpanel')->middleware(['guest:manager,supervisor'])->group(function () {
    Route::get('{guard}/login', [AuthenticationController::class, 'getLoginPage'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('submit.login');
});

Route::prefix('cpanel')->middleware(['auth:manager,supervisor'])->group(function () {
    Route::get('/', [DashboardController::class, 'getDashboard'])->name('backend.dashboard');

    // Resource Routes
    Route::resource('managers', ManagerController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('disables', DisableController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('tests', TestController::class);
    Route::resource('questions', QuestionController::class);

    // Normal Routes
    Route::get('create-questions/{testId}', [TestController::class, 'getCreateQuestionPage'])->name('tests.create-questions');

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});
