@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<h1>Welcome</h1>
<h3>You can see a list of posts here</h3>
<a href="{{ url('posts/create') }}" class="btn btn-success mb-3">+ Create a New Post</a>

@if ($posts->count() == 0)
<div class="alert alert-warning">
    There are no posts available.
</div>
@else
<div class="alert alert-success">
    Total posts: {{ $posts->count() }}
</div>

<form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0 justify-content-end">
    <div class="d-flex">
        <input class="form-control mr-2" type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </div>
    <br>
</form>
@foreach ($posts as $post)
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>

        <p class="card-text">
            <small class="text-body-secondary">Last updated at {{ date("d M Y H:i", strtotime($post->updated_at)) }}</small>
            by {{ $post->user->username }}
        </p>
        <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Full post</a>
        @if(Auth::check() && Auth::user()->id == $post->user_id)
        <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit</a>
        @endif
    </div>
</div>
@endforeach
@endif

@endsection