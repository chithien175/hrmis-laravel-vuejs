<header class="header-area">
    <div class="header-top bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="header-top-left">
                        <p>{{ getFieldCompany('company.slogan') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <div class="header-top-right text-right">
                        <ul>
                            <li><a href="{{ getFieldCompany('company.facebook') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ getFieldCompany('company.twitter') }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getFieldCompany('company.linkedin') }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ getFieldCompany('company.googleplus') }}"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{ getFieldCompany('company.youtube') }}"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 hidden-sm hidden-xs">
                    <div class="logo">
                        <h1><a href="{{ route('katitheme.homepage') }}">{{ getFieldCompany('company.name') }}</a></h1>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="header-middle-right">
                        <ul>
                            <li>
                                <div class="contact-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="contact-info">
                                    <p>MON - SAT (9AM - 5PM)</p>
                                    <span>Sunday colsed</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact-info">
                                    <p>EMAIL</p>
                                    <span>{{ getFieldCompany('company.email') }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-info">
                                    <p>ĐIỆN THOẠI</p>
                                    <span> {{ getFieldCompany('company.phone') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom"  id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="hidden-md hidden-lg col-sm-8 col-xs-6">
                    <div class="logo">
                        <h1><a href="{{ route('katitheme.homepage') }}">{{ getFieldCompany('company.name') }}</a></h1>
                    </div>
                </div>
                <div class="col-md-11 hidden-sm hidden-xs">
                    <div class="mainmenu">
                        <?php 
                            $options = array(
                                'id' => 'navigation',
                                'class' => '',
                                'sub_id' => '',
                                'sub_class' => 'submenu'
                            );

                            echo menu('frontend', $options);
                        ?>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-3">
                    <div class="search-wrap text-right">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 clear col-xs-3 hidden-md hidden-lg">
                    <div class="responsive-menu-wrap floatright"></div>
                </div>
            </div>
        </div>
    </div>
</header>