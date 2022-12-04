@extends('admin.masterlayouts')
@section('active.categoryproduct', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Thêm danh mục sản phẩm</p>
    </div>
    <div class="table-responesive">
        <form action="{{URL::to('/admin/category_product/insert')}}" class="form-horizontal" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name_category">Tên danh mục:</label>
                <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name_category" id="name_category" required>
            </div>
            <div class="mb-3">
                <label for="description_category">Mô tả danh mục:</label>
                <textarea id="ckeditor_details" class="form-control" placeholder="Nhập mô danh mục" name="description_category" id="description_category" cols="30" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="state_category">Trạng thái:</label>
                <select name="state_category" id="" class="form-select" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Thêm danh mục</button>
        </form>
    </div>
</div>
@endsection