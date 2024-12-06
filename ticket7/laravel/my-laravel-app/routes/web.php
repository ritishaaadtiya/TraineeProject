<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Basic hello world
// Route::get('/hello',function(){
//     echo "hello world";
// });
Route::get('/index', function () {
    return view('index');
});
# call the function from the controller
use App\Http\Controllers\home;
use App\Http\Controllers\registerationController;
use App\Http\Controllers\TaskController;

Route::get('/home', [home::class, 'display']);

Route::get('/name', [home::class, 'show']);
Route::get('/register', [home::class, 'addData']);

Route::get('reg', function () {
    return view('registeration');
});

# regiteration routes
Route::post('/validate', [registerationController::class, 'register']);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
# Create TAsk routes
Route::get('/create', [TaskController::class, 'showform'])->name('task');
Route::post('/create', [TaskController::class, 'store_task']);
