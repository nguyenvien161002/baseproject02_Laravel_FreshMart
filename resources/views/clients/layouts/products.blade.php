@extends('clients.masterlayouts')
@section('title', 'Tất cả sản phẩm | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after')}}-header.webp" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Tất cả sản phẩm</div>
        <div class="slider-nav">
            <a href="" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Tất cả sản phẩm</b>
        </div>
    </div>
</div>
<div id="content-products">
    <div class="container">
        <div class="content-about">
            <div class="sidebar">
                <!-- Product Category: danh mục sản phẩm -->
                <div class="sidebar-item">
                    <div class="sidebar-title">DANH MỤC SẢN PHẨM</div>
                    <div class="sidebar-content">
                        <ul class="sidebar-content-list">
                            @foreach($category_product as $key => $cate)
                            <li class="item-name">
                                <a href="{{URL::to('categoryproduct/' . $cate['id'])}}">{{ $cate['name'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- filter:lọc -->
                <div class="sidebar-item">
                    <div class="sidebar-title">LỌC SẢN PHẨM</div>
                    <div class="sidebar-content">
                        <b>Giá sản phẩm</b>
                        <ul class="sidebar-content-list">
                            <li class="item-name itemcheckbox " name="price less than 100.000 VND" data-id="1">
                                <a href="?filter=price<100000" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>Giá dưới 100.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox " name="price from 100 to 200 VND" data-id="2">
                                <a href="?filter=price(100000-200000)" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>100.000đ - 200.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox " name="price from 200 to 300 VND" data-id="3">
                                <a href="?filter=price(200000-300000)" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>200.000đ - 300.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox " name="price from 300 to 500 VND" data-id="4">
                                <a href="?filter=price(300000-500000)" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>300.000đ - 500.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox " name="price over 500 VND" data-id="5">
                                <a href="?filter=price>500000" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>Giá trên 500.000đ</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-about">
                <div class="sort-products">
                    <div class="sort-product-item sort-product">
                        <i class="fa-solid fa-arrow-down-z-a"></i>
                        <p class="ms-1">Xếp theo</p>
                    </div>
                    <ul>
                        <li class="btn-quick-sort alpha-asc ">
                            <a href="?sort=alpha-asc" onclick="" title="Tên A-Z">
                                <i></i>
                                <label for="">Tên A-Z</label>
                            </a>
                        </li>
                        <li class="btn-quick-sort alpha-desc ">
                            <a href="?sort=alpha-desc" onclick="" title="Tên Z-A">
                                <i></i>
                                <label for="">Tên Z-A</label>
                            </a>
                        </li>
                        <li class="btn-quick-sort price-asc ">
                            <a href="?sort=price-asc" onclick="" title="Giá thấp đến cao">
                                <i></i>
                                <label for="">Giá thấp đến cao</label>
                            </a>
                        </li>
                        <li class="btn-quick-sort price-desc ">
                            <a href="?sort=price-desc" onclick="" title="Giá cao xuống thấp">
                                <i></i>
                                <label for="">Giá cao xuống thấp</label>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="category-product">
                    @foreach($products as $key => $product)
                    <div class="sectiontwo-item product" data-id="{{ $product['id'] }}">
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
                                <p class="item-sp--cost">{{ floor(((int)$product['price'] / 1000) * (1 - ((int)$product['discount']/100))) . '.000' }}<a>đ</a></p>
                                <p class="item-sp--price">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                @else
                                <p class="item-sp--cost">{{ number_format($product['price'], 0, "", ".") }}<a>đ</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="next-sheet">
                   {{ $products -> links('clients.layouts.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection