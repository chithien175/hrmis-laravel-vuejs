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

        <!-- Tool Social -->
        <link href="{{ asset('katitheme/plugins/animate/css/animate.css') }}" rel="stylesheet">    
        <style>
            .social-button{
            display: inline-grid;
                position: fixed;
                bottom: 15px;
                left: 20px;
                min-width: 45px;
                text-align: center;
                z-index: 99999;
            }
            .social-button-content{
            display: inline-grid;   
            }
            .social-button a {padding:8px 0;cursor: pointer;position: relative;}
            .social-button i{
            width: 40px;
                height: 40px;
                background: #ff6666;
                color: #fff;
                border-radius: 100%;
                font-size: 20px;
                text-align: center;
                line-height: 1.9;
                position: relative;
                z-index: 999;
            }
            .social-button span{
            display: none;
            }
            .alo-circle {
                animation-iteration-count: infinite;
                animation-duration: 1s;
                animation-fill-mode: both;
                animation-name: zoomIn;
                width: 50px;
                height: 50px;
                top: 3px;
                right: -3px;
                position: absolute;
                background-color: transparent;
                -webkit-border-radius: 100%;
                -moz-border-radius: 100%;
                border-radius: 100%;
                border: 2px solid rgba(30, 30, 30, 0.4);
                opacity: .1;
                border-color: #0089B9;
                opacity: .5;
            }
            .alo-circle-fill {
            animation-iteration-count: infinite;
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-name: pulse;
                width: 60px;
                height: 60px;
                top: -2px;
                right: -8px;
                position: absolute;
                -webkit-transition: all 0.2s ease-in-out;
                -moz-transition: all 0.2s ease-in-out;
                -ms-transition: all 0.2s ease-in-out;
                -o-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
                -webkit-border-radius: 100%;
                -moz-border-radius: 100%;
                border-radius: 100%;
                border: 2px solid transparent;
                background-color: rgba(0, 175, 242, 0.5);
                opacity: .75;
            }
            .call-icon:hover > span, .mes:hover > span, .sms:hover > span, .zalo:hover > span{display: block}
            .social-button a span {
                border-radius: 2px;
                text-align: center;
                background: rgb(103, 182, 52);
                padding: 9px;
                display: none;
                width: 180px;
                margin-left: 10px;
                position: absolute;
                color: #ffffff;
                z-index: 999;
                top: 9px;
                left: 40px;
                transition: all 0.2s ease-in-out 0s;
                -moz-animation: headerAnimation 0.7s 1;
                -webkit-animation: headerAnimation 0.7s 1;
                -o-animation: headerAnimation 0.7s 1;
                animation: headerAnimation 0.7s 1;
            }
            @-webkit-keyframes "headerAnimation" {
                0% { margin-top: -70px; }
                100% { margin-top: 0; }
            }
            @keyframes "headerAnimation" {
                0% { margin-top: -70px; }
                100% { margin-top: 0; }
            }
            .social-button a span:before {
            content: "";
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 10px 10px 0;
            border-color: transparent rgb(103, 182, 52) transparent transparent;
            position: absolute;
            left: -10px;
            top: 10px;
            }
            /* Zalo Chat Widget */
            .zalo-chat-widget{
                bottom: 70px !important;
                right: 10px !important;
            }
        </style>

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        
        @yield('style')

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- FB SDK -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=1052172988324559"></script>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <!-- wpf loader Two -->
            <div id="wpf-loader-two">          
            <div class="wpf-loader-two-inner">
                <span>Tải trang...</span>
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

        <!-- tool social start -->
        @include('katitheme.partials.tool-social')
        <!-- tool social end -->

		<!-- all js here -->
		<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('katitheme/js/bootstrap.js') }}"></script>  
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.smartmenus.js') }}"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.smartmenus.bootstrap.js') }}"></script>  
        <!-- Product view slider -->
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.simpleGallery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('katitheme/js/jquery.simpleLens.js') }}"></script>
        <!-- slick slider -->
        <script type="text/javascript" src="{{ asset('katitheme/js/slick.js') }}"></script>
        <!-- Price picker slider -->
        <script type="text/javascript" src="{{ asset('katitheme/js/nouislider.js') }}"></script>
        <!-- Custom js -->
        <script src="{{ asset('katitheme/js/custom.js') }}"></script> 

        <!-- Tool Social -->
        <script>
            $(document).ready(function(){
                $('.user-support').click(function(event) {
                $('.social-button-content').slideToggle();
                });
            });
        </script>

        <!-- Zalo Chat Widget -->
        <!-- <div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div> -->
        <!-- <script src="https://sp.zalo.me/plugins/sdk.js"></script> -->

        @yield('script')
    </body>
</html>

