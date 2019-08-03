@extends('katitheme.layouts.master')

<?php
    $page_title = (getFieldCompany('company.show_site_name') == 'true') ? 'Giới thiệu - ' . getFieldCompany('company.site_title') : 'Giới thiệu';
    $page_url = url()->current();
?>

@section('title', $page_title)
@section('description', '')

@section('fb_url', $page_url)
@section('fb_type', 'website')
@section('fb_title', $page_title)
@section('fb_des', '')

@section('content')
<div class="breadcumb-area black-opacity" style="background: url({{ getFieldPage('about.image_banner') }}) no-repeat center center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>{{ getFieldPage('about.title_banner') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>
                        <li>/</li>
                        <li>{{ $page_data['title'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="about-area ptb-140">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="about-img black-opacity" style="background-image: url({{ getFieldPage('about.image_block1') }}); background-size: cover; background-position: center center; height: 495px;">
                    <img src="{{ getFieldPage('about.image_block1') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="about-wrap">
                    {!! getFieldPage('about.content_block1') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection