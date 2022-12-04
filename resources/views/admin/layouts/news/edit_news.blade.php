@extends('admin.masterlayouts')
@section('active.news', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Sửa tin tức</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('/admin/news/update')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_news" value="{{ $news['id'] }}">
            <div class="mb-3 mt-3">
                <label for="title_news">Tiêu đề tin tức:</label>
                <textarea id="ckeditor_desc" class="form-control" cols="30" rows="15" placeholder="Nhập nội dung tin tức" name="title_news">{{ $news['title'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content_news">Nội dung tin tức:</label>
                <textarea id="ckeditor_details" class="form-control" cols="30" rows="15" placeholder="Nhập nội dung tin tức" name="content_news">{{ $news['content'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="author_news">Nhập tên tác giả:</label>
                <input type="text" class="form-control" value="{{ $news['author'] }}" name="author_news">
            </div>
            <div class="mb-3">
                <label for="state_news">Trạng thái:</label>
                <select name="state_news" id="" class="form-select">
                    <option {{ $news['state'] == 0 ? 'selected' : "" }} value="0">Ẩn</option>
                    <option {{ $news['state'] == 1 ? 'selected' : "" }} value="1">Hiển thị</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_news">Hình ảnh:</label>
                <div>
                    <img src="{{asset('images/news/' . $news['image'])}}" alt="" width="200px" style="margin: 10px 0 20px 0; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" name="image_news" required> 
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Cập nhật</button>
        </form>
    </div>
</div>  
@endsection