<!-- FILEPATH: /C:/laragon/www/midterm_pweb/resources/views/dashboard/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Welcome to the Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Recent Activity</h2>
            <ul>
                <li>John Doe posted a new article</li>
                <li>Jane Smith updated her profile picture</li>
                <li>Bob Johnson commented on a post</li>
            </ul>
        </section>
        <section>
            <h2>Statistics</h2>
            <p>Total Users: 100</p>
            <p>Total Posts: 500</p>
            <p>Total Comments: 1000</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2021 My Website</p>
    </footer>
</body>
</html>
