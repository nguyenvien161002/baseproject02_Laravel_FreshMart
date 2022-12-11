@extends('clients.masterlayouts')
@section('title', 'Sản phẩm yêu thích | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Sản phẩm yêu thích</div>
        <div class="slider-nav">
            <a href="{{URL::to('')}}" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Sản phẩm yêu thích</b>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div id="content-favorite">
    <div class="container">
        <div class="sectiontwo-titleabout">
            <!-- SECTION--TWO.TITLE -->
            <div class="sectiontwo-title">
                <div class="row">
                    <a href="" class="col-xl-3 col-md-7 col-9 title-about">
                        <img src="{{asset('images/svg/heart.svg')}}" alt="">
                        <p class="title-item">Sản phẩm yêu thích</p>
                    </a>
                </div>
            </div>
            <!-- SECTION--TWO.ABOUT -->
            <div class="favorite-about sectiontwo-about">
                <div class="content-item text-center content-description">
                    <p>Bạn chưa có sản phẩm yêu thích, <a href="{{URL::to('/products')}}" class="text-decoration-none">vào đây</a> để thêm thật nhiều sản phẩm yêu thích nào.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection