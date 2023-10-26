@extends('layouts.app')

@section('title', "Blog | Edit Comment")

@section('content')
<h1>Edit Post</h1>
<div class="form-control">
    <form method="POST" action="{{ url("comments/{$comments[0]->id}") }}">
        @method('PATCH')
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3">{{ $comments[0]->comment }}</textarea>
        </div>

        <div class="mb-3">
            <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Back to post</a>
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </form>
    <form method="POST" action="{{ url("comments/{$comments[0]->id}") }}">
        @method('DELETE')
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</div>
@endsection