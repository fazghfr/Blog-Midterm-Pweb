@extends('layouts.app')

@section('title', 'Blog | Create Comment')

@section('content')
<h1>Create Comment</h1>
<form method="POST" action="{{ url('comments') }}" class="form-control">
    @csrf
    
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="mb-3">
        <label for="comment" class="form-label">Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Your comment"></textarea>
    </div>

    <div class="mb-3">
        <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Back to post</a>
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>
@endsection