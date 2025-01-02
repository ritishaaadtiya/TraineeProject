<?php

use Illuminate\Support\Facades\DB;
use  App\Models\registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\home;
use App\Http\Controllers\registerationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;

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
// For Laravel built-in auth routes


// Route::get('/', function () {
//     return view('welcome');
// });





// Basic hello world
// Route::get('/hello',function(){
//     echo "hello world";
// });

# call the function from the controller



Route::get('/home', [home::class, 'display']);

Route::get('/name', [home::class, 'show']);
Route::get('/register', [home::class, 'addData']);

Route::get('reg', function () {
    return view('registeration');
});

# regiteration routes
Route::post('/validate', [registerationController::class, 'register']);
Route::post('signup', [registerationController::class, 'register']);
Route::get('signup', [registerationController::class, 'showForm'])->name('registerForm');
Route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'showform'])->name('loginForm');
    Route::post('/login', [loginController::class, 'handelLogin']);
});
// Route::get('/dashboard', [DashboardController::class, 'dashboard']);





# forgot password
Route::get('/forgot', [ForgotPasswordController::class, 'forgotpswform'])->name('forgot.password');
Route::post('/sendmail', [ForgotPasswordController::class, 'sendmail']);
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetpasswordform']);
Route::post('/resetpassword', [ForgotPasswordController::class, 'reset'])->name('resetpassword');

# only authenticated user can access the routes]
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/update/{id}', [DashboardController::class, 'updateForm'])->name('update.form');
    Route::put('/update/{id}', [DashboardController::class, 'updateTask'])->name('update.task');
    Route::delete('/delete/{id}', [DashboardController::class, 'deleteTask']);
    Route::get('/create', [TaskController::class, 'showform']);
    Route::post('/create', [TaskController::class, 'store_task']);
    Route::post('/logout',  [DashboardController::class, 'logout']);
});
