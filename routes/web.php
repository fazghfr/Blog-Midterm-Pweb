<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeDController;

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
    return view('welcome');
});

Route::get('/login',  [LoginController::class, 'index'])->middleware('guest');
Route::post('/login',  [LoginController::class, 'authenticate']);
Route::post('/logout',  [LoginController::class, 'logout']);


Route::get('/dashboard',  [DashboardController::class, 'index']);
Route::get('/home',  [HomeController::class, 'index']);

Route::get('/register',  [RegisterController::class, 'index']);
Route::post('/register',  [RegisterController::class, 'store']);
