@extends('admin.masterlayouts')
@section('active.products', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Thêm sản phẩm</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('/admin/product/insert')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name_product">Tên sản phẩm:</label>
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name_product" required>
            </div>
            <div class="mb-3">
                <label for="price_product">Giá sản phẩm:</label>
                <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price_product" required>
            </div>
            <div class="mb-3">
                <label for="discount_product">Phần trăm giảm giá:</label>
                <input type="text" class="form-control" placeholder="Nhập phần trăm giảm giá" name="discount_product" required>
            </div>
            <div class="mb-3">
                <label for="desc_product">Mô tả sản phẩm:</label>
                <textarea class="form-control" id="ckeditor_desc" placeholder="Nhập mô tả sản phẩm" name="desc_product"  cols="30" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="details_product">Thông tin chi tiết sản phẩm:</label>
                <textarea class="form-control" id="ckeditor_details" placeholder="Nhập thông tin chi tiết sản phẩm" name="details_product"  cols="30" rows="15"></textarea>
            </div>
            <div class="mb-3">
                <label for="state_product">Trạng thái:</label>
                <select name="state_product" id="" class="form-select" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_main">Hình ảnh 1:</label>
                <input type="file" class="form-control" name="image_main" required>
            </div>
            <div class="mb-3">
                <label for="image_two">Hình ảnh 2:</label>
                <input type="file" class="form-control" name="image_two">
            </div>
            <div class="mb-3">
                <label for="image_three">Hình ảnh 3:</label>
                <input type="file" class="form-control" name="image_three">
            </div>
            <div class="mb-3">
                <label for="image_four">Hình ảnh 4:</label>
                <input type="file" class="form-control" name="image_four">
            </div>
            <div class="mb-3">
                <label for="category_product">Danh mục sản phẩm:</label>
                <select name="category_product" id="" class="form-select" placeholder="Nhập danh mục sản phẩm" required>
                    <option value="">---- Chọn danh mục sản phẩm ----</option>
                    @foreach($categoryProduct as $key => $value)
                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Thêm sản phẩm</button>
        </form>
    </div>
</div>
@endsection