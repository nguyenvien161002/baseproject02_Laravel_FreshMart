@extends('clients.masterlayouts')
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
                                    <img src="{{isset($user[0]['avatar']) ? $user[0]['avatar'] : asset('images/proflie/account.webp')}}" alt="">
                                    <p>Xin chào, <strong>{{ $user[0]['fullname'] }}</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="box-include-profile">
                            @yield('profile.content')
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="toolbar box-shadow d-flex flex-column h-100">
                        @php
                            $id_authorization = Session::get('id_authorization');
                            if($id_authorization == 3) {
                                $urlUser = URL::to('user/profile/');
                            } elseif($id_authorization == 5) {
                                $urlUser = URL::to('user/google/profile/');
                            }
                        @endphp
                        <a href="{{$urlUser . '/' . $user[0]['id']}}" class="toolbar__item d-flex pb-2 nav-link {{isset($info) ? $info : ''}}">
                            <img class="me-3" src="{{asset('images/svg/user2.svg')}}" alt="">
                            <p>Thông tin tài khoản</p>
                        </a>
                        <a href="{{$urlUser . '/manageaddress/' . $user[0]['id']}}" class="toolbar__item d-flex pb-2 nav-link {{isset($manageAddress) ? $manageAddress : ''}}">
                            <img class="me-3" src="{{asset('images/svg/manageaddress.svg')}}" alt="">
                            <p>Quản lí địa chỉ ({{isset($total_address) ? $total_address : 0}})</p>
                        </a>
                        <a href="{{$urlUser . '/changepassword/' . $user[0]['id']}}" class="toolbar__item d-flex pb-2 nav-link {{isset($changePassword) ? $changePassword : ''}}">
                            <img class="me-3" src="{{asset('images/svg/changepassword.svg')}}" alt="">
                            <p>Đổi mật khẩu</p>
                        </a>
                        <a href="{{$urlUser. '/changeavatar/' . $user[0]['id']}}" class="toolbar__item d-flex pb-2 nav-link {{isset($changeAvatar) ? $changeAvatar : ''}}">
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
        </section>
    </div>
</div>
@endsection