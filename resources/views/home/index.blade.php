<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to my website!</h1>
        <p>This is a simple home page created using HTML and Bootstrap.</p>
    </div>

    @if (!Auth::check())
        <form action="/login" method="GET">
            @csrf
            <button type="submit">Login</button>
        </form>

        <form action="/register" method="GET">
            @csrf
            <button type="submit">Register</button>
        </form>

        <!-- TODO: ADD my blog tab-->
        <form action="/mypage" method="GET">
            @csrf
            <button type="submit">My Blog</button>
        </form>

    @else
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Log Out!</button>
        </form>
    @endif

    
    <form action="/posts" method="GET">
            @csrf
            <button type="submit">Create a blog</button>
    </form>

    
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
