<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/



Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admins'], function () {
    Route::get('login', [App\Http\Controllers\Dashboard\LoginController::class, 'getLogin'])->name('dashboard.login.view');
    Route::post('login', [App\Http\Controllers\Dashboard\LoginController::class, 'login'])->name('dashboard.login');

});


Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admins'], function () {
    Route::post('logout', [App\Http\Controllers\Dashboard\LoginController::class, 'logout'])->name('dashboard.logout');
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('search', [App\Http\Controllers\Dashboard\DashboardController::class, 'search'])->name('dashboard.search');

    Route::group(['prefix' =>'roles'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\RoleController::class, 'index'])->name('dashboard.roles.index');
        Route::get('add', [App\Http\Controllers\Dashboard\RoleController::class, 'create'])->name('dashboard.roles.create');
        Route::get('{role}\edit', [App\Http\Controllers\Dashboard\RoleController::class, 'edit'])->name('dashboard.roles.edit');
        Route::post('store', [App\Http\Controllers\Dashboard\RoleController::class, 'store'])->name('dashboard.roles.store');
        Route::put('{role}\update', [App\Http\Controllers\Dashboard\RoleController::class, 'update'])->name('dashboard.roles.update');
        Route::delete('{role}/delete', [App\Http\Controllers\Dashboard\RoleController::class, 'destroy'])->name('dashboard.roles.delete');

    });

    Route::group(['prefix' =>'permissions'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\PermissionController::class, 'index'])->name('dashboard.permissions.index');
        Route::get('add', [App\Http\Controllers\Dashboard\PermissionController::class, 'create'])->name('dashboard.permissions.create');
        Route::get('{permission}\edit', [App\Http\Controllers\Dashboard\PermissionController::class, 'edit'])->name('dashboard.permissions.edit');
        Route::post('store', [App\Http\Controllers\Dashboard\PermissionController::class, 'store'])->name('dashboard.permissions.store');
        Route::put('{permission}\update', [App\Http\Controllers\Dashboard\PermissionController::class, 'update'])->name('dashboard.permissions.update');
        Route::delete('{permission}\delete', [App\Http\Controllers\Dashboard\PermissionController::class, 'destroy'])->name('dashboard.permissions.delete');

    });

    Route::group(['prefix' =>'admins'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\AdminController::class, 'index'])->name('dashboard.admins.index');
        Route::get('profile', [App\Http\Controllers\Dashboard\AdminController::class, 'profile'])->name('dashboard.admin.profile');
        Route::get('{admin}/changePassword', [App\Http\Controllers\Dashboard\AdminController::class, 'getPassword'])->name('dashboard.admins.change_password');
        Route::get('{admin}/change_status', [App\Http\Controllers\Dashboard\AdminController::class, 'changeStatus'])->name('dashboard.admins.change_status');
        Route::get('add', [App\Http\Controllers\Dashboard\AdminController::class, 'create'])->name('dashboard.admins.create');
        Route::get('{admin}/edit', [App\Http\Controllers\Dashboard\AdminController::class, 'edit'])->name('dashboard.admins.edit');
        Route::get('{admin}/restore', [App\Http\Controllers\Dashboard\AdminController::class, 'restore'])->name('dashboard.admins.restore');
        Route::post('store', [App\Http\Controllers\Dashboard\AdminController::class, 'store'])->name('dashboard.admins.store');
        Route::put('{admin}/changePassword', [App\Http\Controllers\Dashboard\AdminController::class, 'changePassword'])->name('dashboard.admins.update_password');
        Route::put('{admin}/update', [App\Http\Controllers\Dashboard\AdminController::class, 'update'])->name('dashboard.admins.update');
        Route::delete('{admin}/delete', [App\Http\Controllers\Dashboard\AdminController::class, 'destroy'])->name('dashboard.admins.delete');
        Route::delete('{admin}/forceDelete', [App\Http\Controllers\Dashboard\AdminController::class, 'forceDelete'])->name('dashboard.admins.forceDelete');

    });

    Route::group(['prefix' =>'about'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\AboutController::class, 'index'])->name('dashboard.about.index');
        Route::get('add', [App\Http\Controllers\Dashboard\AboutController::class, 'create'])->name('dashboard.about.create');
        Route::get('{about}/edit', [App\Http\Controllers\Dashboard\AboutController::class, 'edit'])->name('dashboard.about.edit');
        Route::post('store', [App\Http\Controllers\Dashboard\AboutController::class, 'store'])->name('dashboard.about.store');
        Route::put('{about}/update', [App\Http\Controllers\Dashboard\AboutController::class, 'update'])->name('dashboard.about.update');
    });

    Route::group(['prefix' =>'courses'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\DepartmentController::class, 'index'])->name('dashboard.dept.index');
        Route::get('add', [App\Http\Controllers\Dashboard\DepartmentController::class, 'create'])->name('dashboard.dept.create');
        Route::get('{department}/edit', [App\Http\Controllers\Dashboard\DepartmentController::class, 'edit'])->name('dashboard.dept.edit');
        Route::get('{department}/change_status', [App\Http\Controllers\Dashboard\DepartmentController::class, 'changeStatus'])->name('dashboard.dept.change_status');
        Route::get('{department}/show', [App\Http\Controllers\Dashboard\DepartmentController::class, 'show'])->name('dashboard.dept.show');
        Route::post('store', [App\Http\Controllers\Dashboard\DepartmentController::class, 'store'])->name('dashboard.dept.store');
        Route::put('{department}/update', [App\Http\Controllers\Dashboard\DepartmentController::class, 'update'])->name('dashboard.dept.update');
        Route::delete('{department}/delete', [App\Http\Controllers\Dashboard\DepartmentController::class, 'destroy'])->name('dashboard.dept.delete');
    });

    Route::group(['prefix' =>'topics'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\SubjectController::class, 'index'])->name('dashboard.subjects.index');
        Route::get('add', [App\Http\Controllers\Dashboard\SubjectController::class, 'create'])->name('dashboard.subjects.create');
        Route::get('{subject}/edit', [App\Http\Controllers\Dashboard\SubjectController::class, 'edit'])->name('dashboard.subjects.edit');
        Route::get('{subject}/change_status', [App\Http\Controllers\Dashboard\SubjectController::class, 'changeStatus'])->name('dashboard.subjects.change_status');
        Route::get('{subject}/show', [App\Http\Controllers\Dashboard\SubjectController::class, 'show'])->name('dashboard.subjects.show');
        Route::get('{subject}/questions', [App\Http\Controllers\Dashboard\SubjectController::class, 'subjectQuestions'])->name('dashboard.subjects.questions');
        Route::post('store', [App\Http\Controllers\Dashboard\SubjectController::class, 'store'])->name('dashboard.subjects.store');
        Route::put('{subject}/update', [App\Http\Controllers\Dashboard\SubjectController::class, 'update'])->name('dashboard.subjects.update');
        Route::delete('{subject}/delete', [App\Http\Controllers\Dashboard\SubjectController::class, 'destroy'])->name('dashboard.subjects.delete');
    });
    Route::group(['prefix' =>'event'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\EventController::class, 'index'])->name('dashboard.events.index');
        Route::get('add', [App\Http\Controllers\Dashboard\EventController::class, 'create'])->name('dashboard.events.create');
        Route::get('{event}/edit', [App\Http\Controllers\Dashboard\EventController::class, 'edit'])->name('dashboard.events.edit');
        Route::get('{event}/change_status', [App\Http\Controllers\Dashboard\EventController::class, 'changeStatus'])->name('dashboard.events.change_status');
        Route::get('{event}/show', [App\Http\Controllers\Dashboard\EventController::class, 'show'])->name('dashboard.events.show');
        Route::post('store', [App\Http\Controllers\Dashboard\EventController::class, 'store'])->name('dashboard.events.store');
        Route::put('{event}/update', [App\Http\Controllers\Dashboard\EventController::class, 'update'])->name('dashboard.events.update');
        Route::delete('{event}/delete', [App\Http\Controllers\Dashboard\EventController::class, 'destroy'])->name('dashboard.events.delete');
    });
    Route::group(['prefix' =>'comingSoon'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'index'])->name('dashboard.coming.index');
        Route::get('add', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'create'])->name('dashboard.coming.create');
        Route::get('{coming}/edit', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'edit'])->name('dashboard.coming.edit');
        Route::get('{coming}/change_status', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'changeStatus'])->name('dashboard.coming.change_status');
        Route::get('{coming}/show', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'show'])->name('dashboard.coming.show');
        Route::post('store', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'store'])->name('dashboard.coming.store');
        Route::put('{coming}/update', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'update'])->name('dashboard.coming.update');
        Route::delete('{coming}/delete', [App\Http\Controllers\Dashboard\ComingSoonController::class, 'destroy'])->name('dashboard.coming.delete');
    });
    Route::group(['prefix' =>'question'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\QuestionController::class, 'index'])->name('dashboard.question.index');
        Route::get('add', [App\Http\Controllers\Dashboard\QuestionController::class, 'create'])->name('dashboard.question.create');
        Route::get('{question}/edit', [App\Http\Controllers\Dashboard\QuestionController::class, 'edit'])->name('dashboard.question.edit');
        Route::get('{question}/addToFree', [App\Http\Controllers\Dashboard\QuestionController::class, 'AddToFree'])->name('dashboard.question.addToFree');
        Route::get('free', [App\Http\Controllers\Dashboard\QuestionController::class, 'indexFreeQuestions'])->name('dashboard.question.free');
        Route::get('{question}/change_status', [App\Http\Controllers\Dashboard\QuestionController::class, 'changeStatus'])->name('dashboard.question.change_status');
        Route::get('{question}/show', [App\Http\Controllers\Dashboard\QuestionController::class, 'show'])->name('dashboard.question.show');
        Route::get('{question}/restore', [App\Http\Controllers\Dashboard\QuestionController::class, 'restore'])->name('dashboard.question.restore');
        Route::post('store', [App\Http\Controllers\Dashboard\QuestionController::class, 'store'])->name('dashboard.question.store');
        Route::put('{question}/update', [App\Http\Controllers\Dashboard\QuestionController::class, 'update'])->name('dashboard.question.update');
        Route::delete('{question}/delete', [App\Http\Controllers\Dashboard\QuestionController::class, 'destroy'])->name('dashboard.question.delete');
        Route::delete('{question}/forceDelete', [App\Http\Controllers\Dashboard\QuestionController::class, 'forceDelete'])->name('dashboard.question.forceDelete');
    });
    Route::group(['prefix' =>'pricing'], function(){
        Route::get('', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'index'])->name('dashboard.pricing.index');
        Route::get('add', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'create'])->name('dashboard.pricing.create');
        Route::get('{pricing}/edit', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'edit'])->name('dashboard.pricing.edit');
        Route::get('{pricing}/show', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'show'])->name('dashboard.pricing.show');
        Route::get('{pricing}/change_status', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'changeStatus'])->name('dashboard.pricing.change_status');
        Route::post('store', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'store'])->name('dashboard.pricing.store');
        Route::put('{pricing}/update', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'update'])->name('dashboard.pricing.update');
        Route::delete('{pricing}/delete', [App\Http\Controllers\Dashboard\PricingPlanController::class, 'destroy'])->name('dashboard.pricing.delete');
    });
     Route::group(['prefix' =>'reviews'], function(){
        Route::get('', [App\Http\Controllers\ReviewController::class, 'index_dashboard'])->name('dashboard.review.index');
        Route::get('{pricing}/change_status', [App\Http\Controllers\ReviewController::class, 'changeStatus'])->name('dashboard.review.change_status');
        });
     Route::group(['prefix' =>'terms'], function(){
         Route::get('', [App\Http\Controllers\TermController::class, 'index'])->name('dashboard.term.index');
         Route::get('add', [App\Http\Controllers\TermController::class, 'create'])->name('dashboard.term.create');
         Route::get('{term}/edit', [App\Http\Controllers\TermController::class, 'edit'])->name('dashboard.term.edit');
         Route::post('store', [App\Http\Controllers\TermController::class, 'store'])->name('dashboard.term.store');
         Route::put('{term}/update', [App\Http\Controllers\TermController::class, 'update'])->name('dashboard.term.update');
     });

});
