<?php

use App\Http\Controllers\PostController;
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

Route::get('posts', [PostController::class, 'index']); // read all posts
Route::post('posts', [PostController::class, 'store']); // create new post
Route::get('posts/create', [PostController::class, 'create']); // read form create new post
Route::get('posts/{id}', [PostController::class, 'show']); // read single post
Route::get('posts/{id}/edit', [PostController::class, 'edit']); // read form edit post
Route::patch('posts/{id}', [PostController::class,'update']); // update post
Route::delete('posts/{id}', [PostController::class,'destroy']); // delete post

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        print_r("Connected successfully to: " . DB::connection()->getDatabaseName());
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. Error:" . $e);
    }
});
