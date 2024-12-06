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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('signup',[registerationController::class,'register']);
Route::get('signup',[registerationController::class,'showForm'])->name('registerForm');
Route::get('login',[loginController::class,'showform'])->name('loginForm');
Route::post('/login',[loginController::class,'handelLogin']);
