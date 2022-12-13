@extends('admin.masterlayouts')
@section('active.news', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Thêm tin tức</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('/admin/news/insert')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Tiêu đề tin tức:</label>
                <input type="text" rules="required" class="form-control" placeholder="Nhập tiêu đề tin tức" name="title_news">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="content_news">Nội dung tin tức:</label>
                <textarea id="ckeditor_details" class="form-control" cols="30" rows="15" placeholder="Nhập nội dung tin tức" name="content_news"></textarea>
            </div>
            <div class="form-group">
                <label for="state_news">Trạng thái:</label>
                <select name="state_news" id="" class="form-select" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
            </div>
            <div class="form-group">
                <label for="author_news">Tác giả:</label>
                <input type="text" class="form-control" placeholder="Nhập tên tác giả" name="author_news">
            </div>
            <div class="form-group">
                <label for="image_news">Hình ảnh:</label>
                <div class="preview-multiple-image">
                    <div class="wrapper-upload choose-imgmain">
                        <input class="file-input-imgmain" type="file" name="image_news" hidden>
                        <section class="uploaded-icon uploaded-icon-imgmain">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Chọn ảnh tải lên (Chọn một ảnh)</p>
                        </section>
                        <section class="uploaded-area uploaded-area-imgmain w-100"></section>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Thêm tin tức</button>
        </form>
    </div>
</div>
@endsection