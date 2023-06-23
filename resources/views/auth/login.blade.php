<!DOCTYPE html>
<html  lang="EN" xml:lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="favicon.ico" type="">

    <title> cryptokaktus </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- background image-->
    <div class="hero_area">
        <div class="hero_bg_box">
            <div class="bg_img_box">
                <img src="hero-bg.png" alt="">
            </div>
        </div>

        <!-- header section strats -->
        <header class="header_section">

            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ url('/')}}">
                        <span>cryptokaktus</span>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register')}}">register</a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </header>
        <!-- end header section -->

        <!-- section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="detail-box">
                                        <!-- Section: Design Block -->
                                        <section class="background-radial-gradient overflow-hidden">
                                            <style>
                                                .bg-glass {
                                                    background-color: hsla(0, 0%, 100%, 0.9) !important;
                                                    backdrop-filter: saturate(200%) blur(25px);
                                                }

                                            </style>
                                            @include('flash-message')
                                            <div class="card bg-glass">
                                                <div class="card-body px-4 py-5 px-md-5">
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                                        <!-- Email input -->
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label" for="form3Example3">
                                                                Email address</label>
                                                            <input type="email" id="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                             name="email" value="{{ old('email') }}" required
                                                             autocomplete="email" autofocus />
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <!-- Password input -->
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label" for="form3Example4">
                                                                Password
                                                            </label>
                                                            <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="current-password">
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <!-- Submit button -->
                                                        <button type="submit"
                                                        style="border-color:#844fc1;background-color:#844fc1"
                                                        class="btn btn-primary btn-block mb-4">
                                                            Sign in
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                        </section>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="slider-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- end section -->
    </div>

    <!-- footer section -->
    <section class="footer_section">
        <div class="container">
            <p>&copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="#">cryptokaktus</a>
            </p>
        </div>
    </section>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350)
        $('.invalid-feedback').delay(4000).fadeOut(350)
    </script>
</body>
</html>
