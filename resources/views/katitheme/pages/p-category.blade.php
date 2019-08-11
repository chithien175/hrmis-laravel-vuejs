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
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
	<img src="{{ asset('katitheme/img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
	<div class="aa-catg-head-banner-area">
		<div class="container">
			<div class="aa-catg-head-banner-content">
				<h2>{{ $page_data['title'] }}</h2>
				<ol class="breadcrumb">
					<li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>         
					<li class="active">{{ $page_data['title'] }}</li>
				</ol>
			</div>
		</div>
	</div>
</section>
  <!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-category">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
			@if(isset($products))
				<div class="aa-product-catg-content">
					<div class="aa-product-catg-body">
						<ul class="aa-product-catg">
						@foreach($products as $key => $product)
							<li>
								<figure>
									<a class="aa-product-img" href="{{ route('frontend.productDetail', $product->slug) }}"><img src="{{ asset('images/product/' . $product->photo) }}" alt="{{ $product->name }}"></a>
									<a class="aa-add-card-btn"href="{{ route('frontend.productDetail', $product->slug) }}"><span class="fa fa-shopping-cart"></span>Chi tiết</a>
									<figcaption>
									<h4 class="aa-product-title"><a href="{{ route('frontend.productDetail', $product->slug) }}">{{ $product->name }}</a></h4>
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
					</div>
					<div class="aa-product-catg-pagination">
						<nav>
						{{ $products->links('vendor.pagination.bootstrap-3') }}
						</nav>
					</div>
				</div>
			@endif 
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
				<aside class="aa-sidebar">
				<!-- single sidebar -->
				@include('katitheme.partials.sidebar')
				</aside>
			</div>
		</div>
	</div>
</section>
  <!-- / product category -->
@endsection