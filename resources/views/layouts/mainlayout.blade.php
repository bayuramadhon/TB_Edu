<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                    <div class="sidebar col-lg-2 collapse d-lg-block" id="#navbarTogglerDemo03">
                    @if(Auth::user())
                        @if(Auth::user()->role_id == 1)
                        <a href="/dashboard"  class=" {{Request::is('dashboard') ? 'active' : ' '}}">Dashboard</a>
                        <a href="/books" class=" {{Request::is('books') ? 'active' : ' '}}">Books</a>
                        <a href="/categories" class=" {{Request::is('categories') ? 'active' : ' '}}">Categories</a>
                        <a href="/users" class=" {{Request::is('users') ? 'active' : ' '}}">Users</a>
                        <a href="/rent-logs" class=" {{Request::is('rent-logs') ? 'active' : ' '}}">Rent Log</a>
                        <a href="/">Book list</a>
                        <a href="/book-rent">Book Rent</a>
                        <a href="book-return">book-return</a>
                        <a href="/logout">Logout</a>
                        @else
                        <a href="/profile" class=" {{Request::is('books') ? 'active' : ' '}}">Profile</a>
                        <a href="/">Book list</a>
                        <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Login</a>
                    @endif
                    </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
