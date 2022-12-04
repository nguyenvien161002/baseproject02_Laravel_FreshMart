@extends('admin.masterlayouts')
@section('active.categoryproduct', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList">
            <p class="titleList">Chi tiết danh mục</p>
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('admin/category_product/edit/' . $category_product['id'])}}" class="btn btn-outline-success">Chỉnh sửa</a>
            <a href="{{URL::to('admin/category_product/delete/' . $category_product['id'])}}" class="btn btn-outline-danger ms-1" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button">Xóa</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
            <p>Hiển thị</p>
            <div class="btn-group mx-2">
                <button type="button" class="btn pe-none btn-outline-primary py-1 px-2 dropdown-toggle">1</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/category_product?query=show&amount=10')}}{{isset($querySort) ? $querySort : ''}}">10</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/category_product?query=show&amount=15')}}{{isset($querySort) ? $querySort : ''}}">15</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/category_product?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/category_product?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}">30</a>
                </div>
            </div>
            <p>danh mục</p>
        </div>
        <input type="search" class="search-input" placeholder="Tìm kiếm danh mục">
    </div>
    <div class="table-responsive">
        <div class="details__order bdb-none">
            <div class="info-order">
                <div class="group-order">
                    <label for="value_column">Mã danh mục: </label>
                    <span class="value_column">{{ $category_product['id'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Tên danh mục: </label>
                    <span class="value_column">{!!$category_product['name']!!}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thời gian thêm: </label>
                    <span class="value_column">{{ $category_product['created_at'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thời gian sửa mới nhất: </label>
                    <span class="value_column">{{ $category_product['updated_at'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Trạng thái: </label>
                    <span class="value_column">{{ $category_product['state'] == 1 ? "Hiển thị" : "Ẩn" }}</span>
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
                            <td><img src="" alt=""></td>
                            <td><img src="" alt=""></td>
                            <td><img src="" alt=""></td>
                            <td><img src="" alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="content_desc-product">
            <div class="info-order">
                <div class="group-order">
                    <label for="value_column">Mô tả danh mục: </label>
                    <span class="value_column">{!!$category_product['description']!!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="box-paging mt-3">
        <div class="">Hiển thị 1 của {{$totalCategoryProduct}} danh mục</div>
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