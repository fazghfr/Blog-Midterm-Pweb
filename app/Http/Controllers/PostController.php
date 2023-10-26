<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dummy_posts = [
        //     'posts' => [
        //         ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post'],
        //         ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post'],
        //         ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post'],
        //     ]
        // ];
        // return view('posts.index', $dummy_posts);

        // $db_posts = DB::table('posts')->select('id', 'title', 'content', 'updated_at')->where('active', true)->get();
        // $posts = [
        //     'posts' => $db_posts
        // ];
        // dd($posts);


        $db_posts = Post::active()->get();
        $posts = [
            'posts' => $db_posts
        ];
        return view('posts.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;
        $active = $request->active;
        if (@$active == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }   
        $user = Auth::user();

        if(!$user){
            return redirect('/login');
        }

        Post::insert([
            'users_id' => $user->id, // Store the user's ID
            'title' => $title,
            'content' => $content,
            'active' => $active,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return "Post_ID: $id";

        // $dummy_posts = [
        //     'posts' => [    
        //         ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post'],
        //         ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post'],
        //         ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post'],
        //     ]
        // ];

        // $dummy_detail_post = [];
        // foreach( $dummy_posts['posts'] as $dummy_post ) {
        //     if( $dummy_post['id'] == $id ) {
        //         $dummy_detail_post = $dummy_post;
        //     }
        // }
        $db_post = Post::where('id', $id)->first();
        
        if(Auth::check()){
            if(Auth::user()->id == $db_post->users_id){
                $post = $db_post;
                return view('posts.show', ['post' => $post]);
            }
        }
        
        return view('login.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $db_post = Post::where('id', $id)->first();
        $post = $db_post;

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $active = $request->input('active');
        if (@$active == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }

        // dd($title, $content, $active);

        Post::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'active' => $active,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('posts');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();

        return redirect('posts');
    }
}
