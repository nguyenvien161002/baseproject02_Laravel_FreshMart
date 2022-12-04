@extends('admin.masterlayouts')
@section('active.products', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList">
            <p class="titleList">Chi tiết sản phẩm</p>
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('admin/product/edit/' . $product['id'])}}" class="btn btn-outline-success">Chỉnh sửa</a>
            <a class="btn btn-outline-danger ms-1" href="{{URL::to('admin/product/delete/' . $product['id'])}}" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button">Xóa</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
        <p>Hiển thị</p>
            <div class="btn-group mx-2">
                <button type="button" class="btn pe-none btn-outline-primary py-1 px-2 dropdown-toggle">1</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=10')}}{{isset($querySort) ? $querySort : ''}}">10</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=15')}}{{isset($querySort) ? $querySort : ''}}">15</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}">30</a>
                </div>
            </div>
            <p>sản phẩm</p>
        </div>
        <input type="search" class="search-input" placeholder="Tìm kiếm sản phẩm">
    </div>
    <div class="table-responsive">
        <div class="details__order bdb-none">
            <div class="info-order">
                <div class="group-order">
                    <label for="value_column">Mã sản phẩm: </label>
                    <span class="value_column">{{ $product['id'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Tên sản phẩm: </label>
                    <span class="value_column">{{ $product['name'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Giá sản phẩm: </label>
                    <span class="value_column">{{ number_format($product['price'], 0, ",", ".") . " " }}VND</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Phần trăm giảm: </label>
                    <span class="value_column">{{ (int)( $product['discount']) ?  $product['discount'] . '%' :  $product['discount']}}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Trạng thái sản phẩm: </label>
                    <span class="value_column">{{ $product['state'] == 1 ? "Hiển thị" : "Ẩn" }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thuộc danh mục: </label>
                    <span class="value_column">{{ $product['id_category_product'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thời gian thêm: </label>
                    <span class="value_column">{{ $product['created_at'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thời gian sửa mới nhât: </label>
                    <span class="value_column">{{ $product['updated_at'] }}</span>
                </div>
            </div>
            <div class="info-product">
                <table class="table table-bordered table-th175" cellspacing="0" border="1">
                    <thead>
                        <tr>
                            <th>
                                <div class="title-column">
                                    <p>Hình ảnh 1</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Hình ảnh 2</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Hình ảnh 3</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Hình ảnh 4</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{asset('images/' . $product['image_main'])}}" alt=""></td>
                            <td><img src="{{ $product['image_two'] ? asset('images/' . $product['image_two']) : ''}}" alt=""></td>
                            <td><img src="{{ $product['image_three'] ? asset('images/' . $product['image_three']) : ''}}" alt=""></td>
                            <td><img src="{{ $product['image_four'] ? asset('images/' . $product['image_four']) : ''}}" alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="content_desc-product">
            <div class="info-order">
                <div class="group-order">
                    <label for="value_column">Mô tả sản phẩm: </label>
                    <span class="value_column">{!!$product['description']!!}</span>
                </div>
                <div class="group-order">
                    <label for="value_column" class="mb-2">Nội dung chi tiết sản phẩm: </label>
                    <div class="value_column">{!!$product['details']!!}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-paging mt-3">
        <div class="">Hiển thị 1 của {{$totalProducts}} sản phẩm</div>
        <div class="paging_simple_numbers">
            <a href="" class="paginate_button previous btn">Previous</a>
            <span class="number_paging">
                <a href="" class="paginate_button">1</a>
            </span>
            <a href="" class="paginate_button next btn">Next</a>
        </div>
    </div>
</div>
@endsection