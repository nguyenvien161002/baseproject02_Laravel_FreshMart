<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <!-- <link rel="stylesheet" href="MaterialDesign-Webfont/MaterialDesign-Webfont-master/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss", "resources/css/login.css"])
</head>
<body>
    <div class="wrapper login-account">
        <form action="" method="POST" name="form" autocomplete="off" class="form form-forgot-passowrd" id="form-reset-passowrd">
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
            <div class="form-title mb-2">Đặt lại mật khẩu Fresh Mart</div>
            <div class="spacer"></div>
            <div class="form-group mb-5px">
                <label for="password" class="form-label">Mật khẩu</label>
                <input value="" rules="required|min:1" name="password" type="password" placeholder="Mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group mb-5px">
                <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                <input value="" rules="required|min:1" name="confirm_password" type="password" placeholder="Nhập lại mật khẩu" class="form-control">
                @error('confirm_password')
                <span class="form-message text-danger">{{$message}}</span>
                @enderror
                <span class="form-message"></span>
            </div>
            <button class="form-submit">Đặt lại mật khẩu</button>
            <div class="acceptTerm">
                Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với
                <a href="">Điều khoản sử dụng</a>
                của chúng tôi.
            </div>
        </form>
    </div>
    <script src="{{asset('js/validate.js')}}"></script>
    <script>
        new Validator('#form-reset-passowrd');
    </script>
</body>
</html>