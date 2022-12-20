@extends('clients.masterlayouts')
@section('title', 'Đặt hàng | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <i class="fa-solid fa-check"></i>
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Đơn hàng</div>
        <div class="slider-nav">
            <a href="{{URL::to('')}}" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Đơn hàng</b>
        </div>
    </div>
</div>
<div class="container">
    <div class="checkout">
        <div class="decorate"></div>
        <div class="checkout__bread-crumb">
            <a href="{{URL::to('')}}" class="backHome">Trang chủ</a>
            <span>/</span>
            <a href="#" class="cart-checkout">Đơn hàng</a>
        </div>
        <div class="checkout__title-checkout">GIỎ HÀNG CỦA BẠN<img src="{{asset('images/svg/shopping-carts.svg')}}" alt=""></div>
        <div class="checkout__cart">
            <div class="checkout__header-cart">
                <p class="column-info">Thông tin sản phẩm</p>
                <p class="column-price">Đơn giá</p>
                <p class="column-quantity">Số lượng</p>
                <p class="column-intomoney">Thành tiền</p>
            </div>
            <div class="checkout__content-cart">
                <!-- Đừng xóa vì có thể chỉnh sửa phần số lượng -->
                <!-- <div class="product-in-checkout">
                    <div class="column-info">
                        <div class="imgproduct">
                            <img src="{{asset('images/fruits/sp2.webp')}}" alt="" class="imgproduct--img">
                        </div>
                        <div class="box_nameproduct">
                            <div class="name_product">
                                <span class="infoproduct--name">Đào đỏ Mỹ</span>
                                <span class="infoproduct--separate">-</span>
                                <p class="name_product--weight">1kg</p>
                            </div>
                            <button class="btn btn-danger btn-sm">Xóa sản phẩm</button>
                        </div>
                        <div class="desc_product">Quả hình tròn, hình trứng hay hình quả lê, dài 3-10 cm tùy theo giống. Vỏ quả còn non màu xanh, khi chín chuyển sang màu vàng, thịt vỏ quả màu trắng, vàng hay ửng đỏ. Ruột trắng, vàng hay đỏ.</div>
                    </div>
                    <div class="column-price">
                        <div class="box_price">
                            <div class="product--price">
                                <p class="item-sp--cost">20.000<a>đ</a></p>
                                <p class="item-sp--price">50.000<a>đ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="column-quantity">
                        <div class="box_quantity">
                            <button class="__button-item btn-decrease" data-id="2">-</button>
                            <input class="__button-item quantity" value="1">
                            <button class="__button-item btn-increase" data-id="2">+</button>
                        </div>
                    </div>
                    <div class="column-intomoney fw-bold">40.000đ</div>
                </div> -->
            </div>
        </div>
        <div class="checkout__location-checkout">ĐỊA CHỈ NHẬN HÀNG<img src="{{asset('images/svg/location2.svg')}}" alt=""></div>
        <div class="checkout__form-checkout">
            <form action="{{URL::to('/order/checkout')}}" method="POST" class="form-checkout" autocomplete="off">
                @csrf
                <div class="d-flex">
                    <div class="checkout-address d-flex flex-column justify-content-center">
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label class="fw-bold fs-15" for="fullname">Họ và tên</label>
                            <input type="text" value="{{ Session::get('fullname') }}" class="w-75 form-control username" placeholder="Nhập họ tên" name="fullname" required>
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label class="fw-bold fs-15" for="number_phone">Điện thoại di động</label>
                            <input type="text" value="{{isset($address_components) ? $address_user[0]['number_phone'] : ''}}" class="w-75 form-control" placeholder="Nhập số điện thoại" name="number_phone" required>
                        </div>
                        <div class="address-group mb-3 d-flex align-items-center justify-content-between">
                            <label class="fw-bold fs-15" for="number_phone">Tỉnh/Thành phố</label>
                            <div class="w-75 position-relative">
                                <input type="text" hidden value="{{isset($address_components) ? $address_components[3] : ''}}" placeholder="Chọn Tỉnh/Thành phố" name="province" required>
                                <i class="fa-solid fa-caret-down position-absolute"></i>
                                <div class="form-control form-province d-flex align-items-center">
                                    @if(isset($address_components))
                                        {{ $address_components[3] }}
                                    @else
                                        <p class="group-placeholder">Chọn Tỉnh/Thành phố</p>
                                    @endif
                                </div>
                                <div class="list-address">
                                    <ul name="" class="dropdown-address dropdown-province mt-1" id="province"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="address-group mb-3 d-flex align-items-center justify-content-between">
                            <label class="fw-bold fs-15" for="number_phone">Quận/Huyện</label>
                            <div class="w-75 position-relative">
                                <input type="text" hidden value="{{isset($address_components) ? $address_components[2] : ''}}" class="form-control form-address" placeholder="Chọn Quận/Huyện" name="district" required>
                                <i class="fa-solid fa-caret-down position-absolute"></i>
                                <div class="form-control form-district d-flex align-items-center">
                                    @if(isset($address_components))
                                        {{ $address_components[2] }}
                                    @else
                                        <p class="group-placeholder">Chọn Quận/Huyện</p>
                                    @endif
                                </div>
                                <div class="list-address">
                                    <ul name="" class="dropdown-address dropdown-district mt-1" id="district"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="address-group mb-3 d-flex align-items-center justify-content-between">
                            <label class="fw-bold fs-15" for="number_phone">Phường/Xã</label>
                            <div class="w-75 position-relative">
                                <input type="text" hidden value="{{isset($address_components) ? $address_components[1] : ''}}" class="form-control form-address" placeholder="Chọn Quận/Huyện" name="ward" required>
                                <i class="fa-solid fa-caret-down position-absolute"></i>
                                <div class="form-control form-ward d-flex align-items-center">
                                    @if(isset($address_components))
                                        {{ $address_components[1] }}
                                    @else
                                        <p class="group-placeholder">Phường/Xã</p>
                                    @endif
                                </div>
                                <div class="list-address">
                                    <ul name="" class="dropdown-address dropdown-ward mt-1" id="ward"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label class="fw-bold fs-15" for="address">Địa chỉ</label>
                            <input type="text" value="{{isset($address_components) ? $address_components[0] : ''}}" class="w-75 form-control" placeholder="Ví dụ: 450, đường Trần Đại Nghĩa" name="street" required>
                        </div>
                    </div>
                    <div class="form-methods-payment">
                        <div class="transport">
                            <p class="title-transport">Phí vận chuyển</p>
                            <div class="content-transport">
                                <p class="radio-button">Giao hàng tận nơi</p>
                                <p class="cost-transport">20.000đ</p>
                            </div>
                        </div>
                        <div class="methods-payment">
                            <p class="title-methods-payment">Phương thức thanh toán</p>
                            <div>
                                <div class="btn-payment_methods payment_methods d-flex align-items-center justify-content-between">
                                    <div class="label-group d-flex align-items-center">
                                        <img src="{{asset('images/svg/payment-methods/livemoney.svg')}}" alt="" class="me-3">
                                        <p>Thanh toán tiền mặt khi nhận hàng</p>
                                    </div>
                                    <input type="radio" name="payment_method" id="" value="cash_payment" class="input-payment_methods">
                                </div>
                                <div class="btn-payment_methods payment_methods d-flex align-items-center justify-content-between">
                                    <div class="label-group d-flex align-items-center">
                                        <img src="{{asset('images/svg/payment-methods/momo.svg')}}" alt="" class="me-3">
                                        <p>Thanh toán bằng ví MoMo (QR)</p>
                                    </div>
                                    <input type="radio" name="payment_method" id="" value="momo_payment_QR" class="input-payment_methods">
                                </div>
                                <div class="btn-payment_methods payment_methods d-flex align-items-center justify-content-between">
                                    <div class="label-group d-flex align-items-center">
                                        <img src="{{asset('images/svg/payment-methods/vnpay.svg')}}" alt="" class="me-3">
                                        <p>Thanh toán bằng VNPAY</p>
                                    </div>
                                    <input type="radio" name="payment_method" id="" value="vnpay_payment" class="input-payment_methods">
                                </div>
                                <div class="btn-payment_methods payment_methods d-flex align-items-center justify-content-between">
                                    <div class="label-group d-flex align-items-center">
                                        <img src="{{asset('images/svg/payment-methods/momo.svg')}}" alt="" class="me-3">
                                        <p>Thanh toán bằng ví MoMo (Thẻ ATM)</p>
                                    </div>
                                    <input type="radio" name="payment_method" id="" value="momo_payment_ATM" class="input-payment_methods">
                                </div>
                                <div class="btn-payment_methods payment_methods d-flex align-items-center justify-content-between">
                                    <div class="label-group d-flex align-items-center">
                                        <img src="{{asset('images/svg/payment-methods/paypal.svg')}}" alt="" class="me-3 logo-payment-paypal">
                                        <p>Thanh toán bằng PAYPAL</p>
                                    </div>
                                    <input type="radio" name="payment_method" id="" value="paypal_payment" class="input-payment_methods">
                                </div>
                                <div class="btn-payment_methods payment_methods d-flex align-items-center justify-content-between">
                                    <div class="label-group d-flex align-items-center">
                                        <img src="{{asset('images/svg/payment-methods/atm.svg')}}" alt="" class="me-3">
                                        <p>Thẻ ATM nội địa/Internet Banking (Hỗ trợ Internet Banking)</p>
                                    </div>
                                    <input type="radio" name="payment_method" id="" value="atm_payment" class="input-payment_methods">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout_payment">
                    <span class="message-error"></span>
                    <div class="box-payment">
                        <div class="cost-order costProduct">
                            <label for="">Sản phẩm: </label>
                            <span class="fw-bold money">40.000đ</span>
                            <input type="text" name="total_product_fee" value="" hidden>
                        </div>
                        <div class="cost-order pt-0">
                            <label for="">Phí giao hàng: </label>
                            <span class="fw-bold money">20.000đ</span>
                            <input type="text" name="transport_fee" value="" hidden>
                        </div>
                        <div class="totalMoney cost-order pt-0">
                            <label for="">Tổng: </label>
                            <span class="fw-bold money">20.000đ</span>
                            <input type="text" name="total_money" value="" hidden>
                        </div>
                        <div class="box-totalproduct">
                            <p>Tổng sản phẩm (<span class="total-product">1</span> sản phẩm)</p>
                            <button type="submit" class="btn btn-success btn-order-button">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
                <div class="input-group-hidden"></div>
            </form>
        </div>
    </div>
</div>
@endsection