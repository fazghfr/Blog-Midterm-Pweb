@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<h1>Welcome</h1>
<h3>You can see list of posts here</h3>
<a href="{{ url('posts/create') }}" class="btn btn-success mb-3">+ Create New Post</a>

@foreach ($posts as $post)
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <!-- <small>#{{ $post->id }}</small> -->
        <p class="card-text">{{ $post->content }}</p>

        <p class="card-text"><small class="text-body-secondary">Last updated at {{ date("d M Y H:i", strtotime($post->updated_at)) }} </small></p>
        <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Full post</a>
        <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endforeach
@endsection