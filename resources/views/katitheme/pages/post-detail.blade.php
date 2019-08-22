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
@section('fb_type', 'article')
@section('fb_title', $page_title)
@section('fb_des', $pape_description)

@section('content')  
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img src="{{ asset('katitheme/img/post-banner-1920x300.jpg') }}" alt="{{ $post->title }}">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{{ $post->title }}</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>         
          <li class="active">{{ $post->title }}</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">                        
                    <h2>{{ $post->title }}</h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-author">
                        Đăng bởi <a href="#">Admin</a>
                      </div>
                      <div class="aa-post-date">
                      {{ $post->created_at->format('d/m/Y H:m') }}
                      </div>
                    </div>
                    {!! $post->body !!}
                   
                  </article>
                  <!-- blog navigation -->
                  <div class="aa-blog-navigation">
                    @if($post_previous)
                    <a class="aa-blog-prev" href="{{ route('frontend.postDetail', $post_previous->slug) }}"><span class="fa fa-arrow-left"></span>Bài trước</a>
                    @endif
                    @if($post_next)
                    <a class="aa-blog-next" href="{{ route('frontend.postDetail', $post_next->slug) }}">Bài tiếp<span class="fa fa-arrow-right"></span></a>
                    @endif
                  </div>
                  <!-- Blog Comment threats -->
                  <div class="aa-blog-comment-threat">
                    <h3>Bình luận</h3>
                    <div class="comments">
                      <div class="fb-comments" data-href="{{ $page_url }}" data-numposts="5" data-width="100%"></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- blog sidebar -->
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Vải Áo Dài - Thanh Thủy</h3>
                    @php
                        $options = array(
                            'id' => '',
                            'class' => 'aa-catg-nav',
                            'sub_id' => '',
                            'sub_class' => ''
                        );
                        echo menu('sidebar-menu', $options);
                    @endphp
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Bài viết mới nhất</h3>
                    <div class="aa-recently-views">
                      @if($post_recent)
                      <ul>
                        @foreach($post_recent as $key => $post)
                        <li>
                          <a class="aa-cartbox-img" href="{{ route('frontend.postDetail', $post->slug) }}"><img src="{{ asset('images/post/' . $post->photo) }}" alt="{{ $post->title }}"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="{{ route('frontend.postDetail', $post->slug) }}">{{ $post->title }}</a></h4>
                            <p>{{ $post->created_at->format('d/m/Y') }}</p>
                          </div>                    
                        </li>   
                        @endforeach      
                      </ul>
                      @endif
                    </div>                            
                  </div>
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