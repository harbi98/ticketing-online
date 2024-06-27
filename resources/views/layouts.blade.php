<!DOCTYPE html>
<html>

<head>
    <title>Ticketing Online</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <nav class="navbar navbar-light navbar-expand-lg bg-light border-bottom">
            <div class="container">
                <a class="navbar-brand mr-auto" href="#">Online Ticketing</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.page') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-button">Logout</button>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="page-container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>