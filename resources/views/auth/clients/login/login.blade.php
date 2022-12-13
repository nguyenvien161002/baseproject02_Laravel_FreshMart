<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản | Fresh Mart</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/explore/favicon.webp')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    @vite(["resources/sass/app.scss", "resources/css/login.css"])
</head>
<body>
    <div class="wrapper">
        <form action="" method="post" name="form" autocomplete="off" class="form" id="form-1">
            <span class="icon-back">
                <a href="{{URL::to('')}}">
                    <i class="fa-solid fa-angle-left"></i>
                </a>
            </span>
            <div class="logo-login">
                <a href="{{URL::to('')}}">
                    <img src="{{asset('images/explore/logo.webp')}}" alt="">
                </a>
            </div>
            <div class="form-title">Đăng nhập vào Fresh Mart</div>
            <div class="spacer">
                <span class="errorLogin">
                </span>
            </div>
            <!-- Login with phone number -->
            <a href="" class="url-loginwith__">
                <div class="login-with login-withPhone">
                    <i class="fa-regular fa-envelope"></i>
                    <p class="title-with__">Sử dụng số điện thoại</p>
                    <p></p>
                </div>
            </a>
            <!-- Login with registered account -->
            <a href="{{URL::to('/login/account')}}" class="url-loginwith__">
                <div class="login-with login-withAccount">
                    <i class="fa-regular fa-user"></i>
                    <p class="title-with__">Sử dụng tài khoản</p>
                    <p></p>
                </div>
            </a>
            <!-- Login with google platform -->
            <a href="{{URL::to('/login/auth/google')}}" class="url-loginwith__">
                <div class="login-with login-withgg">
                    <img src="images/svg/loginwithgoogle.svg" alt="">
                    <p class="title-with__">Tiếp tục với Google</p>
                    <p></p>
                </div>
            </a>
            <!-- Login with facebook platform -->
            <a href="{{URL::to('/login/auth/facebook')}}" class="url-loginwith__">
                <div class="login-with login-withfb">
                    <img src="images/svg/loginwithfb.svg" alt="">
                    <p class="title-with__">Tiếp tục với Facebook</p>
                    <p></p>
                </div>
            </a>
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
</body>
</html>