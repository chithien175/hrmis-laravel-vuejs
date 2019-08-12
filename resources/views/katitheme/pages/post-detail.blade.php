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
                    <div class="blog-single-bottom">
                      <div class="row">
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-single-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </article>
                  <!-- blog navigation -->
                  <div class="aa-blog-navigation">
                    <a class="aa-blog-prev" href="#"><span class="fa fa-arrow-left"></span>Bài trước</a>
                    <a class="aa-blog-next" href="#">Bài tiếp<span class="fa fa-arrow-right"></span></a>
                  </div>
                  <!-- Blog Comment threats -->
                  <div class="aa-blog-comment-threat">
                    <h3>Comments (4)</h3>
                    <div class="comments">
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
                    <h3>Bài viết liên quan</h3>
                    <div class="aa-recently-views">
                      <ul>
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>
                         <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>                                      
                      </ul>
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