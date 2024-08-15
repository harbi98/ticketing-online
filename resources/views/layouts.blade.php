<!DOCTYPE html>
<html>

<head>
    <title>Ticketing Online</title>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ URL::asset('app.js') }}" defer rel="script"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    

</head>

<body>
    <div class="main">
        <div class="bgin" style="background-image: url('{{ URL::asset('assets/index.jpeg') }}');">
            <!-- <nav class="navbar navbar-expand-xl navbar-dark mt-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="social-links">
                        <a class="navbar-brand dots" href="#">
                            <i class="fa-brands fa-facebook-f icons"></i>
                        </a>
                        <a class="navbar-brand dots" href="#">
                            <i class="fa-brands fa-x-twitter icons"></i>
                        </a>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login.page') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">ARTIST</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">CONTACT</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-md btn-outline-danger text-white" href="{{ route('index.form') }}">BUY
                                    TICKETS</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-button btn btn-outline-danger">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->
            <header class="text-white py-3">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="social-icons d-flex gap-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                    <nav>
                        <ul class="nav">
                            <li class="nav-item"><a href="#" class="nav-link text-white">Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">Artists</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">About Event</a></li>
                            <li class="nav-item"><a href="{{ route('index.form') }}" class="btn btn-outline-light">Buy Tickets</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
        <div class="page-container">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>