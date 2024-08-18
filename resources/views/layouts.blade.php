<!DOCTYPE html>
<html>

<head>
    <title>Ticketing Online</title>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ URL::asset('app.js') }}" defer rel="script"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>

<body>
    <div class="main">
        <div class="bgin" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ URL::asset('assets/index.jpeg') }}');">
            <header class="text-white py-3">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="social-icons d-flex gap-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                    <nav>
                        <ul class="nav nav-custom text-center">
                            @guest
                                <li class="nav-item"><a href="#" class="nav-link text-white">HOME</a></li>
                                <li class="nav-item"><a href="#artists" class="nav-link text-white">ARTISTS</a></li>
                                <li class="nav-item"><a href="#about-event" class="nav-link text-white">ABOUT EVENT</a></li>
                                <li class="nav-item"><a href="{{ route('index.form') }}" class="btn btn-outline-light rounded-0 bg-black">Buy Tickets</a></li>
                            @else
                                <li class="nav-item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="logout-button btn btn-outline-danger">Logout</button>
                                    </form>
                                </li>
                            @endguest
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