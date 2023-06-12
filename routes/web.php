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
    return view('dashbroad');
});

Route::view('/signin', 'signin');

Route::view('/signup', 'signup');

Route::view('/forgot-password', 'forgot-password');

Route::view('/reset-password', 'reset-password');

// 404
Route::fallback(function () {
    return view('404');
});