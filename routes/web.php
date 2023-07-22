<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\clientv1\DashboardController as Clientv1DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisableController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ManagerAccountController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TagController;
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
    Route::resource('categories', CategoryController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('tags', TagController::class);
    Route::resource('jobs', JobController::class);

    // Normal Routes
    Route::get('create-questions/{testId}', [TestController::class, 'getCreateQuestionPage'])->name('tests.create-questions');
    Route::get('permissions', [AuthorizationController::class, 'getPermissions'])->name('permissions');
    Route::get('assign/{id}', [AuthorizationController::class, 'getAssignPage'])->name('permissions.assign');

    // Account Routes
    Route::get('account', [ManagerAccountController::class, 'getAccountPage'])->name('managers.account');
    Route::post('change-password', [ManagerAccountController::class, 'changePassword'])->name('managers.change-password');
    Route::post('update-information', [ManagerAccountController::class, 'updateAccountInformation'])->name('managers.update-info');

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});


Route::prefix('client/v1')->group(function () {
    Route::get('/', [Clientv1DashboardController::class, 'getDashboard'])->name('clientv1.dashboard');
});
