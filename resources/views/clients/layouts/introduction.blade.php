@extends('clients.masterlayouts')
@section('title', 'Giới thiêu | Fresh Mart')
@section('content')
<!-- SLIDER -->
<div id="slider-introduction">
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Giới thiệu</div>
        <div class="slider-nav">
            <a href="" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Giới thiệu</b>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div id="content-introduction">
    <div class="container">
        <div class="content-about">
            <div class="content-item content-title">Giới thiệu</div>
            <div class="content-item content-description">
                <p><b>ND Fresh:</b> là hệ thống cửa hàng thực phẩm sạch uy tín nhất ở Việt Nam, chuyên cung cấp thực phẩm sạch tới từng bếp ăn của gia đình bạn.</p>
            </div>
            <!-- vision: tầm nhìn -->
            <div class="content-item content-vision">
                <p><b>Tầm nhìn:</b> Được nuôi trồng, chế biến theo phương Bio (sinh học), Organic (hữu cơ), Eco (sinh thái); cam kết không bán hàng giả, hàng nhái và hàng kém chất lượng. Sản phẩm được giao đến tay khách hàng luôn đúng cam kết, đúng chất lượng niệm yết, luôn được bảo quản trong môi trường lý tưởng, đảm bảo vệ sinh an toàn thực phẩm.</p>
            </div>
            <div class="content-item content-target">
                <p><b>Mục tiêu:</b> Sản phẩm được giao đến tay khách hàng luôn đúng cam kết, đúng chất lượng niệm yết, luôn được bảo quản trong môi trường lý tưởng, đảm bảo vệ sinh an toàn thực phẩm.</p>
            </div>
        </div>
    </div>
</div>
@endsection