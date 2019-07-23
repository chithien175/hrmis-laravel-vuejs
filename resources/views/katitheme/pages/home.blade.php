@extends('katitheme.layouts.master')

@section('content')
<!-- slider area start -->
<section class="slider-area">
    <div class="slider-active2 slider-next-prev-style">
        <div class="slider-items">
            <img src="{{ asset('katitheme/images/slider/4.jpg') }}" alt="" class="slider">
            <div class="slider-content text-center">
                <div class="table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    <h2>Welcome to our Martxa</h2>
                                    <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
        <div class="slider-items">
            <img src="{{ asset('katitheme/images/slider/3.jpg') }}" alt="" class="slider">
            <div class="slider-content text-center">
                <div class="table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    <h2>Hello i am Martxa</h2>
                                    <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <ul>
                                        <li><a href="#">Get Started</a></li>
                                        <li><a href="#">Read More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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