<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Short URL | Web App</title>
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

<body>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4 img-fluid rounded-5" src="{{ asset('img/logo.png') }}" alt="logo"
            width="150">
        <h1 class="display-5 fw-bold">Short URL</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Short your URL easily and quickly by populating the form with your long URL</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form method="POST" action="{{ route('store.shorturl') }}" novalidate="true">
                    @csrf
                    <div class="mb-3">
                        <input type="url" name="url" class="form-control form-control-lg" id="url"
                            aria-describedby="url" required value="http://google.com">
                        <div id="url" class="form-text">We're not collecting any additional information here.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-lg px-4 gap-3">Short me!</button>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg px-4">Clear form</a>
                </form>
            </div>

        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            @error('url')
                <div class="alert alert-danger mt-5">{{ $message }}</div>
            @enderror
        </div>
        @if (\Session::has('success'))
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <div class="alert alert-secondary mt-5" role="alert">
                    <a href="{!! \Session::get('success') !!}" target="_blank" class="text-dark">
                        {!! \Session::get('success') !!}
                    </a>
                    <input type="hidden" id="shortUrl" value="{!! \Session::get('success') !!}" />
                    <span onclick="copyToClipboard()" class="cursor-pointer" >
                        <svg click="copyToClipboard()" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif
    </div>
    </div>

   @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script>
        function copyToClipboard() {
            /* Get the text field */
            var copyText = document.getElementById("shortUrl");

            /* Alert the copied text */
            alert("Copied short url: " + copyText.value);
        }
    </script>
</body>

</html>
