<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\clientv1\AuthenticationController as Clientv1AuthenticationController;
use App\Http\Controllers\clientv1\CoursesController;
use App\Http\Controllers\clientv1\CreditsController;
use App\Http\Controllers\clientv1\DashboardController as Clientv1DashboardController;
use App\Http\Controllers\clientv1\JobsController;
use App\Http\Controllers\clientv1\ProposalsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\credits\PaypalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisableController;
use App\Http\Controllers\frontend\ChattingController;
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

Route::get('/', function(){
    response()->view('home')
});

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

    // Jobs
    Route::get('job/proposals/{id}', [JobController::class, 'getProposals'])->name('jobs.proposals');
    Route::get('job/published', [JobController::class, 'publishedJobs'])->name('jobs.published');
});

Route::prefix('cpanel')->middleware(['auth:manager,supervisor,disable'])->group(function () {
    // Account Routes
    Route::get('account', [ManagerAccountController::class, 'getAccountPage'])->name('managers.account');
    Route::post('change-password', [ManagerAccountController::class, 'changePassword'])->name('managers.change-password');
    Route::post('update-information', [ManagerAccountController::class, 'updateAccountInformation'])->name('managers.update-info');
});

// Conversation
Route::prefix('chat')->middleware(['auth:manager,supervisor,disable'])->group(function () {
    Route::get('/', [ChattingController::class, 'conversations'])->name('chats.conversations');
    Route::get('new-conversation/{jobId}', [ChattingController::class, 'createConversation'])->name('chats.conversations.create');
});

Route::middleware('auth:manager,supervisor,disable')->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});


Route::prefix('client')->middleware('guest:disable')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('login', [Clientv1AuthenticationController::class, 'getLogin'])->name('clientv1.login');
        Route::post('login', [Clientv1AuthenticationController::class, 'login'])->name('clientv1.submit.login');

        Route::get('reg', [Clientv1AuthenticationController::class, 'getReg'])->name('clientv1.reg');
        Route::post('reg', [Clientv1AuthenticationController::class, 'reg'])->name('clientv1.reg.submit');

        Route::post('terms', [Clientv1AuthenticationController::class, 'terms'])->name('clientv1.terms');
    });
});

Route::prefix('client')->middleware('auth:disable')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('/', [Clientv1DashboardController::class, 'getDashboard'])->name('clientv1.dashboard');

        // Jobs
        Route::get('job/{slug}', [JobsController::class, 'getJobPage'])->name('jobs.details');
        Route::get('proposals', [ProposalsController::class, 'getProposalsPage'])->name('clientv1.proposals');

        // Courses
        Route::get('courses', [CoursesController::class, 'getCoursesPage'])->name('clientv1.courses');
        Route::get('course/{slug}', [CoursesController::class, 'courseDetails'])->name('clientv1.courses.details');
        Route::get('course/{id}/enrol', [CoursesController::class, 'enrolling'])->name('clientv1.courses.enrol');

        // Charging
        Route::get('credits', [CreditsController::class, 'getCreditsPage'])->name('clientv1.credits');

        // Paypal
        Route::controller(PaypalController::class)
            ->prefix('paypal')
            ->group(function () {
                Route::get('handle-payment/{amount}', 'handlePayment')->name('make.payment');
                Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
                Route::get('payment-success/{id}', 'paymentSuccess')->name('success.payment');
            });
    });
});
