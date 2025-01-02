<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminlte', function () {
    return view('adminlte::page');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', function () {
    return view('auth.register');
})->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/dashboard', function () {
    return view('dashboard');  // This will be your custom dashboard view
})->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
