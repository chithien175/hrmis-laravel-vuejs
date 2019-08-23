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

    <img src="{{ getFieldPage('news.image_banner') }}" alt="blog chia sẻ">

    <div class="aa-catg-head-banner-area">

        <div class="container">

            <div class="aa-catg-head-banner-content">

                <h2>{{ getFieldPage('news.title_banner') }}</h2>

                <ol class="breadcrumb">

                    <li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>         

                    <li class="active">{{ $page_data['title'] }}</li>

                </ol>

            </div>

        </div>

    </div>

</section>

<!-- / catg header banner section -->



<?php

    $posts = getAllPosts(9);

?>

<!-- Blog Archive -->

<section id="aa-blog-archive">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="aa-blog-archive-area aa-blog-archive-2">

                    <div class="row">

                        @if($posts)

                        <div class="col-md-9">

                            <div class="aa-blog-content">

                                <div class="row">

                                    @foreach($posts as $key => $post)

                                    <div class="col-md-4 col-sm-4">

                                        <article class="aa-latest-blog-single">

                                            <figure class="aa-blog-img">                    

                                                <a href="{{ route('frontend.postDetail', $post->slug) }}"><img alt="{{ $post->title }}" src="{{ asset('images/post/' . $post->photo) }}"></a>  

                                                <figcaption class="aa-blog-img-caption">

                                                <!-- <span href="#"><i class="fa fa-eye"></i>5K</span>

                                                <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>

                                                <a href="#"><i class="fa fa-comment-o"></i>20</a> -->

                                                <span><i class="fa fa-clock-o"></i>{{ $post->created_at->format('d/m/Y h:m') }}</span>

                                                </figcaption>                          

                                            </figure>

                                            <div class="aa-blog-info">

                                                <h3 class="aa-blog-title"><a href="{{ route('frontend.postDetail', $post->slug) }}">{{ shorten_text($post->description, 37, '...', true) }}</a></h3>

                                                <p>{{ shorten_text($post->description, 90, '...', true) }}</p> 

                                                <a class="aa-read-mor-btn" href="{{ route('frontend.postDetail', $post->slug) }}">Xem thêm <span class="fa fa-long-arrow-right"></span></a>

                                            </div>

                                        </article>

                                    </div>        

                                    @endforeach       

                                </div>

                            </div>

                            <!-- Blog Pagination -->

                            <div class="aa-blog-archive-pagination">

                                <nav>

                                {{ $posts->links('vendor.pagination.bootstrap-3') }}

                                </nav>

                            </div>

                        </div>

                        @endif

                        <div class="col-md-3">

                            <aside class="aa-blog-sidebar">

                                @include('katitheme.partials.sidebar')

                            </aside>

                        </div>

                    </div>

                

                </div>

            </div>

        </div>

    </div>

</section>

<!-- / Blog Archive -->

@endsection