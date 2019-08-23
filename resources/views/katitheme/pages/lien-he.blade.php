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

    <img src="{{ getFieldPage('contact.image_banner') }}" alt="liên hệ">

    <div class="aa-catg-head-banner-area">

        <div class="container">

            <div class="aa-catg-head-banner-content">

                <h2>{{ getFieldPage('contact.title_banner') }}</h2>

                <ol class="breadcrumb">

                    <li><a href="{{ route('katitheme.homepage') }}">Trang chủ</a></li>         

                    <li class="active">{{ $page_data['title'] }}</li>

                </ol>

            </div>

        </div>

    </div>

</section>

<!-- / catg header banner section -->



<!-- start contact section -->

 <section id="aa-contact">

   <div class="container">

     <div class="row">

       <div class="col-md-12">

         <div class="aa-contact-area">

          

           <!-- Contact address -->

           <div class="aa-contact-address">

             <div class="row">

               <div class="col-md-8">

                 <div class="aa-contact-address-left">

                    @if(Session::has('contact-form-success'))

                        <div class="">

                            <div class="alert alert-success">

                                {{ Session::get('contact-form-success') }}

                            </div>

                        </div>

                    @endif

                    <form class="comments-form" action="{{ route('post.contactForm') }}" method="post">

                        @csrf()
                        
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">                        

                                    <input type="text" name="fullname" placeholder="Họ và tên" class="form-control" required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">                        

                                    <input type="email" name="email" placeholder="Địa chỉ email" class="form-control" require>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">                        

                                    <input type="text" name="subject" placeholder="Chủ đề" class="form-control" require>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">                        

                                    <input type="text" name="phone" placeholder="Số điện thoại" class="form-control" require>

                                </div>

                            </div>

                        </div>                  

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">                        

                                    <textarea class="form-control" name="msg" rows="3" placeholder="Nội dung tin nhắn"></textarea>

                                </div>

                            </div>

                        </div>

                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_V2_SITE_KEY', '') }}"></div>

                        <button class="aa-secondary-btn">Gửi</button>

                    </form>

                 </div>

               </div>

               <div class="col-md-4">

                 <div class="aa-contact-address-right">

                   <address>

                     <h4>Vải Áo Dài - {{ getFieldCompany('company.name') }}</h4>

                     <p>{{ getFieldCompany('company.description') }}</p>

                     <p><span class="fa fa-home"></span>{{ getFieldCompany('company.address') }}</p>

                     <p><span class="fa fa-phone"></span>{{ getFieldCompany('company.phone') }}</p>

                     <p><span class="fa fa-envelope"></span>Email: {{ getFieldCompany('company.email') }}</p>

                   </address>

                 </div>

               </div>

             </div>

           </div>
            <!-- contact map -->

          <div class="aa-contact-map">

          {!! getFieldPage('contact.google_map') !!}

          </div>

         </div>

       </div>

     </div>

   </div>

 </section>

@endsection

@section('script')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection