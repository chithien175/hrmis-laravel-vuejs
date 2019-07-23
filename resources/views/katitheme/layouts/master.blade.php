<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Martxa || Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="{{ asset('katitheme/images/favicon.png') }}">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
		<!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/bootstrap.min.css') }}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/animate.css') }}">
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/owl.carousel.css') }}">
		<!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/font-awesome.min.css') }}">
		<!-- magnific-popup.css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/magnific-popup.css') }}">
		<!-- slicknav.min.css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/slicknav.min.css') }}">
		<!-- style css -->
		<link rel="stylesheet" href="{{ asset('katitheme/css/styles.css') }}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('katitheme/css/responsive.css') }}">
		<!-- modernizr css -->
        <script src="{{ asset('katitheme/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- preloder-wrap -->
        <div id="cssLoader3" class="preloder-wrap">
            <div class="loader">
                <div class="child-common child4"></div>
                <div class="child-common child3"></div>
                <div class="child-common child2"></div>
                <div class="child-common child1"></div>
            </div>
        </div>
        <!-- preloder-wrap -->
        <!-- search-area -->
        <div class="search-area">
            <span class="closs-btn">Close</span>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search Here">
                                <button type="button" name="button" class="btn-style">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search-area -->
		<!-- heared area start -->
        @include('katitheme.partials.header')
		<!-- heared area end -->

        @yield('content')

        <!-- footer-area start  -->
        @include('katitheme.partials.footer')
		<!-- footer-area end  -->

		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="{{ asset('katitheme/js/vendor/jquery-1.12.4.min.js') }}"></script>
		<!-- bootstrap js -->
        <script src="{{ asset('katitheme/js/bootstrap.min.js') }}"></script>
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <script src="{{ asset('katitheme/js/owl.carousel.min.js') }}"></script>
		<!-- counterup.main.js -->
        <script src="{{ asset('katitheme/js/counterup.main.js') }}"></script>
		<!-- isotope.pkgd.min.js -->
        <script src="{{ asset('katitheme/js/imagesloaded.pkgd.min.js') }}"></script>
		<!-- isotope.pkgd.min.js -->
        <script src="{{ asset('katitheme/js/isotope.pkgd.min.js') }}"></script>
		<!-- jquery.waypoints.min.js -->
        <script src="{{ asset('katitheme/js/jquery.waypoints.min.js') }}"></script>
		<!-- jquery.magnific-popup.min.js -->
        <script src="{{ asset('katitheme/js/jquery.magnific-popup.min.js') }}"></script>
		<!-- jquery.slicknav.min.js -->
        <script src="{{ asset('katitheme/js/jquery.slicknav.min.js') }}"></script>
		<!-- snake.min.js -->
        <script src="{{ asset('katitheme/js/snake.min.js') }}"></script>
		<!-- wow js -->
        <script src="{{ asset('katitheme/js/wow.min.js') }}"></script>
		<!-- plugins js -->
        <script src="{{ asset('katitheme/js/plugins.js') }}"></script>
		<!-- main js -->
        <script src="{{ asset('katitheme/js/scripts.js') }}"></script>
    </body>
</html>

