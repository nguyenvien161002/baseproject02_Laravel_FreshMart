<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Xác thực tài khoản FreshMart</title>
    <style type="text/css" rel="stylesheet" media="all">
        .wrapper {
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f2fcfe;
            padding: 20px;
            text-align: center;
        }
        .btn-confirm {
            text-decoration: none;
            padding: 10px 30px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: aqua;
            color: #fff;
            margin: 20px auto;
            display: block;
            width: max-content;
        }
        p {
            margin: 0;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div style="width: 500px; margin: 0 auto;" class="wrapper">
        <div style="width: 100%; text-align: center;">
            <img src="{{ env('SRC_LOGOMAIN') }}" alt="">
        </div>
        <h2>Đặt lại mật khẩu cho tài khoản của bạn</h2>
        <p>Chào bạn <strong>{{ $fullname }}</strong></p>
        <p>Vui lòng nhấp vào nút bên dưới để được lấy lại mật khẩu tài khoản này.</p>
        <p>Nếu không đã nhớ lại, xin vui lòng bỏ qua email này.</p>
        <a href="{{env('APP_URL_IP') . '/user/reset/password/' . $id . '/' . $token}}" class="btn-confirm">Đặt lại mật khẩu</a>
        <p style="margin-top: 10px;">Trân trọng!</p>
        <p>Đội ngũ FreshMart</p>
        <p>Bạn có thắc mắc vui lòng liên hệ chúng tôi tại đây</p>
        <div style="margin-top: 20px; border-top: 1px solid #ccc; font-size: 12px; text-align: center;">
            <p style="color: red; margin-top: 20px;"><a href="" style="color: red;">Chính sách bảo mật</a> | <a href=""
                    style="color: red;">Điều khoản FreshMart</a></p>
            <p>Đây là email tự động. Vui lòng không trả lời email này. Thêm info@freshmart.vn vào danh bạ email của bạn
                để đảm bảo bạn luôn nhận được email từ chúng tôi.</p>
            <p>450 Trần Đại Nghĩa, quận Ngũ Hành Sơn, thành phố Đã Nẵng</p>
        </div>
    </div>
</body>