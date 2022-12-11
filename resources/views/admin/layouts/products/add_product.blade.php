@extends('admin.masterlayouts')
@section('active.products', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Thêm sản phẩm</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('/admin/product/insert')}}" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" id="form-horizontal">
            @csrf
            <div class="mt-3 form-group">
                <label for="name_product">Tên sản phẩm:</label>
                <input type="text" class="form-control" rules="required" placeholder="Nhập tên sản phẩm" name="name_product" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="price_product">Giá sản phẩm:</label>
                <input type="text" class="form-control" rules="required|number" placeholder="Nhập giá sản phẩm" name="price_product" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="discount_product">Phần trăm giảm giá:</label>
                <input type="text" class="form-control" rules="required|number" placeholder="Nhập phần trăm giảm giá" name="discount_product" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="desc_product">Mô tả sản phẩm:</label>
                <textarea class="form-control" id="ckeditor_desc" rules="required" placeholder="Nhập mô tả sản phẩm" name="desc_product" cols="30" rows="4"></textarea>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="details_product">Thông tin chi tiết sản phẩm:</label>
                <textarea class="form-control" id="ckeditor_details" rules="required" placeholder="Nhập thông tin chi tiết sản phẩm" name="details_product" cols="30" rows="15"></textarea>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="state_product">Trạng thái:</label>
                <select name="state_product" id="" class="form-select" rules="required" required>
                    <option value="0">Ẩn</option>
                    <option selected value="1">Hiển thị</option>
                </select>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="image_main">Hình ảnh chính:</label>
                <div class="preview-multiple-image">
                    <div class="wrapper-upload choose-imgmain">
                        <input class="file-input-imgmain" type="file" name="image_main" hidden required>
                        <section class="uploaded-icon uploaded-icon-imgmain">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Chọn ảnh tải lên (Chọn một ảnh)</p>
                        </section>
                        <section class="uploaded-area uploaded-area-imgmain w-100"></section>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="images_sub[]">Hình ảnh phụ:</label>
                <div class="preview-multiple-image">
                    <div class="wrapper-upload choose-imgsub">
                        <input class="file-input-imgsub" type="file" name="images_sub[]" multiple="multiple" hidden required>
                        <section class="uploaded-icon uploaded-icon-imgsub">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Chọn ảnh tải lên (Có thể chọn nhiều ảnh)</p>
                        </section>
                        <section class="uploaded-area w-100 uploaded-area-imgsub"></section>
                    </div>
                </div>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="category_product">Danh mục sản phẩm:</label>
                <select name="category_product" id="" class="form-select" placeholder="Nhập danh mục sản phẩm">
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