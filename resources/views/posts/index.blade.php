<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.css') }}">
</head>

<body>

    <div class="container">
        <h1>Welcome to my blog</h1>
        <h3>You can see list of posts here</h3>
        <a href="{{ url('posts/create') }}" class="btn btn-success mb-3">+ Create New Post</a>

        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <small>#{{ $post->id }}</small>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated at {{ date("d M Y H:i", strtotime($post->updated_at)) }} </small></p>
                <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Full post</a>
                <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>