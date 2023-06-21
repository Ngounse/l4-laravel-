<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
// use Illuminate\Validation\Validator;
// use Validator;
use Illuminate\Http\Request;

use App\Models\Task;
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

// Route::get('/todo', [DashboardController::class, 'todo']);

Route::get('/team', [DashboardController::class, 'team']);

Route::get('/reports', [DashboardController::class, 'reports']);

Route::get('/calendar', [DashboardController::class, 'calendar']);

Route::get('/projects', [DashboardController::class, 'projects']);
// 404
Route::fallback(function () {
    return view('404');
});

// Route::group(['middleware' => 'web'], function () {

/**
 * Show Task Dashboard
 */
Route::get('/tasks', [TaskController::class, 'index']);

/**
 * Add New Task
 */
Route::post('/tasks', [TaskController::class, 'create']);
/**
 * Delete Task
 */
Route::delete('/tasks/{task}', [TaskController::class, 'delete']);
// });