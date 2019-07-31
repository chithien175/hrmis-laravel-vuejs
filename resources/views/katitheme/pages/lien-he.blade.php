@extends('katitheme.layouts.master')

@section('content')
<div class="breadcumb-area black-opacity" style="background: url({{ getFieldPage('contact.image_banner') }}) no-repeat center center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>{{ getFieldPage('contact.title_banner') }}</h2>
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

<div class="contact-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact-wrap form-style">
                    @if(Session::has('contact-form-success'))
                        <div class="">
                            <div class="alert alert-success">
                                {{ Session::get('contact-form-success') }}
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('post.contactForm') }}" method="post" id="cf">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" placeholder="Họ và tên" id="fullname" name="fullname" required>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input type="email" placeholder="Địa chỉ Email" id="email" name="email" required>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" placeholder="Chủ đề" id="subject" name="subject" required>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" placeholder="Số điện thoại" id="phone" name="phone" required>
                            </div>
                            <div class="col-xs-12">
                                <textarea class="contact-textarea" placeholder="Nội dung tin nhắn" id="msg" name="msg" required></textarea>
                            </div>
                            <div class="col-xs-12">
                                <button type="submit" class="cont-submit btn-contact" name="submit">Gửi tin nhắn</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-wrap">
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <p>+842 1544 2554</p>
                            <p>+842 1544 2554</p>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <p>martxa1545@gmail.com</p>
                            <p>martxa1545@gmail.com</p>
                        </li>
                        <li>
                            <i class="fa fa-fax"></i>
                            <p>15455 54564866 3554</p>
                            <p>15455 54564866 3554</p>
                        </li>
                        <li>
                            <i class="fa fa-location-arrow"></i>
                            227 Marion Street Address Here Columbia, SC 29201
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div id="googleMap">
                {!! getFieldPage('contact.google_map') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection