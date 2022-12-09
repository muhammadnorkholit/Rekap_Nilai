<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>R </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">
</head>
<style>
    label {
        cursor: pointer;
    }

    body *::-webkit-scrollbar {
        width: 10px;
        height: 10px;
        background: #1c396a;
    }

    body *::-webkit-scrollbar-thumb {
        background: #426bb1;

    }

    .alert-notify {
        display: inline-block;
        margin: 0px auto;
        position: fixed;
        transition: all 0.5s 5s ease-in-out 0s;
        z-index: 1080;
        top: -100%;
        left: 0px;
        right: 0px;
        animation-iteration-count: 1;
    }

    .alert-notify.show {
        top: 15px
    }
</style>

<body>
    <!-- Sidenav -->
    @include('component.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('component.navbar')
        <!-- Header -->
        <!-- Header -->

        @yield('content')


        <!-- Page content -->


    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets') }}/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('assets') }}/js/demo.min.js"></script>
</body>

</html>
