<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Create Post </title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.css') }}">
</head>

<body>

    <div class="container">
        <h1>Create Post</h1>
        <form method="POST" action="{{ url('posts') }}" class="form-control">
            @csrf
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
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</body>

</html>