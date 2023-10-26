<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.css') }}">
</head>

<body>
    @include('layouts.app.header')

    <div class="container">
        @yield('content')

        @include('layouts.app.footer')
    </div>
</body>

</html>