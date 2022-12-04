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
            <div class="mb-3 mt-3">
                <label for="name_banner">Tên banner:</label>
                <input type="text" class="form-control" placeholder="Nhập tên banner" name="name_banner" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="state_banner">Trạng thái:</label>
                <select name="state_banner" id="" class="form-select" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_banner">Hình ảnh:</label>
                <input type="file" class="form-control" name="image_banner" required>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Thêm banner</button>
        </form>
    </div>
</div>
@endsection