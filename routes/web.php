<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login']); // read form login
Route::post('login', [AuthController::class, 'authenticate']); // authenticate user
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');; // logout user
Route::get('register', [AuthController::class, 'register']); // read form register
Route::post('register', [AuthController::class, 'register_user']); // create new user

Route::get('posts', [PostController::class, 'index']); // read all posts
Route::post('posts', [PostController::class, 'store']); // create new post
Route::get('posts/create', [PostController::class, 'create']); // read form create new post
Route::get('posts/{id}', [PostController::class, 'show']); // read single post
Route::get('posts/{id}/edit', [PostController::class, 'edit']); // read form edit post
Route::patch('posts/{id}', [PostController::class,'update']); // update post
Route::delete('posts/{id}', [PostController::class,'destroy']); // delete post

Route::post('comments', [CommentController::class, 'store']); // create new comment
Route::get('comments/create/{id}', [CommentController::class, 'create']); // read form create new comment
Route::get('comments/{id}/edit/{post_id}', [CommentController::class, 'edit']); // read form edit comment
Route::patch('comments/{id}', [CommentController::class, 'update']); // update comment
Route::delete('comments/{id}', [CommentController::class, 'destroy']); // delete comment

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        print_r("Connected successfully to: " . DB::connection()->getDatabaseName());
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. Error:" . $e);
    }
});
