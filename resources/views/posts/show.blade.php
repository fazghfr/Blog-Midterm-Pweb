<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Title: {{ $post->title }} </title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.css') }}">
</head>

<body>

    <div class="container">
        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title }}</h2>
            <p class="blog-post-meta"> {{ date("d M Y H:i", strtotime($post->updated_at)) }}</p>

            <p>{{ $post->content }}</p>
            <hr>

            <a href="{{ url('posts') }}" class="btn btn-primary">Back</a>
        </article>
    </div>
</body>

</html>