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
            <div class="mb-3 mt-3">
                <label for="title">Tiêu đề tin tức:</label>
                    <textarea id="ckeditor_desc" class="form-control" cols="30" rows="15" placeholder="Nhập tiêu đề tin tức" name="title_news"></textarea>
            </div>
            <div class="mb-3">
                <label for="content_news">Nội dung tin tức:</label>
                <textarea id="ckeditor_details" class="form-control" cols="30" rows="15" placeholder="Nhập nội dung tin tức" name="content_news"></textarea>
            </div>
            <div class="mb-3">
                <label for="state_news">Trạng thái:</label>
                <select name="state_news" id="" class="form-select" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="author_news">Tác giả:</label>
                <input type="text" class="form-control" placeholder="Nhập tên tác giả" name="author_news">
            </div>
            <div class="mb-3">
                <label for="image_news">Hình ảnh:</label>
                <input type="file" class="form-control" name="image_news" required>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Thêm tin tức</button>
        </form>
    </div>
</div>
@endsection