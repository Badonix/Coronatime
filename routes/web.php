<?php

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
    Route::view('/login', 'login');
    Route::view('/signup',"signup");
    Route::view('/confirm','confirm');
    Route::view('/reset','reset');
    Route::view("/setpassword",'setpassword');
    Route::view('/worldwide','worldwide');
    Route::view('/countries','countries');
});

Route::get('/setlocale/{locale}', function($locale){
    session(['locale' => $locale]);
    return back();
})->name('setlocale');