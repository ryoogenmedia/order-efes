<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/material/nft-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 13:05:25 GMT -->

<head>
    @include('assets.meta')
    <title>Landing | Efes</title>
    @include('assets.css')

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar">

    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing navbar-dark bg-light  fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="card-logo card-logo-dark"
                        alt="logo dark" height="17">
                    <img src="{{ asset('assets/images/logo-light.png') }}" class="card-logo card-logo-light"
                        alt="logo light" height="17">
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0 " id="navbar-example">
                        <x-navbar />
                    </ul>

                    <div class="">
                        @guest
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                        @endguest
                        @auth
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning">Shop</a>
                        @endauth
                    </div>
                </div>

            </div>
        </nav>
        <div class="bg-overlay bg-overlay-pattern"></div>
        <!-- end navbar -->

        @yield('content')

        <!-- Start footer -->
        <x-footer />
        <!-- end footer -->

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

    </div>
    <!-- end layout wrapper -->


    @include('assets.js')
</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/nft-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 13:05:26 GMT -->

</html>