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
    <img src="{{ getFieldPage('about.image_banner') }}" alt="giới thiệu">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>{{ getFieldPage('about.title_banner') }}</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>         
                    <li class="active">{{ $page_data['title'] }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<section id="aa-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-contact-area">
                    <div class="aa-contact-address">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="about-img black-opacity">
                                    <img class="img-responsive" src="{{ getFieldPage('about.image_block1') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="about-wrap">
                                    {!! getFieldPage('about.content_block1') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('style')
<style>
    .aa-contact-area .about-wrap{
        line-height: 26px;
    }
    .aa-contact-area .about-wrap ul{
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }
    .aa-contact-area .about-wrap ul li{
        line-height: 30px;
        position: relative;
        padding-left: 30px;
        text-transform: capitalize;
    }
    .aa-contact-area .about-wrap ul li:before{
        position: absolute;
        top: 12px;
        left: 10px;
        width: 4px;
        height: 4px;
        background: #0c4e9a;
        outline: 2px solid #0c4e9a;
        outline-offset: 2px;
        content: "";
    }
</style>
@endsection