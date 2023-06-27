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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/team', [DashboardController::class, 'team']);
    Route::get('/reports', [DashboardController::class, 'reports']);
    Route::get('/calendar', [DashboardController::class, 'calendar']);
    Route::get('/projects', [DashboardController::class, 'projects']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/signin', [AuthController::class, 'signin'])->name('login');

Route::get('/signup', [AuthController::class, 'signup']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('auth/signup', [AuthController::class, 'createUser']);

Route::post('auth/signin', [AuthController::class, 'loginUser']);

Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::get('/reset-password', [AuthController::class, 'resetPassword']);

// without auth
// Route::get('/team', [DashboardController::class, 'team']);
// Route::get('/reports', [DashboardController::class, 'reports']);
// Route::get('/calendar', [DashboardController::class, 'calendar']);
// Route::get('/projects', [DashboardController::class, 'projects']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'create']);
    Route::delete('/tasks/{task}', [TaskController::class, 'delete']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
    Route::post('/tasks/{task}', [TaskController::class, 'update']);
    Route::post('/tasks/{task}/fav', [TaskController::class, 'fav']);
    Route::post('/tasks/{task}/unfav', [TaskController::class, 'unfav']);
    Route::post('/tasks/{task}/done', [TaskController::class, 'done']);
    Route::post('/tasks/{task}/pending', [TaskController::class, 'pending']);
    Route::post('/tasks/{task}/inprogress', [TaskController::class, 'inprogress']);
    Route::post('/tasks/{task}/cancel', [TaskController::class, 'cancel']);
});

// 404
Route::fallback(function () {
    return view('404');
});
