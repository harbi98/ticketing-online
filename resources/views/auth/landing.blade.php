@extends('layouts')
@section('content')
<main class="auth-form">
    <section id="home">
        <div class="hero text-center text-white">
            <div class="container">
                <div class="display-1" style="margin-top: -50vh">
                    <img src="{{asset('assets/main-text.png')}}" class="img-fluid"></img>
                </div>
                <div class="lead mt-4">
                    <img src="{{asset('assets/sub-text.png')}}" height="35" class="img-fluid"></img>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-5 flex-wrap">
                    <a href="#contact-us" class="btn btn-outline-light bg-black text-white btn-lg rounded-0"
                        style="z-index: 1; width: 25vh;">Learn More</a>
                    <a href="{{ route('index.form') }}" class="btn btn-light btn-lg rounded-0" style="z-index: 1; width: 25vh;">Buy
                        Tickets & VIP</a>
                </div>
            </div>
        </div>
    </section>

    <section id="artists">
        <div class="hero2 container-fluid p-0">
            <img src="{{asset('assets/bands.png')}}" class="img-fluid bands-img w-100"></img>
        </div>
    </section>

    <section id="about-event" class="container-fluid event-section" style="background-image: url('{{asset('assets/vector-filter.png')}}');">
        <div class="container" style="margin-top: 15vh;">
            <div class="row text-center justify-content-center">
                <div class="col-12 display-1">
                    <img src="{{ asset('assets/second-main-text.png') }}" class="img-fluid"></img>
                </div>
            </div>
            <div class="container-fluid text-white">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-md-auto text-end pe-5">
                        <img src="assets/image1.png" alt="Logo 1" class="img-fluid mx-3">
                        <img src="assets/image2.png" alt="Logo 2" class="img-fluid mx-3">
                        <img src="assets/image3.png" alt="Logo 3" class="img-fluid mx-3">
                    </div>
                    <div class="col-auto">
                        <img src="{{asset('assets/rectangle.png')}}" class="img-fluid"></img>
                    </div>
                    <div class="col-auto text-start ps-5">
                        <p class="presented-by mb-1"><b>PRESENTED BY:</b></p>
                        <p class="presenters mb-0 pt-2">
                            SR PRODUCTION IN PARTNERSHIP<br>
                            WITH INK THAT RIGHT TATTOO STUDIO,<br>
                            ARKI VENTURE MUSIC PRODUCTION, MEDIAONE
                        </p>
                        <br>
                        <p class="presented-by mb-1"><b>VENUE:</b></p>
                        <p class="presenters mb-0 pt-2">
                            Saturday, 26th October 2024<br>
                            @ Almendras Gym Davao City
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center mt-4">
                    <div class="col-auto d-flex justify-content-center w-50">
                        <a href="{{ route('index.form') }}" class="btn btn-outline-light btn-lg w-50 rounded-0">Buy
                            Tickets & VIP Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-us" class="container-fluid contact-section" style="background-image: url('{{asset('assets/bottom-mask.png')}}'); background-size: cover;">
        <div class="container" style="margin-top: 15vh;">
            <div class="row text-center justify-content-center">
                <div class="col-12 display-1">
                    <img src="{{ asset('assets/third-main-text.png') }}" class="img-fluid"></img>
                </div>
                <div class="container-fluid text-white">
                    <div class="row justify-content-center align-items-start">
                        <div class="col-md-5 col-lg-3 text-center mb-4">
                            <p class="presented-by mb-3"><b>CONTACT US</b></p>
                            <div class="d-grid gap-3">
                                <input type="text" class="form-control rounded-0 py-2 custom-texts bg-light" placeholder="YOUR NAME" />
                                <input type="text" class="form-control rounded-0 py-2 custom-texts bg-light" placeholder="YOUR EMAIL" />
                                <a href="#" class="btn btn-outline-light bg-black w-100 rounded-0 py-2">SEND MESSAGE</a>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-3 text-center">
                            <p class="presented-by mb-3"><b>FOLLOW US</b></p>
                            <div class="d-grid gap-3">
                                <a href="#" class="btn btn-outline-light bg-black w-100 rounded-0 py-2">FACEBOOK</a>
                                <a href="#" class="btn btn-outline-light bg-black w-100 rounded-0 py-2">INSTAGRAM</a>
                                <a href="#" class="btn btn-outline-light bg-black w-100 rounded-0 py-2">YOUTUBE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black w-100 border-top border-5" style="z-index: 1">
        <div class="container-fluid bg-transparent w-75">
            <div class="row py-3">
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <div class="social-icons d-flex gap-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <div class="nav-links d-flex gap-4">
                        <a href="#" class="nav-link text-white">HOME</a>
                        <a href="#artists" class="nav-link text-white">ARTISTS</a>
                        <a href="#about-event" class="nav-link text-white">ABOUT EVENT</a>
                        <a href="{{ route('index.form') }}" class="nav-link text-white">Buy Tickets</a>
                    </div>
                </div>
            </div>
            <hr class="border border-5 w-75 mx-auto">
            <div class="row py-4">
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <p class="text-white" style="font-size: 1rem; font-family: 'CustomFont', sans-serif;">OCTOBER METAL MAYHEM</p>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a href="#" class="btn btn-outline-light bg-black rounded-0">BUY TICKETS & VIP NOW</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
