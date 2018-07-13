<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="">

    <!-- Styles -->
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <div class="col-lg-12">
                <img class="img-responsive round-image" src="{{ url('/') }}/img/bandme.png" alt="">
                <div class="intro-text">
                    <span class="skills">
                            Your band page
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>What Is BandMe?</h2>
            <hr class="star-primary">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-14 text-center">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
        </div>
        <div class="col-lg-12 text-center">
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">
                Register
            </a>
            <br>(It's free!)
        </div>
    </div>
</div>
</section>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ url('/') }}/img/800x400.png" alt="1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Band 1</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/') }}/img/800x400.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Band 2</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/') }}/img/800x400.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Band 3</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@include('layouts.footer')
</body>
</html>
