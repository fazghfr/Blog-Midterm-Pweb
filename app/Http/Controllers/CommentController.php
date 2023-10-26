<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $db_post = Post::where('id', $id)->first();
        $post = $db_post;

        return view('comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $comment = $request->comment;
        $post_id = $request->post_id;
        $user_id = $request->user_id;

        Comment::insert([
            'comment' => $comment,
            'user_id' => $user_id,
            'post_id' => $post_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect("posts/$post_id");
    }

    public function edit(string $id, string $post_id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $post = Post::where('id', $post_id)->first();
        $comments = Comment::where('id', $id)->get();

        return view('comments.edit', ['post' => $post, 'comments' => $comments]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $comment = $request->input('comment');
        $post_id = $request->input('post_id');


        Comment::where('id', $id)->update([
            'comment' => $comment,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect("posts/$post_id");
    }


    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $comment = Comment::findOrFail($id);
        $comment->delete();

        $post_id = $request->input('post_id');

        return redirect("posts/$post_id");
    }
}
