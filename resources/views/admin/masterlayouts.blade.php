<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <link rel="stylesheet" href="{{asset('materialdesignicon/materialdesignmaster/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss"])
    <link rel="stylesheet" href="{{asset('sb-admin-2/sb-admin-2.css')}}">
    @vite(["resources/css/admin.css"])
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="overlay"></div>
            <div class="container__">
                <div class="navbar">
                    <div class="navbar-left brand">
                        <a href="{{URL::to('/admin')}}">
                            <img src="{{asset('images/explore/logo.webp')}}" alt="brand" class="brand-img--horizontal">
                        </a>
                    </div>
                    <div class="navbar-middle">
                        <div class="menu-icon">
                            <span class="mdi mdi-menu"></span>
                        </div>
                        <div class="search">
                            <input type="text" placeholder="Tìm kiếm ..." class="search-input">
                        </div>
                    </div>
                    <div class="navbar-right">
                        <div class="navbar-right_item --modifier extensions-icon" title="Extensions">
                            <i class="mdi mdi-view-grid"></i>
                        </div>
                        <div class="navbar-right_item --modifier messages" title="Messages">
                            <i class="mdi mdi-email jsbtnemail"></i>
                            <div class="box-messages">
                                <span class="title">Tin nhắn</span>
                                <div class="container-itemmessage">
                                    <div class="messages-item">
                                        <a href="./index.html"><img src="{{asset('images/proflie/hảaaaa.jpg')}}" alt=""></a>
                                        <div class="item-content">
                                            <p class="item-title">Mark đã gửi tin nhắn cho bạn.</p>
                                            <p class="item-time">1 phút trước</p>
                                        </div>
                                    </div>
                                    <div class="messages-item">
                                        <img src="{{asset('images/proflie/huhuhu.jpg')}}" alt="">
                                        <div class="item-content">
                                            <p class="item-title">Cregh đã gửi tin nhắn cho bạn.</p>
                                            <p class="item-time">10 phút trước</p>
                                        </div>
                                    </div>
                                    <div class="messages-item">
                                        <img src="{{asset('images/proflie/quá đã.jpg')}}" alt="">
                                        <div class="item-content">
                                            <p class="item-title">Đã cập nhật ảnh hồ sơ</p>
                                            <p class="item-time">15 phút trước</p>
                                        </div>
                                    </div>
                                </div>
                                <span class="seeall">4 tin nhắn mới</span>
                            </div>
                        </div>
                        <div class="navbar-right_item --modifier notifications" title="Notifications">
                            <i class="mdi mdi-bell jsbtnbell"></i>
                            <div class="box-notifications">
                                <span class="title">Thông báo</span>
                                <div class="container-itemnotifi">
                                    <div class="notifications-item">
                                        <i class="mdi mdi-calendar"></i>
                                        <div class="item-content">
                                            <p class="item-title">Sự kiên hôm nay</p>
                                            <p class="item-description">Xin nhắc lại rằng bạn có ...</p>
                                        </div>
                                    </div>
                                    <div class="notifications-item">
                                        <i class="fa-solid fa-gear"></i>
                                        <div class="item-content">
                                            <p class="item-title">Cài đặt</p>
                                            <p class="item-description">Cập nhật doanh thu</p>
                                        </div>
                                    </div>
                                    <div class="notifications-item">
                                        <i class="mdi mdi-link-variant"></i>
                                        <div class="item-content">
                                            <p class="item-title">Khởi chạy Admin</p>
                                            <p class="item-description">Quản trị viên mới wow!</p>
                                        </div>
                                    </div>
                                </div>
                                <span class="seeall">Xem tất cả thông báo</span>
                            </div>
                        </div>
                        <div class="navbar-right_item --modifier profile jsbtnprofile">
                            <img src="{{asset('images/proflie/quá đã.jpg')}}" alt="image-profile" class="img-profile"></img>
                            <span class="username-profile">ADMIN<i class="mdi mdi-menu-down d-none d-sm-block"></i></span>
                            <div class="box-profile">
                                <span class="signedbyname">Đăng nhập với tư cách <p>ADMIN</p></span>
                                <div class="container-itemprofile">
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Hồ sơ</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Dự án</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Sao</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Nâng cấp</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Trợ giúp</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Cài đặt</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="">
                                            <p class="item-title">Trở về</p>
                                        </a>
                                    </div>
                                    <div class="profile-item">
                                        <a href="{{URL::to('/logout')}}">
                                            <p class="item-title">Đăng xuất</p>
                                        </a>
                                    </div>
                                </div>
                                <span class="advanced">Cài đặt nâng cao</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="sidebar">
                <div class="navbar-right_item profile">
                    <img src="{{asset('images/proflie/quá đã.jpg')}}" alt="image-profile" class="img-profile"></img>
                    <div class="box-infouser d-flex justify-content-center flex-column">
                        <span class="username-profile">Nguyễn Viên</span>
                        <span class="username-reviews">ADMIN</span>
                    </div>
                    <i class="mdi mdi-dots-vertical"></i>
                </div>
                <span class="title-navigation">Chức năng</span>
                <ul class="list-menu">
                    <li class="menu-item @yield('active.dashboard')">
                        <a class="menu-item--link" href="{{URL::to('/admin/dashboard')}}">
                            <i class="fa-solid fa-house"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="menu-item @yield('active.products')">
                        <a class="menu-item--link" href="{{URL::to('/admin/products')}}">
                            <i class="fa-brands fa-product-hunt"></i>
                            Sản phẩm
                        </a>
                    </li>
                    <li class="menu-item @yield('active.categoryproduct')">
                        <a class="menu-item--link" href="{{URL::to('/admin/category_product')}}">
                            <i class="fa-solid fa-paste"></i>
                            <p class="label-name-sidebar">Danh mục sản phẩm</p>
                        </a>
                    </li>
                    <li class="menu-item @yield('active.news')">
                        <a class="menu-item--link" href="{{URL::to('/admin/news')}}">
                            <i class="fa-solid fa-file-contract"></i>
                            Tin tức
                        </a>
                    </li>
                    <li class="menu-item @yield('active.orders')">
                        <a class="menu-item--link" href="{{URL::to('/admin/orders')}}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Đơn hàng
                        </a>
                    </li>
                    <li class="menu-item menu-item-account @yield('active.accounts')">
                        <div class="menu-item--link">
                            <i class="fa-solid fa-users"></i>
                            Tài khoản
                            <div class="icon-dropdown"><i class="mdi mdi-chevron-{{Session::has('down') ? Session::get('down') : 'left'}}"></i></div>
                        </div>
                        <div class="sub-menu-item @yield('active.accounts') mt-2">
                            <a href="{{URL::to('/admin/accounts/staffs')}}" class="py-2 @yield('active.accounts.staff') d-block dropdown-item-_ dropdown-item-2">
                                <i class="mdi mdi-chevron-double-right"></i>
                                Tài khoản nhân viên
                            </a>
                            <a href="{{URL::to('/admin/accounts/users')}}" class="py-2 @yield('active.accounts.user') d-block dropdown-item-_ dropdown-item-1">
                                <i class="mdi mdi-chevron-double-right"></i>
                                Tài khoản người dùng
                            </a>
                        </div>
                    </li>
                    <li class="menu-item @yield('active.banner')">
                        <a class="menu-item--link" href="{{URL::to('/admin/banner')}}">
                            <i class="fa-brands fa-nfc-symbol"></i>
                            Banner
                        </a>
                    </li>
                    <li class="menu-item @yield('active.logout')">
                        <a class="menu-item--link" href="{{URL::to('/logout')}}">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="label-table">Bảng</div>
                <div class="about-content">
                    @yield('content')
                </div>
            </div>
            <div class="copyright text-center">
                <span>Copyright © Fresh Mart 2022</span>
            </div>
        </div>
    </div>
    <div id="toast"></div>
    <script src="{{asset('jquery-3.6.1/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('chartjs/node_modules/chart.js/dist/chart.min.js')}}"></script>
    <script src="{{asset('ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>