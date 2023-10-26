<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', [PostController::class, 'index']); // read all posts
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('posts', [PostController::class, 'index']); // read all posts
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/{id}', [PostController::class, 'show']); // read single post
Route::get('posts/{id}/edit', [PostController::class, 'edit']); // read form edit post
Route::patch('posts/{id}', [PostController::class,'update']); // update post
Route::delete('posts/{id}', [PostController::class,'destroy']); // delete post

Route::get('/mypage', [MypageController::class, 'index']); 

Route::get('/login',  [LoginController::class, 'index'])->middleware('guest')->name('login'); //getting the login page
Route::post('/login',  [LoginController::class, 'authenticate']); //authenticating the user
Route::post('/logout',  [LoginController::class, 'logout']);   //logging out the user

Route::get('/home',  [PostController::class, 'index']);

Route::get('/register',  [RegisterController::class, 'index']);
Route::post('/register',  [RegisterController::class, 'store']);

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        print_r("Connected successfully to: " . DB::connection()->getDatabaseName());
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. Error:" . $e);
    }
});
