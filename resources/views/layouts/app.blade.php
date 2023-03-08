<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #08FDD8;
        }
        .card {
            margin: auto;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card my-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">MyApp</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                        </li>
                        <li class="nav-item {{ Request::is('classes') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('classes.index') }}">Classes</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>

            <div class="card-body">
                @if(session()->has('success'))
                <div class="alert alert-success mt-3">
                    {{ session()->get('success') }}
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
