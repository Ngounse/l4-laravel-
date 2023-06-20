<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('dashbroad');
// });

Route::get('/', [DashboardController::class, 'index']);

Route::get('/signin', [AuthController::class, 'signin']);

Route::get('/signup', [AuthController::class, 'signup']);

Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::get('/reset-password', [AuthController::class, 'resetPassword']);

Route::get('/todo', [DashboardController::class, 'todo']);

Route::get('/team', [DashboardController::class, 'team']);

Route::get('/reports', [DashboardController::class, 'reports']);

Route::get('/calendar', [DashboardController::class, 'calendar']);

Route::get('/projects', [DashboardController::class, 'projects']);
// 404
Route::fallback(function () {
    return view('404');
});