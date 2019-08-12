<!-- Start header section -->
<header id="aa-header">
<!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">
                        
                        <div class="cellphone hidden-xs">
                            <p><span class="fa fa-envelope"></span><a href="mailto:test@gmail.com">{{ getFieldCompany('company.email') }}</a> </p>
                        </div>
                        <!-- start cellphone -->
                        <div class="cellphone hidden-xs">
                            <p><span class="fa fa-phone"></span><a href="tel:00-62-658-658">{{ getFieldCompany('company.phone') }}</a></p>
                        </div>
                        <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                <li><a href="{{ route('login') }}">Đăng nhập quản trị</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                        <!-- Text based logo -->
                            <!-- img based logo -->
                            <a href="{{ route('katitheme.homepage') }}">
                                @if(getFieldCompany('company.logo'))
                                    <img src="{{ asset('images/company/' . getFieldCompany('company.logo')) }}" alt="{{ getFieldCompany('company.name') }}" width="50" style="margin-top: -30px;"> 
                                @endif
                                <p style="float:none;">
                                    <strong>{{ getFieldCompany('company.name') }}</strong> <span>{{ getFieldCompany('company.slogan') }}</span>
                                </p>
                            </a>
                            
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->
                        
                        <!-- search box -->
                        <div class="aa-search-box">
                            <form action="">
                                <input type="text" name="" id="" placeholder="Từ khoá tìm kiếm ... ">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>
<!-- / header section -->
<!-- menu -->
<section id="menu">
    <div class="container">
        <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>          
            </div>
            <div class="navbar-collapse collapse">
            <!-- Left nav -->
            @php
                $options = array(
                    'id' => '',
                    'class' => 'nav navbar-nav',
                    'sub_id' => '',
                    'sub_class' => 'dropdown-menu'
                );
                echo menu('main-menu', $options);
            @endphp
        </div>
        </div>       
    </div>
</section>
<!-- / menu -->