<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Google Open Graph Tags -->
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/company/' . getFieldCompany('company.favicon')) }}">

        <!-- FB Open Graph Tags -->
        <meta property="og:url"           content="@yield('fb_url')" />
        <meta property="og:type"          content="@yield('fb_type')" />
        <meta property="og:title"         content="@yield('fb_title')" />
        <meta property="og:description"   content="@yield('fb_des')" />

		<!-- all css here -->
        <!-- Font awesome -->
        <link href="{{ asset('katitheme/css/font-awesome.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('katitheme/css/bootstrap.css') }}" rel="stylesheet">   
        <!-- SmartMenus jQuery Bootstrap Addon CSS -->
        <link href="{{ asset('katitheme/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
        <!-- Product view slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('katitheme/css/jquery.simpleLens.css') }}">    
        <!-- slick slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('katitheme/css/slick.css') }}">
        <!-- price picker slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('katitheme/css/nouislider.css') }}">
        <!-- Theme color -->
        <link id="switcher" href="{{ asset('katitheme/css/theme-color/default-theme.css') }}" rel="stylesheet">
        <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
        <!-- Top Slider CSS -->
        <link href="{{ asset('katitheme/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

        <!-- Main style sheet -->
        <link href="{{ asset('katitheme/css/style.css') }}" rel="stylesheet">    

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <!-- wpf loader Two -->
            <div id="wpf-loader-two">          
            <div class="wpf-loader-two-inner">
                <span>Loading</span>
            </div>
            </div> 
            <!-- / wpf loader Two -->   
        <!-- SCROLL TOP BUTTON -->
            <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
        <!-- END SCROLL TOP BUTTON -->
		<!-- heared area start -->
        @include('katitheme.partials.header')
		<!-- heared area end -->

        @yield('content')

        <!-- footer-area start  -->
        @include('katitheme.partials.footer')
		<!-- footer-area end  -->

		<!-- all js here -->
		<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('katitheme/js/bootstrap.js') }}"></script>  
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.smartmenus.js') }}"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.smartmenus.bootstrap.js') }}"></script>  
        <!-- To Slider JS -->
        <script src="{{ asset('katitheme/js/sequence.js') }}"></script>
        <script src="{{ asset('katitheme/js/sequence-theme.modern-slide-in.js') }}"></script>  
        <!-- Product view slider -->
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.simpleGallery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.simpleLens.js') }}"></script>
        <!-- slick slider -->
        <script type="text/javascript" src="{{ asset('katitheme/js/slick.js') }}"></script>
        <!-- Price picker slider -->
        <script type="text/javascript" src="{{ asset('katitheme/js/nouislider.js') }}"></script>
        <!-- Custom js -->
        <script src="{{ asset('katitheme/js/custom.js') }}"></script> 
    </body>
</html>

