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
@section('fb_type', 'product')
@section('fb_title', $page_title)
@section('fb_des', $pape_description)

@section('content')  
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{ asset('katitheme/img/product-banner-1920x300.jpg') }}" alt="{{ $product->name }}">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{{ $product->name }}</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>   
          <li class="active">{{ $product->name }}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a class="simpleLens-lens-image"><img src="{{ asset('images/product/'. $product->photo) }}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="{{ asset('images/product/'. $product->photo) }}" class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                            <img src="{{ asset('images/product/'. $product->photo) }}" width="45">
                          </a>             
                          @if($galleries)
                            @foreach($galleries as $key => $gallery)
                            <a data-big-image="{{ asset('images/product/'. $gallery->name) }}" class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                                <img src="{{ asset('images/product/'. $gallery->name) }}" width="45">
                            </a>
                            @endforeach
                          @endif         
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{ $product->name }}</h3>
                    <p class="aa-prod-category">
                        Danh mục sản phẩm: 
                        @if($categories)
                            @foreach($categories as $key => $category)
                            <a href="{{ route('frontend.productCategory', $category->slug) }}">{{ $category->name }}</a> | 
                            @endforeach
                        @endif
                    </p>
                    <p>{{ $product->description }}</p>
                    <h4>Mã màu</h4>
                    <div class="aa-color-tag">
                      <a href="#" class="aa-color-green"></a>
                      <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>                      
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>                      
                    </div>
                    <!-- <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
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
                    </div> -->
                    <div class="aa-prod-view-bottom">
                      <!-- <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a> -->
                      <a class="aa-add-to-cart-btn" href="#">Liên hệ</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Chi tiết sản phẩm</a></li>
                <li><a href="#review" data-toggle="tab">Bình luận</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  {!! $product->body !!}
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                 
                 </div>
                </div>            
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <h2>Sản phẩm giảm giá: 3 sản phẩm</h2>
                <div class="clock" style="width: 650px; left: 20%;"></div>
              </div>
            </div>

            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Sản phẩm cùng loại</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                @if($related_product)
                <!-- start single product item -->
                    @foreach($related_product as $key => $product)
                    <li>
                    <figure>
                        <a class="aa-product-img" href="{{ route('frontend.productDetail', $product->slug) }}"><img src="{{ asset('images/product/' . $product->photo) }}" alt="{{ $product->name }}"></a>
                        <a class="aa-add-card-btn"href="{{ route('frontend.productDetail', $product->slug) }}"><span class="fa fa-shopping-cart"></span>Xem chi tiết</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="{{ route('frontend.productDetail', $product->slug) }}">{{ $product->name }}</a></h4>
                        </figcaption>
                    </figure>                     
                    <!-- <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                    </div> -->
                    </li>       
                    @endforeach  
                @endif                                                          
              </ul>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
@endsection

@section('script')
<script src="{{ asset('katitheme/plugins/flipclock/js/flipclock.min.js') }}"></script> 



<script type="text/javascript">
	var clock = $('.clock').FlipClock(3600 * 24 * 3, {
		clockFace: 'DailyCounter',
		countdown: true
	});
</script>
@endsection

@section('style')
<link href="{{ asset('katitheme/plugins/flipclock/css/flipclock.css') }}" rel="stylesheet">
@endsection