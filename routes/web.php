<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\WorldwideController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

    Route::group(['middleware'=>"guest"], function(){
        Route::view('/', 'login');
        Route::view('/login', 'login')->name('login');
        Route::post('/login', [SessionController::class, 'store'])->name('login.store');
        
        Route::view('/signup',"signup")->name('signup');
        Route::post("/signup", [UserController::class, 'store'])->name('signup.store');
    });
    Route::get('/logout', [SessionController::class, 'destroy'])->middleware(['auth'])->name('logout');
    

    Route::group(['prefix' => "/email/verify"], function(){
        Route::group(['middleware' => "auth"], function(){
            Route::view('/', 'auth.confirm')->name('verification.notice');
            Route::get('{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
        });
        Route::get('/success', [VerificationController::class, 'success'])->name('verification.success');
    });

    Route::group(['middleware' => 'guest', 'prefix' => "forgot-password"], function(){
        Route::post('/', [PasswordResetController::class, 'send'])->name('password.email');
        Route::view('/','reset')->name('password.request');
    });

    Route::get("/reset-password/{token}", [PasswordResetController::class, 'index'])->middleware('guest')->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->middleware('guest')->name('password.update');
    
    Route::view('/reset-password-sent', 'auth.confirm')->name('reset.sent');
    Route::view('/reseted', 'reseted')->name('reset.success');
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/worldwide',[WorldwideController::class, 'index'])->name('worldwide');
        Route::get('/countries',[CountryController::class, 'index'])->name('countries');
    });
});

Route::get('/setlocale/{locale}', [LocalizationController::class, 'update'])->name('setlocale');