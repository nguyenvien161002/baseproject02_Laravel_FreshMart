@extends('clients.masterlayouts')
@section('title', 'Chi tiết sản phẩm | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">{{ $product['name'] }}</div>
        <div class="slider-nav">
            <a href="{{URL::to('')}}" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">{{ $product['name'] }}</b>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div id="content-product">
    <div class="container">
        <div class="content-about">
            <div class="section-infoandprice">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="content-item content-slide">
                            <div class="content-slider">
                                <div class="content-slide--icon content-slide--up">
                                    <i class="fa-solid fa-chevron-up"></i>
                                </div>
                                <div class="content-slide--gallery">
                                    <img src="{{asset('images/' . $product['image_main'])}}" alt="" class="content-slide--item active js--imagegallery">
                                    @if($product['image_two'])
                                    <img src="{{asset('images/' . $product['image_two'])}}" alt="" class="content-slide--item js--imagegallery">
                                    @endif
                                    @if($product['image_three'])
                                    <img src="{{asset('images/' . $product['image_three'])}}" alt="" class="content-slide--item js--imagegallery">
                                    @endif
                                    @if($product['image_four'])
                                    <img src="{{asset('images/' . $product['image_four'])}}" alt="" class="content-slide--item js--imagegallery">
                                    @endif
                                </div>
                                <div class="content-slide--icon content-slide--down">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="content-img-main content-details--imgguava js--imgproduct">
                                <img src="{{asset('images/' . $product['image_main'])}}" alt="" class="imgproduct">
                                <div class="box-iconheart">
                                    <img src="{{asset('images/svg/heart.svg')}}" alt="" class="icon-heart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="content-item content-details">
                            <div class="content-details--item content-details--info">
                                <div class="info-name js-nameproduct fw-bold" data-id="{{ $product['id'] }}">{{ $product['name'] }}</div>
                                <div class="info-SKU">SKU: (<a>Đang cập nhật...</a>)</div>
                                <div class="info-priceandrprice">
                                    @if($product['discount'] != 0)
                                    <p class="info-rprice js--price">{{ floor(((int)$product['price'] / 1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<span>đ</span></p>
                                    <p class="info-price">{{ number_format($product['price'], 0, "", ".") }}<span>đ</span></p>
                                    @else
                                    <p class="info-rprice js--price">{{ number_format($product['price'], 0, "", ".") }}<span>đ</span></p>
                                    @endif
                                </div>
                                @if($product['discount'] != 0)
                                <div class="info-economize">Tiết kiệm: <a>{{ ($product['price'] / 1000) - floor(((int)$product['price'] / 1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<span>đ</span></a> so với giá thị trường</div>
                                @endif
                                <div class="box-description">
                                    <p class="info-des">{!!$product['description']!!}</p>
                                </div>
                                <div class="content-details--weight js--weightproduct">
                                    <p>Trọng lượng:</p>
                                    <button class="js--btnweight1 btn-sm btn-outline-success">1kg</button>
                                    <button class="js--btnweight2 btn-sm btn-outline-success">2kg</button>
                                </div>
                                <div class="content-details--amount">
                                    <p>Số lượng:</p>
                                    <div class="incr-and-decr">
                                        <div class="quantityadapter">
                                            <button class="quantityadapter-item minus js--minus">
                                                <img src="{{asset('images/svg/minus.svg')}}" alt="">
                                            </button>
                                            <input type="text" name="" id="" value="1" class="enterquantity js--enterquantity">
                                            <button class="quantityadapter-item plus js--plus">
                                                <img src="{{asset('images/svg/plus.svg')}}" alt="">
                                            </button>
                                        </div>
                                        <button class="btn btn-danger js--buynow">MUA NGAY</button>
                                    </div>
                                </div>
                                <button class="btn btn-success detailsproBtnAdd" data-id="{{ $product['id'] }}">THÊM VÀO GIỎ HÀNG</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="content-item content-warrant">
                            <div class="content-warrant--inner">
                                <div class="content-warrant--item">
                                    <img src="{{asset('images/warrants/warrant_1.webp')}}" alt="">
                                    <p>100% tự nhiên </p>
                                </div>
                                <div class="content-warrant--item">
                                    <img src="{{asset('images/warrants/warrant_2.webp')}}" alt="">
                                    <p>Chứng nhận ATTP</p>
                                </div>
                                <div class="content-warrant--item">
                                    <img src="{{asset('images/warrants/warrant_3.webp')}}" alt="">
                                    <p>Luôn luôn tươi mới</p>
                                </div>
                                <div class="content-warrant--item">
                                    <img src="{{asset('images/warrants/warrant_4.webp')}}" alt="">
                                    <p>An toàn cho sức khoẻ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-info">
                <div class="section-info--title">
                    <ul>
                        <li class="section-info-item infoproduct js--infoproduct active">THÔNG TIN SẢN PHẨM</li>
                        <li class="section-info-item returnpolicy js--returnpolicy">CHÍNH SÁCH ĐỔI TRẢ</li>
                        <li class="section-info-item storageinstructions js--storageinstructions">HƯỚNG DẪN BẢO QUẢN</li>
                    </ul>
                </div>
                <div class="section-info--des js--infodes">{!!$product['details']!!}</div>
            </div>
            <div class="section-relatedproducts">
                <div class="section-relatedproducts--title">
                    <h1>Sản phẩm liên quan</h1>
                    <img src="{{asset('images/explore/bg-title-after.webp')}}" alt="">
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-12">
                        <div class="sectionfour-about">
                            @foreach($related_p as $key => $product)
                            <div class="product">
                                @if($product['discount'] != 0)
                                <div class="product--lbrprice">- {{ $product['discount'] }}%</div>
                                @endif
                                <div class="product--group">
                                    <a href="{{URL::to('product/details/' . $product['id'])}}">
                                        <img class="product-imgbase" src="{{asset('images/' . $product['image_main'])}}" alt="{{ $product['name'] }}">
                                    </a>
                                </div>
                                <div class="product--group">
                                    <a class="product--name" href="{{URL::to('product/details/' . $product['id'])}}">{{ $product['name'] }}</a>
                                    <div class="product--price">
                                        @if($product['discount'] != 0)
                                        <p class="product--cost">{{ floor((int)$product['price'] * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                                        <p class="product-price">{{ $product['price'] }}<a>đ</a></p>
                                        @else
                                        <p class="product-cost">{{ $product['price'] }}<a>đ</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection