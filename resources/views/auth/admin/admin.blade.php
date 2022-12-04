<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss", "resources/css/login.css"])
</head>
<body>

    <div class="wrapper login-account">
        <form action="{{URL::to('/login/admin')}}" method="POST" name="form" autocomplete="off" class="form" id="form-1">
            @csrf
            <span class="icon-back">
                <a href="{{URL::to('/login')}}">
                    <i class="fa-solid fa-angle-left"></i>
                </a>
            </span>
            <div class="logo-login">
                <a href="{{URL::to('')}}">
                    <img src="{{asset('images/explore/logo.webp')}}" alt="">
                </a>
            </div>
            <div class="form-title">Đăng nhập Admin Fresh Mart</div>
            <div class="spacer">
                <span class="errorLogin">
                    @if (Session::has('failed'))
                        <p class="failed"> {{Session::get('failed')}} </p>
                    @endif
                </span>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label">Tên tài khoản</label>
                <input value="{{Session::has('admin_name') ? Session::get('admin_name') : '' }}" name="admin_name" value="" type="text" placeholder="Họ và tên của bạn" class="form-control" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input value="" name="password" value="" type="password" placeholder="Mật khẩu" class="form-control" required>
                <span class="form-message"></span>
            </div>
            <div class="form-help">
                <div class="check-remember">
                    <input id="rememberme" name="rememberme" type="checkbox">
                    <label for="rememberme">Nhớ mật khẩu</label>
                </div>
                <a href="">Quên mật khẩu</a>
            </div>
            <button class="form-submit">Đăng nhập</button>
            <div class="__-with__">
                <a href="" class="__-with__--item">
                    <div class="__-withgg">
                        <img src="{{asset('images/svg/loginwithgoogle.svg')}}" alt="">
                        <p class="title-withgg">Google</p>
                        <p></p>
                    </div>
                </a>
                <a href="" class="__-with__--item">
                    <div class="__-withfb">
                        <img src="{{asset('images/svg/loginwithfb.svg')}}" alt="">
                        <p class="title-withgg">Facebook</p>
                        <p></p>
                    </div>
                </a>
            </div>
            <div class="acceptTerm">
                Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với
                <a href="">Điều khoản sử dụng</a>
                của chúng tôi.
            </div>
        </form>
    </div>
</body>
</html>