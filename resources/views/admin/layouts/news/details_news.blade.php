@extends('admin.masterlayouts')
@section('active.news', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList">
            <p class="titleList">Chi tiết tin tức</p>
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('/admin/news/edit/' . $news['id'])}}" class="btn btn-outline-success">Chỉnh sửa</a>
            <a href="{{URL::to('/admin/news/delete/' . $news['id'])}}" class="btn btn-outline-danger ms-1" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button">Xóa</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
            <p>Hiển thị</p>
            <div class="btn-group mx-2">
                <button type="button" class="btn pe-none btn-outline-primary py-1 px-2 dropdown-toggle">1</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=3')}}{{isset($querySort) ? $querySort : ''}}">3</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=4')}}{{isset($querySort) ? $querySort : ''}}">4</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}">30</a>
                </div>
            </div>
            <p>tin tức</p>
        </div>
        <input type="search" class="search-input" placeholder="Tìm kiếm sản phẩm">
    </div>
    <div class="table-responsive">
        <div class="details__order bdb-none">
            <div class="info-order">
                <div class="group-order">
                    <label for="value_column">Mã tin tức: </label>
                    <span class="value_column">{{ $news['id'] }}</span>
                </div>
                <div class="group-order group-order-special">
                    <label for="value_column">Tiêu dề tin tức: </label>
                    <span class="value_column">{!!$news['title']!!}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Tác giả: </label>
                    <span class="value_column">{{ $news['author'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thời gian đăng bài: </label>
                    <span class="value_column">{{ $news['created_at'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Thời gian sửa mới nhất: </label>
                    <span class="value_column">{{ $news['updated_at'] }}</span>
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
                            <td><img src="{{asset('images/news/' . $news['image'])}}" alt=""></td>
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
                    <label for="value_column" class="mb-2">Nội dung tin tức: </label>
                    <span class="value_column">{!!$news['content']!!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="box-paging mt-3">
        <div class="">Hiển thị 1 của {{$totalNews}} tin tức</div>
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