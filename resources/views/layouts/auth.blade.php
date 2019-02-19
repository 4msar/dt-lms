<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') - {{ config('app.name', 'LMS') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{ url('/') }}">
                        <img style="height: 150px;" class="align-content" src="{{ asset('assets/images/logo2.png')}}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/lib/popper/popper.min.js')}}"></script>
    <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/lib/jquery-match-height/jquery.matchHeight-min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>