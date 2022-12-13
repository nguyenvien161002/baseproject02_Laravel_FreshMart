<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <!-- <link rel="stylesheet" href="MaterialDesign-Webfont/MaterialDesign-Webfont-master/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss", "resources/css/login.css"])
</head>
<body>
    <div class="wrapper login-account">
        <form action="{{URL::to('/login/account')}}" method="POST" name="form" autocomplete="off" class="form" id="form-login-account">
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
            <div class="form-title">Đăng nhập tài khoản Fresh Mart</div>
            <div class="spacer">
                <span class="errorLogin">
                    @if (Session::has('failed'))
                        <p class="failed"> {{Session::get('failed')}} </p>
                    @elseif (Session::has('success'))
                        <p class="congratulations"> {{Session::get('success')}} </p>
                    @endif
                </span>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email của bạn:</label>
                <input id="email" name="email" rules="required|email" value="{{Cookie::has('email') ? Cookie::get('email') : '' }}" type="text" placeholder="Nhập email của bạn" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" rules="required|min:1" value="{{Cookie::has('password') ? Cookie::get('password') : '' }}" type="password" placeholder="Mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-help">
                <div class="check-remember">
                    <input name="remember_me" type="checkbox" {{Cookie::has('remember_me') ? 'checked' : '' }}>
                    <label for="rememberme">Nhớ mật khẩu</label>
                </div>
                <a href="{{URL::to('user/forgot/password')}}">Quên mật khẩu</a>
            </div>
            <button class="form-submit">Đăng nhập</button>
            <div class="__-with__">
                <a href="{{URL::to('/login/auth/google')}}" class="__-with__--item">
                    <div class="__-withgg">
                        <img src="{{asset('images/svg/loginwithgoogle.svg')}}" alt="">
                        <p class="title-withgg">Google</p>
                        <p></p>
                    </div>
                </a>
                <a href="{{URL::to('/login/auth/facebook')}}" class="__-with__--item">
                    <div class="__-withfb">
                        <img src="{{asset('images/svg/loginwithfb.svg')}}" alt="">
                        <p class="title-withgg">Facebook</p>
                        <p></p>
                    </div>
                </a>
            </div>
            <div class="box-createaccount">
                Bạn chưa có tài khoản? <a href="{{URL::to('/register/account')}}" class="text-primary">Đăng ký</a>
            </div>
            <div class="acceptTerm">
                Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với
                <a href="">Điều khoản sử dụng</a>
                của chúng tôi.
            </div>
        </form>
    </div>
    <script src="{{asset('js/validate.js')}}"></script>
    <script>
        new Validator('#form-login-account');
    </script>
</body>
</html>