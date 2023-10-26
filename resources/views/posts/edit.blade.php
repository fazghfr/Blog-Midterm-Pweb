@extends('layouts.app')

@section('title', "Blog | Edit $post->title")

@section('content')
<h1>Edit Post</h1>
<div class="form-control">
    <form method="POST" action="{{ url("posts/$post->id") }}">
        @method('PATCH')
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <div>Active:</div>
        <div class="mb-3 form-check form-switch">
            <label class="form-check-label" for="active"><small>*Turning on (switched right) means public can view your post</small></label>
            @if($post->active)
            <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" checked>
            @else
            <input class="form-check-input" type="checkbox" role="switch" id="active" name="active">
            @endif
        </div>

        <div class="mb-3">
            <a href="{{ url('posts') }}" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </form>
    <form action="{{ url("posts/$post->id") }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection