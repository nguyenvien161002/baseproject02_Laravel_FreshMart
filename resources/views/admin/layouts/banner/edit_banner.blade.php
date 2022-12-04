@extends('admin.masterlayouts')
@section('active.banner', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Sửa banner</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('admin/banner/update')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_banner" value="{{ $banner['id'] }}">
            <div class="mb-3 mt-3">
                <label for="name_banner">Tên banner:</label>
                <input type="text" class="form-control" value="{{ $banner['name'] }}" name="name_banner" placeholder="Nhập tiêu đề tin tức">
            </div>
            <div class="mb-3">
                <label for="state_banner">Trạng thái:</label>
                <select name="state_banner" id="" class="form-select">
                    <option {{ $banner['state'] == 0 ? 'selected' : "" }} value="0">Ẩn</option>
                    <option {{ $banner['state'] == 1 ? 'selected' : "" }} value="1">Hiển thị</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_banner">Hình ảnh:</label>
                <div>
                    <img src="{{asset('images/banner/' . $banner['image'])}}" alt="" width="400px" style="margin: 10px 0 20px 0; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" name="image_banner" required> 
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Cập nhật</button>
        </form>
    </div>
</div>   
@endsection