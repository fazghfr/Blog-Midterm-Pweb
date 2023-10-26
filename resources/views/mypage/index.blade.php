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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('home') }}">My Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        <li class="nav-item">
                            <form action="{{ url('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>

                        <li class="nav-item ml-auto">
                            <form action="{{ url('home') }}" method="GET">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">Welcome, {{ Auth::user()->name }} </button>
                            </form>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Welcome, Guest!</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        
         <h3>Showing Only Your Blogs</h3>
        @if (Auth::check())
            <a href="{{ url('posts/create') }}" class="btn btn-success mb-3">+ Create New Post</a>
        @else
            <a href="{{ url('login') }}" class="btn btn-success mb-3">Login to Post a blog</a>
        @endif
        <a href="{{ url('home') }}" class="btn btn-success mb-3">Home</a>

        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <small>#{{ $post->id }}</small>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-body-secondary">Posted by {{ App\Models\User::find($post->users_id)->name }} </small></p>
                <p class="card-text"><small class="text-body-secondary">Last updated at {{ date("d M Y H:i", strtotime($post->updated_at)) }} </small></p>
                <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Full post</a>
                @if (Auth::check() && $post->users_id && Auth::user()->id == $post->users_id)
                    <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit</a>
                @endif
                @if (!$post->active)
                    <a href="{{ url("mypage") }}" class="btn btn-danger">Private</a>
                @endif
            </div>
        </div>
        @endforeach

    </div>
</body>

</html>
