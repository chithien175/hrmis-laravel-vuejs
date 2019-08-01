@extends('katitheme.layouts.master')

@section('content')
<div class="breadcumb-area black-opacity" style="background: url({{ getFieldPage('news.image_banner') }}) no-repeat center center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>{{ getFieldPage('news.title_banner') }}</h2>
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
<?php
    $posts = getAllPosts(9);
    // echo "<pre>";
    // print_r($posts);
    // echo "</pre>";
    // die;
?>
<section class="blog-area ptb-140 bg-1">
    <div class="container">
        <div class="row">
            @if($posts)
                @foreach($posts as $key => $post)
                <div class="col-md-4 col-sm-6 col-xs-12 col">
                    <div class="blog-wrap mb-30">
                        <div class="blog-img">
                            <img src="{{ asset('images/post/' . $post['photo']) }}" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                
                                <ul>
                                    @if($post['categories'])
                                        <li>
                                            <i class="fa fa-folder"></i>
                                            @foreach($post['categories'] as $key => $category)
                                                <a href="#">{{ $category['name'] }} |</a>
                                            @endforeach
                                        </li>
                                    @endif
                                </ul>
                               
                            </div>
                            <h3><a href="blog.html">{{ $post['title'] }}</a></h3>
                            <p>{{ $post['description'] }}</p>
                            <a href="blog.html" class="btn-style">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-xs-12">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection