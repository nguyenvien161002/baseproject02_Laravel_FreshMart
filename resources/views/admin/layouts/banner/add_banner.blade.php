@extends('admin.masterlayouts')
@section('active.banner', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Thêm banner</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('admin/banner/insert')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="name_banner">Tên banner:</label>
                <input type="text" rules="required" class="form-control" placeholder="Nhập tên banner" name="name_banner" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group mt-3">
                <label for="state_banner">Trạng thái:</label>
                <select name="state_banner" id="" class="form-select" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image_banner">Hình ảnh:</label>
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
            <button type="submit" class="btn btn-outline-primary float-end">Thêm banner</button>
        </form>
    </div>
</div>
@endsection