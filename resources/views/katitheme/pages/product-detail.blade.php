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

                        <div class=""><a class=""><img src="{{ asset('images/product/'. $product->photo) }}" class="simpleLens-big-image"></a></div>

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

                    <div class="aa-prod-view-bottom">

                      <a class="aa-add-to-cart-btn" href="javascript:void(0)">{{ $product->price }}</a>

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
                 <div class="fb-comments" data-href="{{ $page_url }}" data-numposts="5" data-width="100%"></div>
                 </div>

                </div>            

              </div>

            </div>



            <div class="row">

              <div class="col-md-12 text-center">

                <h2>Sản phẩm giảm giá: 3 sản phẩm</h2>

                <div class="clock"></div>

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
  var randomNum = Math.random();
	var clock = $('.clock').FlipClock(3600, {
		countdown: true
	});

</script>

@endsection



@section('style')

<link href="{{ asset('katitheme/plugins/flipclock/css/flipclock.css') }}" rel="stylesheet">
<style>
  .flip-clock-wrapper{
    width: 650px; left: 330px !important;
  }
</style>
@endsection