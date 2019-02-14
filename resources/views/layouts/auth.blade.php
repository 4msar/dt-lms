<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Library Management Sysytem by Laravel">
    <meta name="author" content="4msar">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') - {{ config('app.name', 'LMS') }}</title>
    <link href="{{ asset('assets/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
<style type="text/css">
    .navbar-laravel {
        background-color: #fff;
        -webkit-box-shadow: 0 2px 4px rgba(0,0,0,.04);
        box-shadow: 0 2px 4px rgba(0,0,0,.04);
    }
</style>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            @yield('content')
        </div>

    </div>
    <!-- End Wrapper -->
    <script src="{{ asset('assets/js/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sticky-kit-master/dist/sticky-kit.mi') }}n.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>