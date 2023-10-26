@extends('layouts.app')

@section('title', "Blog | $post->title")

@section('content')
<article class="blog-post">
    <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title }}</h2>
    <p class="blog-post-meta"> {{ date("d M Y H:i", strtotime($post->updated_at)) }}</p>

    <p>{{ $post->content }}</p>
    <hr>

    <small class="text-muted"> {{ $total_comments }} comments </small>
    @foreach($comments as $comment)
    <div class="card mb-3">
        <div class="card-body">
            <p>{{ $comment->comment }}</p>
            <a href="{{ url("comments/$comment->id/edit/$post->id") }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
    @endforeach

    <a href="{{ url("comments/create/$post->id") }}" class="btn btn-primary">Add comment</a>
    <hr>

    <a href="{{ url('posts') }}" class="btn btn-primary">Back</a>
</article>
@endsection