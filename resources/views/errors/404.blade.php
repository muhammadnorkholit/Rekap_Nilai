<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Nilai </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">

    <style>
        .alert-notify {
            display: inline-block;
            margin: 0px auto;
            position: fixed;
            transition: all 20s ease-in-out 3s;
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
</head>

<body class="bg-default">
    <!-- Navbar -->
    <div class="main-content">
        <!-- Header -->
        <div class="header  bg-gradient-primary ">

            <div class="container  min-vh-100 d-flex align-items-center ">
                <div class="d-flex flex-column w-100 align-items-center">

                    <h1 style="font-size: 3rem;color:white;">Halaman Tidak Ditemukan</h1>
                    <a href="{{ url()->previous() }}">
                        <h4 class="text-white d-flex align-items-center "><i class=" mr-2 ni ni-bold-left"></i> Kembali
                            Ke
                            Home
                        </h4>
                    </a>

                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->

    </div>
    <!-- Footer -->
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
