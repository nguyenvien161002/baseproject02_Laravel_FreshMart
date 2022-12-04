@extends('admin.masterlayouts')
@section('active.products', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Sửa sản phẩm</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('/admin/product/update')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_product" value="{{ $product['id'] }}">
            <div class="mb-3 mt-3">
                <label for="name_product">Tên sản phẩm:</label>
                <input type="text" value="{{ $product['name'] }}" class="form-control" name="name_product" required>
            </div>
            <div class="mb-3">
                <label for="price_product">Giá sản phẩm:</label>
                <input type="text" value="{{ $product['price'] }}" class="form-control" name="price_product" required>
            </div>
            <div class="mb-3">
                <label for="discount_product">Phần trăm giảm giá:</label>
                <input type="text" value="{{ (int)$product['discount'] ? $product['discount'] : $product['discount'] }}" class="form-control" name="discount_product" required>
            </div>
            <div class="mb-3">
                <label for="desc_product">Mô tả sản phẩm:</label>
                <textarea class="form-control" id="ckeditor_desc" name="desc_product" required cols="30" rows="4">{{ $product['description'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="details_product">Thông tin chi tiết sản phẩm:</label>
                <textarea class="form-control" id="ckeditor_details" name="details_product" required cols="30" rows="15">{{ $product['details'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="state_product">Trạng thái:</label>
                <select name="state_product" id="" class="form-select">
                    <option {{ $product['state'] == 0 ? 'selected' : "" }} value="0">Ẩn</option>
                    <option {{ $product['state'] == 1 ? 'selected' : "" }} value="1">Hiển thị</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image_main">Hình ảnh 1:</label>
                <div class="box-img">
                    <img src="{{asset('images/' . $product['image_main'])}}" alt="" width="200px" style="margin: 10px 0 20px 0; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" name="image_main" required>
            </div>
            <div class="mb-3">
                <label for="image_two">Hình ảnh 2:</label>
                <div class="box-img">
                    <img src="{{ $product['image_two'] ? asset('images/' . $product['image_two']) : ''}}" alt="" width="200px" style="margin: 10px 0 20px 0; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" name="image_two">
            </div>
            <div class="mb-3">
                <label for="image_three">Hình ảnh 3:</label>
                <div class="box-img">
                    <img src="{{ $product['image_three'] ? asset('images/' . $product['image_three']) : ''}}" alt="" width="200px" style="margin: 10px 0 20px 0; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" name="image_three">
            </div>
            <div class="mb-3">
                <label for="image_four">Hình ảnh 4:</label>
                <div class="box-img">
                    <img src="{{ $product['image_four'] ? asset('images/' . $product['image_four']) : ''}}" alt="" width="200px" style="margin: 10px 0 20px 0; border-radius: 5px;">
                </div>
                <input type="file" class="form-control" name="image_four">
            </div>
            <div class="mb-3">
                <label for="category_product">Danh mục sản phẩm:</label>
                <select name="category_product" id="" class="form-select">
                    @foreach($categoryProduct as $key => $value)
                    <option {{ $product['id_category_product'] == $value['id'] ? 'selected' : "" }} value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Cập nhật</button>
        </form>
    </div>
</div>
@endsection