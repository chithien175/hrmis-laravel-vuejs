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
        <div id="sequence" class="seq">
        <div class="seq-screen">
            <ul class="seq-canvas">
                <!-- single slide item -->
                <li>
                    <div class="seq-model">
                        <img data-seq src="{{ asset('katitheme/hinhanhaodai/banner1.jpg') }}" alt="Men slide img" />
                    </div>
                </li>
                <!-- single slide item -->
                <li>
                    <div class="seq-model">
                        <img data-seq src="{{ asset('katitheme/hinhanhaodai/banner2.jpg') }}" alt="Wristwatch slide img" />
                    </div>
                </li>
                <!-- single slide item -->
                <li>
                    <div class="seq-model">
                        <img data-seq src="{{ asset('katitheme/hinhanhaodai/banner3.png') }}" alt="Women Jeans slide img" />
                    </div>
                </li>                 
            </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
            <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
            <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
        </div>
    </div>
</section>
<!-- / slider -->

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
                <li style="padding: 30px 10px; width: 100%; margin: 0 auto; color: #f33983; font-size: 30px; text-align: center;" >VẢI ÁO DÀI MỚI NHẤT NĂM 2019</li>
                
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                <!-- Start men product category -->
                <div class="tab-pane fade in active" id="men">
                    <ul class="aa-product-catg">
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai1.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                        
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai2.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai3.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai4.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai5.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai6.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai7.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai8.jpg') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>     
                    
                    </ul>
                    <a class="aa-browse-btn" href="#">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / men product category -->
                <!-- start women product category -->
                <div class="tab-pane fade" id="women">
                    <ul class="aa-product-catg">
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-1.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-2.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-3.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-4.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-5.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>
                        
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-6.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-7.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-1.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>                        
                    </ul>
                    <a class="aa-browse-btn" href="#">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / women product category -->
                <!-- start sports product category -->
                <div class="tab-pane fade" id="sports">
                    <ul class="aa-product-catg">
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-1.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-2.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-3.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-4.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-5.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-6.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-7.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/sports/sport-8.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>                        
                    </ul>
                </div>
                <!-- / sports product category -->
                <!-- start electronic product category -->
                <div class="tab-pane fade" id="electronics">
                    <ul class="aa-product-catg">
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-1.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-2.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-3.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-4.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-5.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-6.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                         
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-7.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                        <figure>
                        <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/electronics/electronic-8.png') }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                            <span class="aa-product-price">$45.50</span>
                        </figcaption>
                        </figure>                          
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        <!-- product badge -->
                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>                        
                    </ul>
                    <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / electronic product category -->
                </div>
                <!-- quick view modal -->                  
                <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                            <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lens-image="{{ asset('katitheme/img/view-slider/large/polo-shirt-1.png') }}">
                                            <img src="{{ asset('katitheme/img/view-slider/medium/polo-shirt-1.pn') }}g" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="simpleLens-thumbnails-container">
                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                        data-lens-image="{{ asset('katitheme/img/view-slider/large/polo-shirt-1.png') }}"
                                        data-big-image="{{ asset('katitheme/img/view-slider/medium/polo-shirt-1.png') }}">
                                        <img src="{{ asset('katitheme/img/view-slider/thumbnail/polo-shirt-1.png') }}">
                                    </a>                                    
                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                        data-lens-image="{{ asset('katitheme/img/view-slider/large/polo-shirt-3.png') }}"
                                        data-big-image="{{ asset('katitheme/img/view-slider/medium/polo-shirt-3.png') }}">
                                        <img src="{{ asset('katitheme/img/view-slider/thumbnail/polo-shirt-3.png') }}">
                                    </a>

                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                        data-lens-image="{{ asset('katitheme/img/view-slider/large/polo-shirt-4.png') }}"
                                        data-big-image="{{ asset('katitheme/img/view-slider/medium/polo-shirt-4.png') }}">
                                        <img src="{{ asset('katitheme/img/view-slider/thumbnail/polo-shirt-4.png') }}">
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                                <span class="aa-product-view-price">$34.99</span>
                                <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                                <a href="#">S</a>
                                <a href="#">M</a>
                                <a href="#">L</a>
                                <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                                <form action="">
                                <select name="" id="">
                                    <option value="0" selected="1">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                    <option value="5">6</option>
                                </select>
                                </form>
                                <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                                </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                                <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                                <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </div><!-- / quick view modal -->              
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
        <a href="#"><img src="{{ asset('katitheme/hinhanhaodai/1170.170.png') }}" alt="fashion banner img"></a>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="aa-popular-category-area">
            <ul>
                <li style="padding: 30px 10px; width: 100%; margin: 0 auto; color: #f33983; font-size: 30px; text-align: center;" >VẢI ÁO DÀI CAO CẤP NĂM 2019</li>
                
                </ul>
            <!-- start prduct navigation -->
            <ul class="nav nav-tabs aa-products-tab">
            <li class="active"><a href="#popular" data-toggle="tab">Vải áo dài đính hạt</a></li>
            <li><a href="#featured" data-toggle="tab">Vải áo dài lụa tơ tằm</a></li>
            <li><a href="#latest" data-toggle="tab">Vải áo dài vẽ</a></li>                    
            <li><a href="#latest" data-toggle="tab">Vải áo dài thêu</a></li>                    
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
            <!-- Start men popular category -->
            <div class="tab-pane fade in active" id="popular">
                <ul class="aa-product-catg aa-popular-slider">
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai1.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                    <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai2.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span>
                    </figcaption>
                    </figure>                      
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai3.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    </figure>
                    <figcaption>
                    <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span>
                    </figcaption>
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai4.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai1.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                      
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai2.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li>    
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai3.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li> 
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai4.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>                                                                                   
                </ul>
                <a class="aa-browse-btn" href="#">Xem tất cả sản phẩm <span class="fa fa-long-arrow-right"></span></a>
            </div>
            <!-- / popular product category -->
            
            <!-- start featured product category -->
            <div class="tab-pane fade" id="featured">
                <ul class="aa-product-catg aa-featured-slider">
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai4.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                    <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai3.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span>
                    </figcaption>
                    </figure>                      
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai2.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    </figure>
                    <figcaption>
                    <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span>
                    </figcaption>
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/hinhanhaodai/aodai1.jpg') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/man/polo-shirt-1.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                      
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-4.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li>    
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/man/polo-shirt-4.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li> 
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-1.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>                                                                                   
                </ul>
                <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
            </div>
            <!-- / featured product category -->

            <!-- start latest product category -->
            <div class="tab-pane fade" id="latest">
                <ul class="aa-product-catg aa-latest-slider">
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/man/polo-shirt-2.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                    <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-2.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span>
                    </figcaption>
                    </figure>                      
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/man/t-shirt-1.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    </figure>
                    <figcaption>
                    <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                    <span class="aa-product-price">$45.50</span>
                    </figcaption>
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-3.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/man/polo-shirt-1.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                      
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                </li>
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-4.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li>    
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/man/polo-shirt-4.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li> 
                <!-- start single product item -->
                <li>
                    <figure>
                    <a class="aa-product-img" href="#"><img src="{{ asset('katitheme/img/women/girl-1.png') }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>CHI TIẾT</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                        <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                    </figure>                     
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>                                                                                   
                </ul>
                <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
            </div>
            <!-- / latest product category -->              
            </div>
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
            <h4>MIỄN PHÍ VẬN CHUYỂN</h4>
            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
        </div>
        <!-- single support -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
            <span class="fa fa-clock-o"></span>
            <h4>TRẢ HÀNG TRONG 30 NGÀY ĐẦU</h4>
            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
        </div>
        <!-- single support -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
            <span class="fa fa-phone"></span>
            <h4>HỖ TRỢ 24/7</h4>
            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
<!-- / Support section -->


<!-- Latest Blog -->
<section id="aa-latest-blog">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="aa-latest-blog-area">
        <h2>NHỮNG BÀI KINH NGIỆM HAY</h2>
        <div class="row">
            <!-- single latest blog -->
            <div class="col-md-4 col-sm-4">
            <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">                    
                <a href="#"><img src="{{ asset('katitheme/hinhanhaodai/450.450.jpg') }}" alt="img"></a>  
                    <figcaption class="aa-blog-img-caption">
                    
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                </figcaption>                          
                </figure>
                <div class="aa-blog-info">
                <h3 class="aa-blog-title"><a href="#">Chọn áo dài đi chùa</a></h3>
                <p>Ngày nay, việc chọn áo dài đi tới các dịp lễ hội luôn là ưu tiên hàng đầu của phái nữ, 
                không chỉ bởi nét cuốn hút mê hồn của tà áo dài Việt</p> 
                <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                </div>
            </div>
            </div>
            <!-- single latest blog -->
            <div class="col-md-4 col-sm-4">
            <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">                    
                <a href="#"><img src="{{ asset('katitheme/hinhanhaodai/450.450.01.png') }}" alt="img"></a>  
                    <figcaption class="aa-blog-img-caption">
                    
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                </figcaption>                          
                </figure>
                <div class="aa-blog-info">
                <h3 class="aa-blog-title"><a href="#">Mẫu áo dài thêu đẹp lung linh</a></h3>
                <p>Vải áo dài truyền thống bắt đầu từ tà áo dài màu trắng, rồi đến những mẫu vải áo dài trơn với nhiều màu sắc rực rỡ khác nhau</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>         
                </div>
            </div>
            </div>
            <!-- single latest blog -->
            <div class="col-md-4 col-sm-4">
            <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">                    
                <a href="#"><img src="{{ asset('katitheme/hinhanhaodai/450.450.02.jpg') }}" alt="img"></a>  
                    <figcaption class="aa-blog-img-caption">
                    
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                </figcaption>                          
                </figure>
                <div class="aa-blog-info">
                <h3 class="aa-blog-title"><a href="#">Mẫu áo dài cưới hỏi</a></h3>
                <p>Mẫu mã thì những mẫu áo dài truyền thống kết hợp đính hoa, trang trí vẫn luôn thịnh hành, tạo nét đẹp đặc biệt cho đám cưới của bạn.</p>
                <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>    
    </div>
</div>
</section>
<!-- / Latest Blog -->
@endsection