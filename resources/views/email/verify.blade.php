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
        }
        .btn-confirm {
            text-decoration: none;
            padding: 10px 30px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: aqua;
            color: #fff;
            margin: 20px 0;
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
        <h2>Xác nhận email của bạn</h2>
        <p>Chào bạn <strong>{{ $fullname }}</strong></p>
        <p>Vui lòng nhấp vào nút bên dưới để xác thực địa chỉ email của bạn và xác nhận rằng bạn là chủ sở hữu của tài khoản này.</p>
        <p>Nếu không, xin vui lòng bỏ qua email này.</p>
        <a href="{{env('APP_URL_IP') . '/user/confirm/' . $id . '/' . $token}}" class="btn-confirm">Xác nhận</a>
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