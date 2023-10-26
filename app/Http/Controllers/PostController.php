<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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

        // if (!Auth::check()) {
        //     return redirect('login');
        // }

        $db_posts = Post::active()->get();
        $posts = [
            'posts' => $db_posts
        ];

        $db_usernames = $db_posts->pluck('user.username');

        return view('posts.index', $posts, ['db_usernames' => $db_usernames]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $title = $request->title;
        $content = $request->content;
        $active = $request->active;
        if (@$active == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }
        $user_id = $request->user_id;
        // dd($title, $content, $active, $user_id);

        Post::insert([
            'title' => $title,
            'content' => $content,
            'active' => $active,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
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
        $post = Post::findOrFail($id); // Use findOrFail to retrieve the post by ID.
        $comments = $post->comments()->get();
        $total_comments = $post->total_comments();
        $db_username = $post->user->username; // Access the username through the "user" relationship.


        $db_post = Post::where('id', $id)->first();
        
        if(Auth::check() && $db_post->active){
                return view('posts.show', compact(
                    'post',
                    'comments',
                    'total_comments',
                    'db_username'
                ));
        } 
        
        if(Auth::check() && !$db_post->active){
            if(Auth::user()->id == $db_post->user_id){
                $post = $db_post;
                return view('posts.show', compact(
                    'post',
                    'comments',
                    'total_comments',
                    'db_username'
                ));
            }
        } 
        
        
        
        return view('error.forbidden');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $db_post = Post::where('id', $id)->first();
        $post = $db_post;

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

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
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::where('id', $id)->delete();

        return redirect('posts');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $user_search = User::where('username', 'like', "%$search%")->get('id');

        $db_posts = Post::whereIn('user_id', $user_search)
            ->orWhere(function($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('content', 'like', "%$search%")
                      ->orWhere('created_at', 'like', "%$search%")
                      ->orWhere('updated_at', 'like', "%$search%");
            })
            ->where('active', true)
            ->get();

        $posts = [
            'posts' => $db_posts
        ];
        return view('posts.index', $posts);
    }
    
    
}