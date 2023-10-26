<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $db_posts = Post::where('users_id', $user_id)->get();
        $posts = [
            'posts' => $db_posts
        ];
        return view('mypage.index', $posts);
    }
}
