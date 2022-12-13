<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss", "resources/css/login.css", "resources/css/toast.css"])
</head>
<body>
    <div class="wrapper">
        <form action="{{URL::to('/register/account')}}" method="POST" name="form" autocomplete="off" class="form px-25px py-0" id="form-register-account">
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
            <div class="form-title {{Session::has('failed') ? 'mb-0' : ''}} fs-2 mt-0 mb-2">Đăng ký tài khoản Fresh Mart</div>
            <div class="spacer mb-0">
                <span class="errorLogin">
                    @if (Session::has('failed'))
                    <p class="failed"> {{Session::get('failed')}} </p>
                    @endif
                </span>
            </div>
            <div class="form-group mb-5px">
                <label for="fullname" class="form-label">Họ và tên:</label>
                <input value="{{Session::get('fullname')}}" rules="required" name="fullname" type="text" placeholder="Họ và tên của bạn" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group mb-5px">
                <label for="email" class="form-label">Email:</label>
                <input value="{{Session::get('email')}}" rules="required|email" name="email" type="text" placeholder="Email của bạn" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group mb-5px">
                <label for="password" class="form-label">Mật khẩu</label>
                <input value="{{Session::get('password')}}" rules="required|min:1" name="password" type="password" placeholder="Mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group mb-5px">
                <label for="confirm_password" class="form-label">Nhập lại mật khẩu</label>
                <input value="{{Session::get('confirm_password')}}" rules="required|min:1" name="confirm_password" type="password" placeholder="Nhập lại mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="form-submit mt-10px">Đăng ký</button>
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
            <div class="box-createaccount mt-0">
                Bạn đã có tài khoản? <a href="{{URL::to('/login')}}" class="text-primary">Đăng nhập</a>
            </div>
            <div class="acceptTerm pt-0">
                Việc bạn tiếp tục sử dụng trang web này đồng nghĩa bạn đồng ý với
                <a href="">Điều khoản sử dụng</a>
                của chúng tôi.
            </div>
        </form>
    </div>
    <script src="{{asset('js/validate.js')}}"></script>
    <script>
        new Validator('#form-register-account');
    </script>
</body>
</html>