<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::middleware('localization')->group(function(){
    Route::view('/', 'login');
    Route::view('/login', 'login')->name('login');
   
    Route::view('/signup',"signup")->name('signup');
    Route::post("/signup", [UserController::class, 'store'])->name('signup.store');

    Route::group(['prefix' => "/email/verify"], function(){
        Route::get('/', [VerificationController::class, 'index'])->middleware(['auth'])->name('verification.notice');
        Route::get('{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth','signed'])->name('verification.verify');
        Route::get('/success', [VerificationController::class, 'success'])->name('verification.success');
    });

    Route::view('/reset','reset');
    Route::view("/setpassword",'setpassword');
    Route::view('/worldwide','worldwide')->name('worldwide');
    Route::view('/countries','countries')->name('countries');
    Route::view('/reseted', 'reseted');
});

Route::get('/setlocale/{locale}', function($locale){
    session(['locale' => $locale]);
    return back();
})->name('setlocale');