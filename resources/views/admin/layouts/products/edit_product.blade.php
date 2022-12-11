@extends('admin.masterlayouts')
@section('active.products', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Sửa sản phẩm</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('/admin/product/update')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form-horizontal">
            @csrf
            <input type="hidden" name="id_product" value="{{ $product['id'] }}">
            <div class="form-group mt-3">
                <label for="name_product">Tên sản phẩm:</label>
                <input type="text" value="{{ $product['name'] }}" rules="required" class="form-control" name="name_product" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group form-group">
                <label for="price_product">Giá sản phẩm:</label>
                <input type="text" value="{{ $product['price'] }}" rules="required|number" class="form-control" name="price_product" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="discount_product">Phần trăm giảm giá:</label>
                <input type="text" rules="required|number" value="{{ (int)$product['discount'] ? $product['discount'] : $product['discount'] }}" class="form-control" name="discount_product" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="desc_product">Mô tả sản phẩm:</label>
                <textarea class="form-control" rules="required" id="ckeditor_desc" name="desc_product" required cols="30" rows="4">{{ $product['description'] }}</textarea>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="details_product">Thông tin chi tiết sản phẩm:</label>
                <textarea class="form-control" rules="required" id="ckeditor_details" name="details_product" required cols="30" rows="15">{{ $product['details'] }}</textarea>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="state_product">Trạng thái:</label>
                <select name="state_product" id="" class="form-select">
                    <option {{ $product['state'] == 0 ? 'selected' : "" }} value="0">Ẩn</option>
                    <option {{ $product['state'] == 1 ? 'selected' : "" }} value="1">Hiển thị</option>
                </select>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="images">Hình ảnh chính:</label>
                <div class="box-img">
                    <img src="{{asset('images/' . $product['image_main'])}}" alt="" width="150px" style="margin: 10px 10px 20px 0; border-radius: 5px;">
                </div>
                <div class="preview-multiple-image">
                    <div class="wrapper-upload choose-imgmain">
                        <input class="file-input-imgmain" type="file" name="image_main" hidden required>
                        <section class="uploaded-icon uploaded-icon-imgmain">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Chọn ảnh mới tải lên (Chọn một ảnh)</p>
                        </section>
                        <section class="uploaded-area uploaded-area-imgmain w-100"></section>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="images">Hình ảnh phụ:</label>
                <div class="box-img">
                    @if($images_sub[0] != "")
                    @foreach($images_sub as $key => $url)
                        <img src="{{asset('images/' . $url)}}" alt="" width="150px" style="margin: 10px 10px 20px 0; border-radius: 5px;">
                    @endforeach
                    @endif
                </div>
                <div class="preview-multiple-image">
                    <div class="wrapper-upload choose-imgsub">
                        <input class="file-input-imgsub" type="file" name="images_sub[]" multiple="multiple" hidden>
                        <section class="uploaded-icon uploaded-icon-imgsub">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Chọn ảnh tải lên (Có thể chọn nhiều ảnh)</p>
                        </section>
                        <section class="uploaded-area w-100 uploaded-area-imgsub"></section>
                    </div>
                </div>
            </div>
            <div class="form-group">
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