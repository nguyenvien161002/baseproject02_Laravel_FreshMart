<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/explore/favicon.webp')}}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('swiper-8.4/package/swiper-bundle.min.css')}}">
    <!-- Vite -->
    @vite([
        "resources/sass/app.scss", 
        "resources/css/app.css", 
        "resources/css/modal.css", 
        "resources/css/toast.css", 
        "resources/css/details/product.css",
        "resources/css/details/news.css",
    ])
</head>
<body>
    <!-- HEADER -->
    <header id="header">
        <div class="container overflow-initial">
            <div class="row align-items-center">
                <div class="header-left col-xl-5 col-md-12 col-12">
                    <nav class="navbar">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('')}}" class="header-nav-home">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/introduction')}}">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <div class="nav-product">
                                    <a class="nav-link" href="{{URL::to('/products')}}">Sản phẩm <i class="fa-solid fa-sort-down"></i></a>
                                </div>
                                <ul class="subnav">
                                    @foreach($category_product as $key => $cate)
                                    <li class="subnav-item">
                                        <a href="{{URL::to('categoryproduct/' . $cate['id'])}}">{{ $cate['name'] }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/news')}}">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/contact')}}">Liên hệ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3">
                    <a href=""><img src="{{asset('images/explore/logo.webp')}}" alt="logo" class="nav-logo"></a>
                </div>
                <div class="header-right col-xl-5 col-md-9 col-12 d-flex justify-content-end">
                    <div class="navbar mxr--">
                        <ul class="nav align-items-center">
                            <li class="nav-item">
                                <div class="row me-2 nav-itemsearch">
                                    <input class="search_main" type="text" placeholder="Bạn cần tìm gì?">
                                    <div class="result_search"></div>
                                    <div class="navright-item ti-search nav-link">
                                        <img src="{{asset('images/svg/search.svg')}}" alt="" class="icon-search">
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item favorite-product" title="Sản phẩm yêu thích">
                                <a href="{{URL::to('favorite')}}">
                                    <span class="navright-item nav-link px20 p-2 ">
                                        <img src="{{asset('images/svg/heart.svg')}}" alt="">
                                    </span>
                                    <span class="notification favorite-notification">0</span>
                                </a>
                            </li>
                            <li class="nav-item js-cart-shopping" title="Giỏ hàng">
                                <span class="navright-item nav-link px20 p-2 ">
                                    <img src="{{asset('images/svg/cart.svg')}}" alt="">
                                </span>
                                <span class="notification cart-notification">0</span>
                            </li>
                            <li class="nav-item box-profile js_btnProfile" title="Tài khoản">
                                @if(Session::has('is_login') && Session::has('id_authorization'))
                                <span class="navright-item nav-link p-2">
                                    @if(Session::has('avatar'))
                                    <img src="{{ Session::get('avatar') }}" alt="" class="user-icon logged-in-icon">
                                    @else
                                    <img src="{{asset('images/svg/user.svg')}}" alt='' class='user-icon'>
                                    @endif
                                </span>
                                <div class="box-login">
                                    <div class="loggedin">
                                        <div class="loggedin__userinfo">
                                            @if(Session::has('avatar'))
                                            <img src="{{ Session::get('avatar') }}" alt="" class="user-icon logged-in-icon">
                                            @else
                                            <img src="{{asset('images/svg/user.svg')}}" alt="" class="user-picture user-loginAccount">
                                            @endif
                                            <div class="fullname-email">
                                                <p class="fullname" title="Tên đầy đủ">{{ Session::get('fullname') }}</p>
                                                @if(Session::has('email'))
                                                <p class="email" title="Email">{{ Session::get('email') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        @if(Session::get('id_authorization') == 3)
                                        <a href="{{URL::to('/user/profile/' . Session::get('id'))}}" class="loggedin__item nav-link">Trang cá nhân</a>
                                        <a href="{{URL::to('/user/ordered/' . Session::get('id'))}}" class="loggedin__item nav-link">Đơn mua</a>
                                        @elseif(Session::get('id_authorization') == 4)
                                        <a href="{{URL::to('/user/facebook/profile/' . Session::get('id'))}}" class="loggedin__item nav-link">Trang cá nhân</a>
                                        <a href="{{URL::to('/user/facebook/ordered/' . Session::get('id'))}}" class="loggedin__item nav-link">Đơn mua</a>
                                        @else
                                        <a href="{{URL::to('/user/google/profile/' . Session::get('id'))}}" class="loggedin__item nav-link">Trang cá nhân</a>
                                        <a href="{{URL::to('/user/google/ordered/' . Session::get('id'))}}" class="loggedin__item nav-link">Đơn mua</a>
                                        @endif
                                        <a href=" " class="loggedin__item nav-link">Yêu thích</a>
                                        <a href=" " class="loggedin__item nav-link">Cài đặt</a>
                                        <a href="{{URL::to('/logout')}}" class="loggedin__item nav-link">Đăng xuất</a>
                                    </div>
                                </div>
                                @else
                                <span class="navright-item nav-link p-2">
                                    <img src="{{asset('images/svg/user.svg')}}" alt='' class='user-icon'>
                                </span>
                                <div class="box-login">
                                    <a class='nav-link' href="{{URL::to('/login')}}">Đăng nhập</a>
                                    <a class='nav-link' href="{{URL::to('/register/account')}}">Đăng ký</a>
                                </div>
                                @endif
                            </li>
                            <li class="nav-item js-sidebar">
                                <span class="navright-item nav-link p-2 ">
                                    <img src="{{asset('images/svg/siderbar.svg')}}" alt="">
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- SLIDER -->
    <main id="main">
        @yield('content')
    </main>
    <!-- FOOTER -->
    <footer id="footer">
        <div id="drop-of-water">
            <div class="drop-of-water">
                <img src="{{asset('images/drop_water/bg-before-footer.webp')}}" alt="">
            </div>
        </div>
        <div class="footer-first">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="footer-item footer-signup">
                            <div class="signup-des">
                                <span class="title--item">ĐĂNG KÝ NHẬN THÔNG TIN</span>
                                <p>Đăng ký nhận bản tin để nhận ưu đãi đặc biệt về sản phẩm ND Fresh</p>
                            </div>
                            <div class="signup-text-btn">
                                <div class="signup-text">
                                    <input type="text" placeholder="Nhập email của bạn">
                                </div>
                                <div class="signup-btn">
                                    <button class="js-btn-registerfooter">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="footer-item footer-introduction">
                            <div class="logo">
                                <img src="{{asset('images/explore/logo.webp')}}" alt="">
                            </div>
                            <div class="introduction">
                                Website thương mại điện tử ND Fresh do ND Group là đơn vị chủ quản, chịu trách nhiệm và thực hiện các giao dịch liên quan mua sắm sản phẩm hàng hoá tiêu dùng thiết yếu.
                            </div>
                            <div class="logofooter">
                                <img src="{{asset('images/explore/img-footer.webp')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="footer-item footer-contact">
                            <span class="title--item">LIÊN HỆ VỚI CHÚNG TÔI</span>
                            <div>
                                <b>Địa chỉ: </b><a>470 Trần Đại Nghĩa, NHS, Đà Nẵng</a>
                            </div>
                            <div>
                                <b>Điện thoại: </b><a>0332670569</a>
                            </div>
                            <div>
                                <b>Email: </b><a>viennv.21it@vku.udn.vn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-last">
            <div class="container">
                <div class="row copyright align-items-center">
                    <div class="col-xl-9">
                        <div class="">
                            <p>@ Bản quyền thuộc về Fresh Mart | Cung cấp bởi Nguyễn Viên</p>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="iconcontact">
                            <a href="" class="iconcontact-item">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="" class="iconcontact-item">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="" class="iconcontact-item">
                                <i class="fa-brands fa-google"></i>
                            </a>
                            <a href="" class="iconcontact-item">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- MODAL -->
    <div class="modal js-modal">
        <div class="modal__overlay"></div>
        <div class="modal__cartshopping js-modal__cartshopping">
            <div class="modal__cartshpping--inner">
                <div class="modal__cartshopping--header">
                    <p>GIỎ HÀNG</p>
                    <img class="cartshopping--icon js-cartClose" src="{{asset('images/svg/close-large.svg')}}" alt="">
                </div>
                <div class="cart-noproduct">
                    <img src="{{asset('images/svg/mobile-shopping.svg')}}" alt="">
                    <a href="{{URL::to('/products')}}" class="btn btn-continue">Tiếp tục mua hàng</a>
                </div>
                <div class="cart__content"></div>
                <div class="payment">
                    <span class="separate payment-item"></span>
                    <div class="payment-content payment-item">
                        <p class="labelsum">Tổng tiền:</p>
                        <div class="summoney">
                            <div class="totalmoney"></div>
                            <span>.000</span>
                            <p class="unitprice">đ</p>
                        </div>
                    </div>
                    <a {{ Session::get('is_login') ? "href=".URL::to('/order') : "onclick=showLoginToast()" }} class="btn btn-payment payment-item">Đặt hàng</a>
                </div>
            </div>
        </div>
        <div class="modal__sidebar js-modal__sidebar">
            <div class="modal__sidebar--inner">
                <div class="modal__sidebar--nav">
                    <ul class="sidebar__login">
                        <li class="sidebar__login-inner">
                            <a href="loginController/loginClient" class="nav-link">
                                <!-- <span class="sidebar--btn-login js-btn-loginRps">
                                        <img src='images/svg/user.svg' alt='' class='user-picture user-loginAccount'>
                                    </span> -->
                                <span class="sidebar--btn-login js-btn-loginRps"><i class="fa-solid fa-right-to-bracket"></i>Đăng nhập</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="modal__sidebar--list">
                        <li class="modal__sidebar--item">
                            <a href=""><i class="fa-solid fa-house"></i>Trang chủ </a>
                        </li>
                        <li class="modal__sidebar--item">
                            <a href="index/products"><i class="fa-solid fa-clipboard-list"></i>Sản phẩm</a>
                        </li>
                        <li class="modal__sidebar--item">
                            <a href="index/news"><i class="fa-solid fa-newspaper"></i>Tin tức</a>
                        </li>
                        <li class="modal__sidebar--item">
                            <a href="index/contact"><i class="fa-solid fa-square-phone"></i>Liên hệ</a>
                        </li>
                        <li class="modal__sidebar--item">
                            <a href="index/introduction"><i class="fa-solid fa-circle-info"></i>Giới thiệu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- TOAST MESSAGES -->
    <div id="toast"></div>
    <div id="toastLogin"></div>
    <!-- EMBEDDING JS FILES -->
    <script src="{{asset('jquery-3.6.1/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('notiflix/node_modules/notiflix/dist/notiflix-3.2.5.min.js')}}"></script>
    <script src="{{asset('swiper-8.4/package/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/swiper.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
    <script src="{{asset('js/favorite.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>
    <script src="{{asset('js/order.js')}}"></script>
    <script>{{Session::has('orderSuccess') ? 'orderSuccess()' : ""}}</script>
</body>
</html>