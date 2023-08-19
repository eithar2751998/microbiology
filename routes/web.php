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
|
*/

//Route::get('pricing', [App\Http\Controllers\Front\PricingPlanController::class, 'index']);
//
//Route::get('authorized/google', [App\Http\Controllers\Front\Auth\LoginWithGoogleController::class, 'redirectToGoogle']);
//Route::get('authorized/google/callback', [App\Http\Controllers\Front\Auth\LoginWithGoogleController::class, 'handleGoogleCallback']);
//
//Route::get('authorized/facebook', [App\Http\Controllers\Front\Auth\LoginWithFacebookController::class, 'redirectToFacebook']);
//Route::get('authorized/facebook/callback', [App\Http\Controllers\Front\Auth\LoginWithFacebookController::class, 'handleFacebookCallback']);
//
//
//
//Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
//
//Route::get('courses', [App\Http\Controllers\Front\CourseController::class, 'index'])->name('front.course.index');
//Route::get('course/{id}/subjects', [App\Http\Controllers\Front\CourseController::class, 'subjects'])->name('front.course.subjects');
//
//
//Route::get('/home', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::get('/', function () {
    return view('welcome');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
