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
            <form action="" method="" class="form-checkout">
                <div class="mb-3">
                    <label for="username">Họ và tên:</label>
                    <input type="text" value="{{ Session::get('fullname') }}" class="form-control username" placeholder="Nhập họ và tên của bạn" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="numberphone">Số điện thoại:</label>
                    <input type="text" value="0372695578" class="form-control" placeholder="Nhập số điện thoại" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" value="Quận Ngũ Hành Sơn, Đà Nẵng" class="form-control" placeholder="Nhập địa chỉ của bạn" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="note">Ghi chú:</label>
                    <textarea class="form-control" placeholder="Nhập ghi chú" name="note" required cols="30" rows="3"></textarea>
                </div>
            </form>
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
                        <button class="btn-payment_methods payment_methods" payment_methods="Thẻ tín dụng/ thẻ ghi nợ">Thẻ tín dụng/ thẻ ghi nợ</button>
                        <button class="btn-payment_methods payment_methods" payment_methods="Ví điện tử">Ví điện tử</button>
                        <button class="btn-payment_methods payment_methods" payment_methods="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</button>
                    </div>
                </div>
                <div class="form-note">
                    <p class="title-methods-payment title-form-note">Lưu ý</p>
                    <p class="text-primary">Quý khách kiểm tra hàng trước khi thanh toán (bằng phương thức "thanh toán khi nhận hàng")</p>
                </div>
            </div>
        </div>
        <div class="checkout_payment">
            <span class="message-error"></span>
            <div class="box-payment">
                <div class="totalMoney">
                    <label for="">Tổng tiền: </label>
                    <span class="fw-bold money">40.000đ</span>
                </div>
                <div class="box-totalproduct">
                    <p>Tổng sản phẩm (<span class="total-product">1</span> sản phẩm)</p>
                    <button class="btn btn-success btn-order-button">ĐẶT HÀNG</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection