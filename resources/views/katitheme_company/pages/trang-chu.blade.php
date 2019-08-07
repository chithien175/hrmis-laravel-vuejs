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
<!-- slider area start -->
<section class="slider-area">
    <div class="slider-active2 slider-next-prev-style">
        @if($sliders)
            @foreach($sliders as $key => $slider)
            <div class="slider-items">
                <img src="{{ asset('images/gallery/' . $slider->image) }}" alt="" class="slider">
                <div class="slider-content text-center">
                    <div class="table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                                        <h2>{{ $slider->title }}</h2>
                                        <p>{{ $slider->description }}</p>
                                        <ul>
                                            <li><a href="#">Read More</a></li>
                                            <li><a href="#">Get Started</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</section>
<!-- slider area end -->

<!-- about-area start -->
<section class="about-area ptb-140">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 wow fadeInLeft">
                <div class="about-img black-opacity">
                    <img src="{{ asset('katitheme/images/about.jpg') }}" alt="" />
                </div>
            </div>
            <div class="col-md-6 col-xs-12 wow fadeInRight">
                <div class="about-wrap">
                    <h2>who we are</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.randomised words which don't look even slightly believable.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised. by injected humour, or randomised.</p>
                    <ul>
                        <li>There are many variations of passages</li>
                        <li>By injected humour or randomised.</li>
                        <li>the majority have suffered alteration</li>
                        <li>majority have suffered alteration</li>
                        <li>variations of passages of Lorem Ipsum</li>
                        <li>of passages of Lorem Ipsum</li>
                        <li>many variations of passages.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area end -->
@endsection