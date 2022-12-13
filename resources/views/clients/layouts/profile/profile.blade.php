@extends('clients.masterlayouts')
@section('title', 'Trang cá nhân | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <i class="fa-solid fa-check"></i>
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after-header.webp')}}" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Trang cá nhân</div>
        <div class="slider-nav">
            <a href="{{URL::to('')}}" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Trang cá nhân</b>
        </div>
    </div>
</div>
<div class="container">
    <div class="profile">
        <div class="checkout__bread-crumb p-0">
            <a href="{{URL::to('')}}" class="backHome">Trang chủ</a>
            <span>/</span>
            <a href="#" class="cart-checkout">Trang cá nhân</a>
        </div>
        <div class="decorate"></div>
        <section class="layout-account pt-3 mb-0">
            @foreach($user as $key => $value)
            <div class="row">
                <div class="col-xl-8">
                    <div class="personal_info">
                        <div class="row">
                            <div class="col-xl-6 pe-2">
                                <div class="box-shadow history-order b_item d-flex p-3 flex-column h-100 justify-content-center align-items-center font-weight-bold text-center">
                                    <img src="{{asset('images/explore/no-ordered.png')}}" alt="">
                                    <p class="fw-bold">Lịch sử đơn hàng</p>                                              
                                </div>
                            </div>
                            <div class="col-xl-6 ps-2">
                                <div class="box-shadow personal-name b_item d-flex p-3 flex-column h-100 justify-content-center align-items-center font-weight-bold text-center">
                                    <img src="{{isset($value['avatar']) ? $value['avatar'] : asset('images/proflie/account.webp')}}" alt="">
                                    <p>Xin chào, <strong>{{ $value['fullname'] }}</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 mt-3">
                                <div class="account-info box-shadow p-3">
                                    <h3 class="fw-bold mt-0">Thông tin cá nhân</h3>
                                    <p class="mb-1"><b>Họ và tên: </b> {{ $value['fullname'] }}</p>
                                    <p class="mb-1"><b>Email: </b> {{ $value['email'] }}</p>
                                    <p class=""><b>Giới tính: </b> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="toolbar box-shadow d-flex flex-column justify-content-evenly h-100">
                        <a href="" class="toolbar__item d-flex pb-2 nav-link active">
                            <img class="me-3" src="{{asset('images/svg/user2.svg')}}" alt="">
                            <p>Thông tin tài khoản</p>
                        </a>
                        <a href="" class="toolbar__item d-flex pb-2 nav-link">
                            <img class="me-3" src="{{asset('images/svg/manageaddress.svg')}}" alt="">
                            <p>Quản lí địa chỉ</p>
                        </a>
                        <a href="" class="toolbar__item d-flex pb-2 nav-link">
                            <img class="me-3" src="{{asset('images/svg/changepassword.svg')}}" alt="">
                            <p>Đổi mật khẩu</p>
                        </a>
                        <a href="" class="toolbar__item d-flex pb-2 nav-link">
                            <img class="me-3" src="{{asset('images/svg/userblack.svg')}}" alt="">
                            <p>Đổi ảnh đại diện</p>
                        </a>
                        <a href="{{URL::to('/logout')}}" class="toolbar__item d-flex pb-2 nav-link">
                            <img class="me-3" src="{{asset('images/svg/logout.svg')}}" alt="">
                            <p>Đăng xuất</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
</div>
@endsection