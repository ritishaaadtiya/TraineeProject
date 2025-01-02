<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\registerationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TaskController;
use APP\Http\Controllers\DashboardController;
use APP\Http\Controllers\ForgotPasswordController;


Route::post('signup', [registerationController::class, 'register']);
Route::get('signup', [registerationController::class, 'showForm']);
Route::get('/login', [loginController::class, 'showform']);
Route::post('/login', [loginController::class, 'handelLogin']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/create', [TaskController::class, 'showform']);
Route::post('/create', [TaskController::class, 'store_task']);
Route::get('/forgot', [ForgotPasswordController::class, 'forgotpswform']);
Route::post('/sendmail', [ForgotPasswordController::class, 'sendmail']);
