<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <!-- <link rel="stylesheet" href="MaterialDesign-Webfont/MaterialDesign-Webfont-master/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss", "resources/css/login.css"])
</head>
<body>
    <div class="wrapper login-account">
        <form action="" method="POST" name="form" autocomplete="off" class="form form-forgot-passowrd" id="form-forgot-passowrd">
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
            <div class="form-title mb-2">Quên mật khẩu Fresh Mart</div>
            <div class="spacer text-center">
                <span class="text-white fs-3">Vui lòng nhập email mà bạn đã đăng kí tài khoản trong hệ thống của chúng tôi.</span>
                @if (Session::has('failed'))
                <span class="errorLogin">
                    <p class="failed"> {{Session::get('failed')}} </p>
                </span>
                @elseif (Session::has('success'))
                <span class="errorLogin">
                    <p class="congratulations"> {{Session::get('success')}} </p>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email của bạn:</label>
                <input id="email" name="email" rules="required|email" value="" type="text" placeholder="Nhập email của bạn" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="form-submit">Gửi email xác nhận</button>
            <div class="acceptTerm">
                Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với
                <a href="">Điều khoản sử dụng</a>
                của chúng tôi.
            </div>
        </form>
    </div>
    <script src="{{asset('js/validate.js')}}"></script>
    <script>
        new Validator('#form-forgot-passowrd');
    </script>
</body>
</html>