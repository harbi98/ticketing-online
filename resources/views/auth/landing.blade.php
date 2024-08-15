@extends('layouts')
@section('content')
<main class="auth-form">
    <section>
        <main class="hero text-center text-white">
            <div class="container">
                <div class="display-1" style="margin-top: -73vh">
                    <img src="{{asset('assets/main-text.png')}}"></img>
                </div>
                <div class="lead mt-4">
                    <img src="{{asset('assets/sub-text.png')}}" height="35"></img>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <a href="#" class="btn btn-outline-light bg-black text-white btn-lg w-25 rounded-0"
                        style="z-index: 1">Learn More</a>
                    <a href="{{ route('index.form') }}" class="btn btn-light btn-lg rounded-0" style="z-index: 1">Buy
                        Tickets & VIP</a>
                </div>
            </div>
        </main>
    </section>
    <section>
        <div class="container-fluid p-0" style="margin-top: -30vh">
            <img src="{{asset('assets/bands.png')}}" class="img-fluid bands-img w-100" height="100"></img>
        </div>
    </section>
    <section class="container-fluid event-section" style="background-image: url('{{asset('assets/vector-filter.png')}}')">
        <div class="container" style="margin-top: 20vh;">
            <div class="row text-center justify-content-center">
                <div class="col-12 display-1">
                    <img src="{{ asset('assets/second-main-text.png') }}"></img>
                </div>
            </div>
            <div class="container-fluid text-white">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-md-auto text-end pe-5" style="margin-top: -10vh">
                        <img src="assets/image1.png" alt="Logo 1" class="img-fluid mx-3">
                        <img src="assets/image2.png" alt="Logo 2" class="img-fluid mx-3">
                        <img src="assets/image3.png" alt="Logo 3" class="img-fluid mx-3">
                    </div>
                    <div class="col-auto">
                        <img src="{{asset('assets/rectangle.png')}}"></img>
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
                        <a href="{{ route('index.form') }}" class="btn btn-outline-light btn-lg w-50 rounded-0">Buy Tickets & VIP Now</a>
                    </div>
                </div>
            </div>

            <!-- <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="presented-by mb-1">Presented by:</p>
                    <p class="presenters mb-4">
                        SR PRODUCTION IN PARTNERSHIP<br>
                        WITH INK THAT RIGHT TATTOO STUDIO,<br>
                        ARKI VENTURE MUSIC PRODUCTION, MEDIAONE
                    </p>
                    <div class="logos d-flex justify-content-center mb-5">
                        <img src="assets/image1.png" alt="Logo 1" class="img-fluid mx-2">
                        <img src="assets/image2.png" alt="Logo 2" class="img-fluid mx-2">
                        <img src="assets/image3.png" alt="Logo 3" class="img-fluid mx-2">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="venue mb-1">Venue:</p>
                    <p class="event-date">
                        Saturday, 26th October 2024<br>
                        @ Almendras Gym Davao City
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="#" class="btn btn-outline-light btn-lg">Buy Tickets & VIP Now</a>
                </div>
            </div> -->
        </div>
    </section>
    <section class="container-fluid contact-section" style="background-image: url('{{asset('assets/bottom-mask.png')}}')">

    </section>
</main>
@endsection