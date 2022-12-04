<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link rel="shortcut icon" href="{{asset('images/explore/favicon.webp')}}" type="image/x-icon">
    @vite(['resources/sass/app.scss', 'resources/css/404.css'])
</head>
<body>
    <div class="wrapper">
        <div class="container box-main">
            <img class="img-robot404" src="{{asset('images/explore/404-robot.png')}}" alt="">
            <div class="img-word404"></div>
            <h3 class="nocontentwasfound">Không tìm thấy nội dung 😓</h3>
            <ul>
                <li class="">URL của nội dung này đã 
                    <strong>
                        bị thay đổi
                    </strong> 
                        hoặc 
                    <strong>
                        không còn tồn tại
                    </strong>.
                </li>
                <li class="">Nếu bạn 
                    <strong>
                        đang lưu URL này
                    </strong>, 
                        hãy thử 
                    <strong>
                        truy cập lại từ trang chủ
                    </strong> 
                    thay vì dùng URL đã lưu.
                </li>
            </ul>
            <div class="box-btn">
                <button class="btn">
                    <a href="{{URL::to('')}}">Truy cập trang chủ</a>
                </button>
            </div>
            <div class="copyright">
                © 2018 - 2022 Fresh Mart. Nền tảng bán hàng online hàng đầu Việt Nam
            </div>
        </div>
    </div>
</body>
</html>