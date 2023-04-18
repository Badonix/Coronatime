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

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function(){
    return view("signup");
});

Route::get('/confirm', function(){
    return view('confirm');
});

Route::get('/reset', function(){
    return view('reset');
});

Route::get("/setpassword", function(){
    return view('setpassword');
});