@extends('layouts.app')

@section('title', 'Blog | Create Post')

@section('content')
<h1>Create Post</h1>
<form method="POST" action="{{ url('posts') }}" class="form-control">
    @csrf

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Your Title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Your content"></textarea>
    </div>
    <div>Active:</div>
    <div class="mb-3 form-check form-switch">
        <label class="form-check-label" for="active"><small>*Turning on (switched right) means public can view your post</small></label>
        <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" checked>
    </div>

    <div class="mb-3">
        <a href="{{ url('posts') }}" class="btn btn-primary">Back</a>
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>
@endsection