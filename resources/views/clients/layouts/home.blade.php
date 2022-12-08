@extends('clients.masterlayouts')
@section('title', 'Fresh Mart')
@section('content')
<div id="slider">
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
</div>
<main id="content">
    <div class="container">
        <section class="sectionone swiper cateSwiper overflow-initial">
            <div class="swiper-wrapper">
                <div class="item-cate swiper-slide">
                    <img src="{{asset('images/cate/cate_1.webp')}}" alt="" class="cate1">
                    <p>Trứng và bơ</p>
                </div>
                <div class="item-cate swiper-slide">
                    <img src="{{asset('images/cate/cate_2.webp')}}" alt="" class="cate2">
                    <p>Thực phẩm khô</p>
                </div>
                <div class="item-cate swiper-slide">
                    <img src="{{asset('images/cate/cate_3.webp')}}" alt="" class="cate3">
                    <p>Thịt tươi sống</p>
                </div>
                <div class="item-cate swiper-slide">
                    <img src="{{asset('images/cate/cate_4.webp')}}" alt="" class="cate4">
                    <p>Trái cây</p>
                </div>
                <div class="item-cate swiper-slide">
                    <img src="{{asset('images/cate/cate_5.webp')}}" alt="" class="cate5">
                    <p>Rau củ quả</p>
                </div>
                <div class="item-cate swiper-slide">
                    <img src="{{asset('images/cate/cate_6.webp')}}" alt="" class="cate6">
                    <p>Nước ép</p>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <section class="sectiontwo">
            <div class="sectiontwo-titleabout">
                <!-- SECTION--TWO.TITLE -->
                <div class="sectiontwo-title">
                    <div class="row">
                        <a href="" class="col-xl-4 col-md-7 col-9 title-about">
                            <img src="{{asset('images/svg/iconreduceprice.svg')}}" alt="">
                            <p class="title-item">Ưu đãi trong tuần</p>
                        </a>
                    </div>
                </div>
                <!-- SECTION--TWO.ABOUT -->
                <div class="sectiontwo-about">
                    @foreach($promotional_p as $key => $product)
                    <div class="sectiontwo-item" data-id="{{ $product['id'] }}">
                        @if($product['discount'] != 0)
                        <div class="item-rprice">- {{ $product['discount'] }}%</div>
                        @endif
                        <div class="item-sp item-imgpro">
                            <a href="{{URL::to('product/details/' . $product['id'])}}">
                                <img class="img-product" src="{{asset('images/' . $product['image_main'])}}" alt="{{ $product['name'] }}">
                            </a>
                            <div class="product-action">
                                <div class="btn_action btn_favorite">
                                    <img class="img-pro-action" src="{{asset('images/svg/heart.svg')}}" alt="">
                                </div>
                                <div class="btn_action btn_addtocart">
                                    <img class="img-pro-action" src="{{asset('images/svg/shopping-carts')}}.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="item-sp item-nameandprice">
                            <a href="{{URL::to('product/details/' . $product['id'])}}" class="item-sp--name">{{ $product['name'] }}</a>
                            <div class="item-sp-price">
                                @if($product['discount'] != 0)
                                <p class="item-sp--cost">{{ floor(((int)$product['price']/1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                                <p class="item-sp--price">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                @else
                                <p class="item-sp--cost">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="sectionthree">
            @foreach($banner as $key => $value)
                <div class="sectionthree-banner banner1">
                    <img src="{{asset('images/banner/' . $value['image'])}}" alt="" class="">
                </div>
            @endforeach
        </section>
        <section class="sectionfour">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="sectionfour-menu">
                        <div class="menu-title">
                            <a href="./subnavfruits.html">Trái cây</a>
                            <span class="icon__dots">
                                <svg aria-hidden="false" focusable="false" data-prefix="fal" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-ellipsis-h fa-w-10">
                                    <path fill="currentColor" d="M192 256c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zm88-32c-17.7 0-32 14.3-32 
                                        32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm-240 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z" class="">
                                    </path>
                                </svg>
                            </span>
                        </div>
                        <div class="menu-about">
                            <div class="menu-dish">
                                <div class="polka-dots">
                                </div>
                                <a href="./subnavfruits.html">Trái cây</a>
                            </div>
                            <div class="menu-dish">
                                <div class="polka-dots">
                                </div>
                                <a href="">Thịt tươi</a>
                            </div>
                            <div class="menu-dish">
                                <div class="polka-dots">
                                </div>
                                <a href="">Hải sản tươi</a>
                            </div>
                            <div class="menu-dish">
                                <div class="polka-dots">
                                </div>
                                <a href="">Rau củ</a>
                            </div>
                            <div class="menu-dish">
                                <div class="polka-dots">
                                </div>
                                <a href="">Thực phẩm khô</a>
                            </div>
                            <div class="menu-ads">
                                <a href="">Mua sắm ngay bây giờ!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8 col-12 pe-0">
                    <div class="sectionfour-about">
                        @foreach($promotional_f as $key => $product)
                        <div class="product" data-id="{{ $product['id'] }}">
                            @if($product['discount'] != 0)
                            <div class="product--lbrprice">- {{ $product['discount'] }}%</div>
                            @endif
                            <div class="product--group">
                                <a href="{{URL::to('product/details/' . $product['id'])}}">
                                    <img src="{{asset('images/' . $product['image_main'])}}" alt="{{ $product['name'] }}">
                                </a>
                                <div class="product-action">
                                    <div class="btn_action btn_favorite">
                                        <img class="img-pro-action" src="{{asset('images/svg/heart.svg')}}" alt="">
                                    </div>
                                    <div class="btn_action btn_addtocart">
                                        <img class="img-pro-action" src="{{asset('images/svg/shopping-carts.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="product--group">
                                <a class="product--name" href="{{URL::to('product/details/' . $product['id'])}}">{{ $product['name'] }}</a>
                                <div class="product--price">
                                    @if($product['discount'] != 0)
                                    <p class="item-sp--cost">{{ floor(((int)$product['price']/1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                                    <p class="item-sp--price">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                    @else
                                    <p class="item-sp--cost">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="sectionfive">
            <div class="sectionfour">
                <div class="row inverse-child">
                    <div class="col-xl-9 col-md-8">
                        <div class="sectionfour-about">
                            @foreach($vegetables as $key => $product)
                            <div class="product" data-id="{{ $product['id'] }}">
                                @if($product['discount'] != 0)
                                <div class="product--lbrprice">- {{ $product['discount'] }}%</div>
                                @endif
                                <div class="product--group">
                                    <a href="{{URL::to('product/details/' . $product['id'])}}">
                                        <img src="{{asset('images/' . $product['image_main'])}}" alt="{{ $product['name'] }}">
                                    </a>
                                    <div class="product-action">
                                        <div class="btn_action btn_favorite">
                                            <img class="img-pro-action" src="{{asset('images/svg/heart.svg')}}" alt="">
                                        </div>
                                        <div class="btn_action btn_addtocart">
                                            <img class="img-pro-action" src="{{asset('images/svg/shopping-carts.svg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="product--group">
                                    <a class="product--name" href="{{URL::to('product/details/' . $product['id'])}}">{{ $product['name'] }}</a>
                                    <div class="product--price">
                                        @if($product['discount'] != 0)
                                        <p class="item-sp--cost">{{ floor(((int)$product['price']/1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                                        <p class="item-sp--price">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                        @else
                                        <p class="item-sp--cost">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4">
                        <div class="sectionfour-menu">
                            <div class="menu-title">
                                <a href="./subnavfruits.html">Rau củ quả</a>
                                <span class="icon__dots">
                                    <svg aria-hidden="false" focusable="false" data-prefix="fal" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-ellipsis-h fa-w-10">
                                        <path fill="currentColor" d="M192 256c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zm88-32c-17.7 0-32 14.3-32 
                                            32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm-240 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z" class="">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            <div class="menu-about">
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="./subnavfruits.html">Trái cây</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Thịt tươi</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Hải sản tươi</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Rau củ</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Thực phẩm khô</a>
                                </div>
                                <div class="menu-ads">
                                    <a href="">Mua sắm ngay bây giờ!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sectionsix">
            <div class="sectionfour">
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <div class="sectionfour-menu">
                            <div class="menu-title">
                                <a href="./subnavfruits.html">Thực phẩm tươi</a>
                                <span class="icon__dots">
                                    <svg aria-hidden="false" focusable="false" data-prefix="fal" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-ellipsis-h fa-w-10">
                                        <path fill="currentColor" d="M192 256c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zm88-32c-17.7 0-32 14.3-32 
                                            32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm-240 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z" class="">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            <div class="menu-about">
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="./subnavfruits.html">Trái cây</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Thịt tươi</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Hải sản tươi</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Rau củ</a>
                                </div>
                                <div class="menu-dish">
                                    <div class="polka-dots">
                                    </div>
                                    <a href="">Thực phẩm khô</a>
                                </div>
                                <div class="menu-ads">
                                    <a href="">Mua sắm ngay bây giờ!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="sectionfour-about">
                            @foreach($meat as $key => $product)
                            <div class="product" data-id="{{ $product['id'] }}">
                                @if($product['discount'] != 0)
                                <div class="product--lbrprice">- {{ $product['discount'] }}%</div>
                                @endif
                                <div class="product--group">
                                    <a href="{{URL::to('product/details/' . $product['id'])}}">
                                        <img src="{{asset('images/' . $product['image_main'])}}" alt="{{ $product['name'] }}">
                                    </a>
                                    <div class="product-action">
                                        <div class="btn_action btn_favorite">
                                            <img class="img-pro-action" src="{{asset('images/svg/heart.svg')}}" alt="">
                                        </div>
                                        <div class="btn_action btn_addtocart">
                                            <img class="img-pro-action" src="{{asset('images/svg/shopping-carts.svg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="product--group">
                                    <a class="product--name" href="{{URL::to('product/details/' . $product['id'])}}">{{ $product['name'] }}</a>
                                    <div class="product--price">
                                        @if($product['discount'] != 0)
                                        <p class="item-sp--cost">{{ floor(((int)$product['price']/1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                                        <p class="item-sp--price">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                        @else
                                        <p class="item-sp--cost">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sectionseven">
            <div class="sectionseven-delivery">
                <!-- delivery: giao hàng -->
                <h2>Giao hàng miễn phí tận nhà trong vòng 24h</h2>
                <div>
                    <a href="">
                        <p>Tìm hiểu thêm</p>
                    </a>
                </div>
            </div>
        </section>
        <section class="sectioneight">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="sectioneight-title">
                        <a href="">Tin tức mới nhất</a>
                        <img src="{{asset('images/explore/bg-title-after.webp')}}" alt="icon title new">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="sectioneight-about swiper steightSwiper">
                        <div class="swiper-wrapper">
                            @foreach($news as $key => $value)
                            <div class="sectioneight-item swiper-slide">
                                <div class="item-img">
                                    <a href="{{URL::to('news/details/' . $value['id'])}}">
                                        <img src="{{asset('images/news/' . $value['image'])}}" alt="">
                                    </a>
                                </div>
                                <div class="item-description">
                                    <div class="item-title">
                                        <a href="{{URL::to('news/details/' . $value['id'])}}">{{ $value['title'] }}</a>
                                    </div>
                                    <div class="item-author">
                                        @foreach($updated_at as $x => $y)
                                        @if($key == $x)
                                        <p>Tác giả: {{ $value['author'] }} | {{ $y }}</p>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection