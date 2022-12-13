 id="ckeditor_desc"
id="ckeditor_details"@extends('admin.masterlayouts')
@section('active.categoryproduct', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Sửa sanh mục sản phẩm</p>
    </div>
    <div class="table-responesive">
        <form action="{{URL::to('admin/category_product/update')}}" class="form-horizontal" method="POST" autocomplete="off">
            @csrf
            <input type="hidden" name="id_category" value="{{ $category_product['id'] }}">
            <div class="form-group mt-3">
                <label for="name_category">Tên danh mục:</label>
                <input type="text" rules="required" class="form-control" value="{{ $category_product['name'] }}" name="name_category" placeholder="Nhập tên danh mục">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="description_category">Mô tả danh mục:</label>
                <textarea id="ckeditor_details" class="form-control" cols="30" rows="5" placeholder="Nhập mô tả danh mục" name="description_category">{{ $category_product['description'] }}</textarea>
            </div>
            <div class="form-group">
                <label for="state_category">Trạng thái:</label>
                <select name="state_category" id="" class="form-select" required>
                    <option {{ isset($category_product['state']) == 0 ? 'selected' : "" }} value="0">Ẩn</option>
                    <option {{ isset($category_product['state']) == 1 ? 'selected' : "" }} value="1">Hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Cập nhật danh mục</button>
        </form>
    </div>  
</div>
@endsection