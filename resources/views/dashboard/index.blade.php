<!DOCTYPE html>
<html>
<head>
    <title>Welcome to My Website</title>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <p>Thank you for visiting my website. Please take a look around and let me know if you have any questions.</p>
    <form action="/posts" method="GET">
        @csrf
        <button type="submit">Create a blog</button>
    </form>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Log Out!</button>
    </form>
</body>
</html>

