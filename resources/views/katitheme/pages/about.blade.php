@extends('katitheme.layouts.master')

@section('content')
<div class="breadcumb-area black-opacity bg-img-3">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>About Us One</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>/</li>
                        <li>About us</li>
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
                <div class="about-img black-opacity" style="background-image: url({{ asset('katitheme/images/about.jpg') }}); background-size: cover; background-position: center center; height: 495px;">
                    <img src="{{ asset('katitheme/images/about.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="about-wrap">
                    <h3>variations of passages of Lorem Ipsum available</h3>
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
@endsection