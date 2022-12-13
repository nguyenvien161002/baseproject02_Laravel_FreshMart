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
            <div class="form-group mt-3">
                <label for="name_banner">Tên banner:</label>
                <input type="text" rules="required" class="form-control" value="{{ $banner['name'] }}" name="name_banner" placeholder="Nhập tiêu đề tin tức">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="state_banner">Trạng thái:</label>
                <select name="state_banner" id="" class="form-select">
                    <option {{ $banner['state'] == 0 ? 'selected' : "" }} value="0">Ẩn</option>
                    <option {{ $banner['state'] == 1 ? 'selected' : "" }} value="1">Hiển thị</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image_banner">Hình ảnh:</label>
                <div>
                    <img src="{{asset('images/banner/' . $banner['image'])}}" alt="" width="400px" style="margin: 10px 0 20px 0; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <div class="preview-multiple-image">
                    <div class="wrapper-upload choose-imgmain">
                        <input class="file-input-imgmain" type="file" name="image_banner" hidden>
                        <section class="uploaded-icon uploaded-icon-imgmain">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Chọn ảnh tải lên (Chọn một ảnh)</p>
                        </section>
                        <section class="uploaded-area uploaded-area-imgmain w-100"></section>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Cập nhật</button>
        </form>
    </div>
</div>   
@endsection