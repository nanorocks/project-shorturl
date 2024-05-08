<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Short URL | Short your URL easily and quickly by populating the form with your long URL</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .small-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>

<body style="background: #1f2937; color: white;">
    <nav class="navbar navbar-dark fixed-top" style="">
        <div class="container-fluid">
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Short URL</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        @auth
                            <li class="nav-item mb-3">
                                You're logged in as: {{ Auth::user()->name }}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}"> {{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}"> {{ __('Profile') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"> {{ __('Logout') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sso.redirect') }}"> {{ __('SSO Log in ') }}</a>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4 img-fluid rounded-5" src="{{ asset('img/logo.png') }}" alt="logo"
            width="150">
        <h1 class="display-5 fw-bold">Short URL</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4" style="font-weight: 200">Short your URL easily and quickly by populating the form with
                your long URL</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form method="POST" action="{{ route('store.shorturl') }}"
                    onsubmit="event.preventDefault();onSubmit()" id="submit-form">
                    @csrf
                    <div class="mb-3">
                        <input style="background: #101827;" type="url" name="url"
                            class="form-control form-control-lg border-0 text-white" id="url"
                            aria-describedby="url" required placeholder="http://..." value="{{ old('url') }}">
                        <div id="url" class="form-text">We're not collecting any additional information here.
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div id='recaptcha' class="g-recaptcha" data-sitekey="6LefCJQhAAAAABZHVta9qzpnfbwOaeVc0rF9KVjV"
                            data-callback="onCompleted" data-size="invisible"></div>
                        <button style="font-weight: 200" type="submit"
                            class="btn btn-secondary btn-lg px-4 gap-3 m-1 text-capitalize rounded-lg border-0">Short
                            me!</button>
                        <a style="font-weight: 200" href="{{ route('home') }}"
                            class="btn btn-secondary btn-lg px-4 m-1 text-capitalize rounded-lg border-0">Clear form</a>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-6 mx-auto">
            @error('url')
                <div style="background: #101827; color: white;" class="alert mt-3 rounded-lg">{{ $message }}
                </div>
            @enderror
            @if (\Session::has('success'))
                <div style="background: #101827; color: white;" class="alert mt-3 rounded-lg">
                    {!! \Session::get('success') !!}
                </div>
            @endif
        </div>
    </div>
    </div>

    @include('includes.footer')


    <script>
        function onSubmit() {
            grecaptcha.execute();
        }

        function onCompleted(token) {
            document.getElementById("submit-form").submit();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
