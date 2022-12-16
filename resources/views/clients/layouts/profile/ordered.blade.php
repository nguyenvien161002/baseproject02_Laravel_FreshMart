@extends('clients.masterlayouts')
@section('title', 'Đơn hàng đã đặt | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <i class="fa-solid fa-check"></i>
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Đơn hàng đã đặt</div>
        <div class="slider-nav">
            <a href="" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Đơn hàng đã đặt</b>
        </div>
    </div>
</div>
<div class="container">
    <div class="checkout">
        <div class="decorate"></div>
        <div class="checkout__bread-crumb">
            <a href="" class="backHome">Trang chủ</a>
            <span>/</span>
            <a href="#" class="cart-checkout">Đơn mua</a>
        </div>
        <div class="checkout__title-checkout">ĐƠN ĐÃ ĐẶT<img src="{{asset('images/svg/shopping-carts.svg')}}" alt=""></div>
        <div class="ordered">
            <div class="ordered__header row">
                <p class="col-xl-2 active">Tất cả</p>
                <p class="col-xl-2">Chờ xác nhận</p>
                <p class="col-xl-2">Chờ giao hàng</p>
                <p class="col-xl-2">Đang giao</p>
                <p class="col-xl-2">Đã giao</p>
                <p class="col-xl-2">Đã hủy</p>
            </div>
            <div class="ordered_content">
                @if(!$ordered)
                <div class="no-ordered">
                    <img src="{{asset('images/explore/no-ordered.png')}}" alt="">
                    <p>Chưa có đơn hàng</p>
                </div>
                @endif
                @foreach($ordered as $key => $value)
                <div class="ordered__section">
                    <p class="ordered__name">ID đơn hàng: {{ $value['order_code'] }}</p>
                    <div class="checkout__header-cart">
                        <p class="column-info">Thông tin sản phẩm</p>
                        <p class="column-price">Đơn giá</p>
                        <p class="column-quantity">Số lượng</p>
                        <p class="column-intomoney">Thành tiền</p>
                    </div>
                    @foreach($detailsOrder as $key2 => $value2)
                        @foreach($value2 as $key3 => $value3)
                            @if($value['order_code'] == $value3['order_code'])
                            <div class="ordered__section-inner">
                                <div class="column-info">
                                    <div class="imgproduct">
                                        <img src="{{asset('images/' . $value3['image_main'])}}" alt="" class="imgproduct--img">
                                    </div>
                                    <div class="box_nameproduct">
                                        <div class="name_product">
                                            <span class="infoproduct--name">{{ $value3['name'] }}</span>
                                            <span class="infoproduct--separate">-</span>
                                            <p class="name_product--weight">1Kg</p>
                                        </div>
                                    </div>
                                    <div class="desc_product">{!!$value3['description']!!}</div>
                                </div>
                                <div class="column-price">
                                    <div class="product--price">
                                        @if($value3['discount'] != 0)
                                        <p class="item-sp--cost fw-normal">{{ floor(((int)$value3['price'] / 1000) * (1 - ((int)$value3['discount']/100))) . '.000' }}<a>đ</a></p>
                                        <p class="item-sp--price fw-normal">{{ number_format($value3['price'], 0, "", ".") }}<a>đ</a></p>
                                        @else 
                                        <p class="item-sp--cost fw-normal">{{ number_format($value3['price'], 0, "", ".") }}<a>đ</a></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="column-quantity">
                                    <div class="box_quantity">
                                        <p class="__button-item input-quantity--modifi text-center rounded-1">{{ $value3['quantity'] }}</p>
                                    </div>
                                </div>
                                <div class="column-intomoney column-intomoneyOrdered fs-16">{{ number_format($value3['into_money'], 0, "", ".") }}đ</div>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
                    <div class="totalmoney-ordered">
                        <div class="d-flex totalmoney-ordered-right">
                            <div class="d-flex align-items-center">
                                <span class="lable d-block w-75 fs-15 fw-bold">Tổng sản phẩm: </span>
                                <span class="money fs-17">{{ number_format($value['total_product_fee'], 0, "", ".") }}<span>đ</span></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="lable d-block w-75 fs-15 fw-bold">Phí vận chuyển: </span>
                                <span class="money fs-17">{{ number_format($value['transport_fee'], 0, "", ".") }}<span>đ</span></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="lable d-block w-75 fs-15 fw-bold"><img src="{{asset('images/svg/warrant.svg')}}" alt="">Tổng số tiền: </span>
                                <span class="money fs-17 border-top border-danger">{{ number_format($value['total_money'], 0, "", ".") }}<span>đ</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="box-toast">
    <div class="toast-img">
        <img src="{{asset('images/svg/tick.svg')}}" alt="">
    </div>
    <p class="toast-msg msg-thanks">Cảm ơn bạn đã đặt hàng!</p>
    <p class="toast-msg">Chúng tôi đã nhận được đơn hàng của bạn và sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
</div>
@endsection