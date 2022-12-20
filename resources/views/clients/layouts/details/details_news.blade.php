@extends('clients.masterlayouts')
@section('title', 'Chi tiết tin tức | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <div class="drop-of-water">
        <img src="assets/images/drop_water/bg-after-header.webp" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">{!!$newsById['title']!!}</div>
        <div class="slider-nav d-flex justify-content-center align-items-center ">
            <a href="" class="slider-nav-item">Trang chủ /</a>
            <b class="slider-nav-item">{!!$newsById['title']!!}</b>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div id="content-detailnews">
    <div class="content-about container">
        <div class="row">
            <div class="sidebar col-xl-3 col-md-12">
                <div class="sidebar-item">
                    <div class="sidebar-title">DANH MỤC SẢN PHẨM</div>
                    <div class="sidebar-content">
                        <ul class="sidebar-content-list">
                            @foreach($category_product as $key => $value)
                            <li class="item-name">
                                <a href="">{{ $value['name'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="sidebar-item">
                    <div class="sidebar-title">BÀI VIẾT LIÊN QUAN</div>
                    <div class="sidebar-content">
                        <ul class="sidebar-content-list">
                            @foreach ($news as $key => $value)
                            <li class="item-name">
                                <a href="{{URL::to('news/details/' . $value['id'])}}">
                                    <img src="{{asset('images/news/' . $value['image'])}}" alt="{{ $value['title'] }}">
                                    <p>{{ $value['title'] }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-about col-xl-9">
                <div class="new-des--details">
                    <h3 class="fs-4">{!!$newsById['title']!!}</h3>
                    {!!$newsById['content']!!}
                </div>
                <div class="comments-form">
                    <div class="comments-customer">
                        <h3 class="title-comments">Bình luận (0 bình luận)</h3>
                        <p class="pb-2">(Khách hàng bình luận sẽ được hiển thị ở đây nè :3)</p>
                    </div>
                    <div class="comments-form--form">
                        <h1 class="title-comments">Viết bình luận của bạn</h1>
                        <p class="pb-2">Địa chỉ email của bạn sẽ được bảo mật. Các trường bắt buộc được đánh dấu *</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    <label>Họ tên<span class="required">*</span></label>
                                    <input aria-label="Họ tên" placeholder="Họ tên" type="text" class="form-control form-control-lg" value="" id="full-name" name="Author" required="" data-validation-error-msg="Không được để trống" data-validation="required">
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    <label>Email<span class="required">*</span></label>
                                    <input aria-label="Email" placeholder="Email" type="email" class="form-control form-control-lg" value="" id="email" name="Email" data-validation="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation-error-msg="Email sai định dạng" required="">
                                </fieldset>
                            </div>
                            <div class="col-sm-12 pt-2">
                                <fieldset class="form-group">
                                    <label>Nội dung<span class="required">*</span></label>
                                    <textarea aria-label="Nội dung" placeholder="Nội dung" class="form-control form-control-lg" id="comment" name="Body" rows="6" required="" data-validation-error-msg="Không được để trống" data-validation="required"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-sm-12 text-right margin-top-10">
                                <button type="submit" class="btn btn-dark mt-3" aria-label="Gửi bình luận">Gửi bình luận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection