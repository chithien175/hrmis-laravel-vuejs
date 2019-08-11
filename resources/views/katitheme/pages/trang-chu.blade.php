@extends('katitheme.layouts.master')

<?php
    $page_title = (getFieldCompany('company.show_site_name') == 'true') ? $page_data['seo_title'] . ' - ' . getFieldCompany('company.site_title') : $page_data['seo_title'];
    $pape_description = $page_data['seo_description'];
    $page_keyword = $page_data['seo_keyword'];
    $page_url = url()->current();
?>

@section('title', $page_title)
@section('description', $pape_description)
@section('keywords', $page_keyword)

@section('fb_url', $page_url)
@section('fb_type', 'website')
@section('fb_title', $page_title)
@section('fb_des', $pape_description)

@section('content')

<?php
    $sliders = getGalleryBySlug('slider-trang-chu');
?>
<!-- Start slider -->
<section id="aa-slider">
    <div class="aa-slider-area">
        @if($sliders)
            <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    @foreach($sliders as $key => $slider)
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{ asset('images/gallery/' . $slider->image) }}" alt="{{ $slider->title }}" />
                        </div>
                    </li>     
                    @endforeach     
                </ul>
            </div>
            <!-- slider navigation btn -->
            <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
            </fieldset>
            </div>
        @endif
    </div>
</section>
<!-- / slider -->

@php
    $cate_slug_session1 = getFieldPage('home.cate_slug_session1');
    $products_session1 = getProductByCategorySlug($cate_slug_session1, 8);
@endphp
<!-- Products section -->
<section id="aa-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-product-area">
                        <div class="aa-product-inner">
                        <!-- start prduct navigation -->
                            <ul>
                                <li style="padding: 30px 10px; width: 100%; margin: 0 auto; color: #f33983; font-size: 30px; text-align: center;" >{{ getFieldPage('home.title_session1') }}</li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                            <!-- Start men product category -->
                                <div class="tab-pane fade in active" id="men">
                                    @if($products_session1)
                                    <ul class="aa-product-catg">
                                        <!-- start single product item -->
                                        @foreach($products_session1 as $key => $product)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#"><img src="{{ asset('images/product/' . $product->photo) }}" alt="{{ $product->name }}"></a>
                                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                                                    <figcaption>
                                                    <h4 class="aa-product-title"><a href="#">{{ $product->name }}</a></h4>
                                                    <!-- <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span> -->
                                                </figcaption>
                                            </figure>                        
                                            <!-- <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                                            </div>
                                            <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <a class="aa-browse-btn" href="{{ route('get.page-pCategory', $cate_slug_session1) }}">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                            <!-- / men product category -->     
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">        
                <div class="row">
                    <div class="aa-banner-area">
                        <a href="{{ getFieldPage('home.link_banner1') }}"><img src="{{ getFieldPage('home.image_banner1') }}" alt="vai ao dai"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@php
    $cate_slug_session2 = explode ( ',' , getFieldPage('home.cate_slug_session2') );
@endphp
<!-- popular section -->
<section id="aa-popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <ul>
                            <li style="padding: 30px 10px; width: 100%; margin: 0 auto; color: #f33983; font-size: 30px; text-align: center;" >{{ getFieldPage('home.title_session2') }}</li>
                        </ul>
                        <!-- start prduct navigation -->
                        @if($cate_slug_session2)
                        <ul class="nav nav-tabs aa-products-tab">  
                            @foreach($cate_slug_session2 as $key => $cate)
                                <li class="{{ ($key==0)?'active':'' }}"><a href="#{{ $cate }}" data-toggle="tab">{{ getProductCategoryName($cate) }}</a></li>      
                            @endforeach              
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Start men popular category -->
                            @foreach($cate_slug_session2 as $key => $cate)
                            <div class="tab-pane fade in text-center {{ ($key==0)?'active':'' }}" id="{{ $cate }}">
                                @if($products_session2 = getProductByCategorySlug($cate, 8))
                                <ul class="aa-product-catg aa-popular-slider">
                                    @foreach($products_session2 as $key => $product)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{ asset('images/product/' . $product->photo) }}" alt="{{ $product->name }}"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                                                <figcaption>
                                                <h4 class="aa-product-title"><a href="#">{{ $product->name }}</a></h4>
                                                <!-- <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span> -->
                                            </figcaption>
                                        </figure>                     
                                        <!-- <div class="aa-product-hvr-content">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                                        </div>
                                        <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                                    </li>       
                                    @endforeach                    
                                </ul>
                                <a class="aa-browse-btn" href="{{ route('get.page-pCategory', $cate) }}">Xem tất cả "{{ getProductCategoryName($cate) }}" <span class="fa fa-long-arrow-right"></span></a>
                                @endif
                            </div>
                            @endforeach
                            <!-- / popular product category -->   
                        </div>
                        @endif
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<!-- / popular section -->
<!-- Support section -->
<section id="aa-support">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="aa-support-area">
        <!-- single support -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>{{ getFieldPage('home.title1_banner2') }}</h4>
                <p>{{ getFieldPage('home.des1_banner2') }}</p>
            </div>
        </div>
        <!-- single support -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>{{ getFieldPage('home.title2_banner2') }}</h4>
                <p>{{ getFieldPage('home.des2_banner2') }}</p>
            </div>
        </div>
        <!-- single support -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>{{ getFieldPage('home.title3_banner2') }}</h4>
                <p>{{ getFieldPage('home.des3_banner2') }}</p>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
<!-- / Support section -->

@php
    $cate_slug_session3 = getFieldPage('home.cate_slug_session3');
    $posts_session3 = getPostByCategorySlug($cate_slug_session3);
@endphp
<!-- Latest Blog -->
<section id="aa-latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-latest-blog-area">
                    <h2>{{ getFieldPage('home.title_session3') }}</h2>
                    @if($posts_session3)
                    <div class="row">
                        @foreach($posts_session3 as $key => $post)
                        <div class="col-md-3 col-sm-3">
                            <div class="aa-latest-blog-single">
                                <figure class="aa-blog-img">                    
                                    <a href="#"><img src="{{ asset('images/post/' . $post->photo) }}" alt="{{ $post->title }}"></a>  
                                    <figcaption class="aa-blog-img-caption">
                                        <span href="#"><i class="fa fa-clock-o"></i>{{ $post->created_at->format('d/m/Y h:m') }}</span>
                                    </figcaption>                          
                                </figure>
                                <div class="aa-blog-info">
                                    <h3 class="aa-blog-title"><a href="#">{{ shorten_text($post->title, 35, '...', false) }}</a></h3>
                                    <p>{{ shorten_text($post->description, 90, '...', false) }}</p> 
                                    <a href="#" class="aa-read-mor-btn">Xem thêm <span class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>    
        </div>
    </div>
</section>
<!-- / Latest Blog -->
@endsection

@section('script')
<!-- To Slider JS -->
<script src="{{ asset('katitheme/js/sequence.js') }}"></script>
<script src="{{ asset('katitheme/js/sequence-theme.modern-slide-in.js') }}"></script>  
@endsection