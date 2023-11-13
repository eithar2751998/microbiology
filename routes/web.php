<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Front\HomeController;



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


Route::get('authorized/google', [App\Http\Controllers\Front\Auth\LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [App\Http\Controllers\Front\Auth\LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::get('authorized/facebook', [App\Http\Controllers\Front\Auth\LoginWithFacebookController::class, 'redirectToFacebook']);
Route::get('authorized/facebook/callback', [App\Http\Controllers\Front\Auth\LoginWithFacebookController::class, 'handleFacebookCallback']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('courses', [App\Http\Controllers\Front\CourseController::class, 'index'])->name('front.course.index');
Route::get('course/{id}/subjects', [App\Http\Controllers\Front\CourseController::class, 'subjects'])->name('front.course.subjects');

Route::get('pricing', [App\Http\Controllers\Front\PricingPlanController::class, 'index'])->name('plans');

Route::get('/home', function () {
    return view('dashboard');
})->name('dashboard');

//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('free-trial', 'question-page')->name('free_trial');
Route::view('questions/subjects/{id}', 'question-page')->name('questions_subjects');
Route::get('terms_and_conditions',[HomeController::class,'getTerms'])->name('terms');
Route::get('all_reviews',[ReviewController::class,'index'])->name('all_reviews');
Route::get('reviews',[ReviewController::class,'create'])->name('reviews.create')->middleware('checkUserLoggedIn');
Route::post('reviews',[ReviewController::class,'store'])->name('reviews.store');

Route::get('payment/{plan}',[PayPalController::class,'payment'])->name('payment')->middleware('checkUserLoggedIn');
Route::get('cancel',[PayPalController::class,'cancel'])->name('payment.cancel');
Route::get('payment/success',[PayPalController::class,'success'])->name('payment.success');

Route::get('contact_us',[HomeController::class,'contactUs'])->name('contact_us');
Route::post('send/contact_us',[HomeController::class,'sendContactUs'])->name('send_contact_us');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
