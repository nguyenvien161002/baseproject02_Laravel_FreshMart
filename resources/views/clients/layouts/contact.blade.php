@extends('clients.masterlayouts')
@section('title', 'Liên hệ | Fresh Mart')
@section('content')
<div id="content-contact">
    <div class="container">
        <div class="content-about">
            <div class="content-item content-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7671.485285511319!2d108.2511845500182!3d15.974810623437047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2sVietnam%20-%20Korea%20University%20of%20Information%20and%20Communication%20Technology.!5e0!3m2!1sen!2sus!4v1648571429729!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="content-item content-infoandform">
                <div class="content-contact--info content-infoandform-item">
                    <div>
                        <h2>Thông tin liên lạc</h2>
                        <p>Website thương mại điện tử ND Fresh do ND Group là đơn vị chủ quản, chịu trách nhiệm và thực hiện các giao dịch liên quan mua sắm sản phẩm hàng hoá tiêu dùng thiết yếu.</p>
                    </div>
                    <p>Địa chỉ: <a>470 Trần đại nghĩa, Đà Nẵng</a></p>
                    <p>Điện thoại: <a>0332670579</a></p>
                    <p>Email: <a>support@gmail.com.vn</a></p>
                </div>
                <div class="content-contact-form content-infoandform-item">
                    <form action="" method="post">
                        <div class="form-personal">
                            <div class="form-peronal--item">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" name="fullname" placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-peronal--item item-email">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="" placeholder="Nhập địa chỉ email">
                            </div>
                        </div>
                        <div class="contact-form--item form-phonenumber">
                            <label for="phonenumber">Điện thoại</label>
                            <input type="text" name="phonenumber" id="" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="contact-form--item form-observe">
                            <label for="contact">Nội dung</label>
                            <textarea name="contact" id="" cols="30" rows="10" placeholder="Nội dung liên hệ"></textarea>
                        </div>
                        <div class="form-submit">
                            <button type="submit">Gửi tin nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection