<?php

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
Route::get('/index',function(){
    return view('index');
});
# call the function from the controller
use App\Http\Controllers\home;
use App\Http\Controllers\registerationController;

Route::get('/home',[home::class,'display']);

Route::get('/name',[home::class,'show']);
Route::get('/register',[home::class,'addData']);

Route::get('reg',function (){
    return view('registeration');
});

# regiteration routes
Route::post('/validate',[registerationController::class,'register']);