@extends('layouts.app')

@section('title', 'Blog | Login')

@section('content')
<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4">
        <div class="card-body">
            <h1 class="text-center">Login</h1>
            <div class="mb-3"></div>

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ url('login') }}" method="post" class="form-control">
                @csrf

                <!-- <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control" id="username" name="username">
                </div> -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="mb-3">
                    <div class="">Does not have an account? Register <a href="{{ url('register') }}" class="btn btn-outline-dark me-2">here</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection