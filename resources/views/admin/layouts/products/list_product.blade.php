@extends('admin.masterlayouts')
@section('active.products', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList box-titleProduct d-flex justify-content-between align-items-center">
            <p class="titleList"><i class="fa-brands fa-product-hunt"></i>Sản phẩm</p>
            @if (Session::has('success'))
            <p class="congratulations"> {{Session::get('success')}} </p>
            @elseif (Session::has('failed'))
            <p class="failed"> {{Session::get('failed')}} </p>
            @endif
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('/admin/product/add')}}" class="btn btn-outline-primary">Thêm mới</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
            <p>Hiển thị</p>
            <div class="btn-group mx-2">
                @php
                    if(Request::has('amount')) {
                        $amount = Request::get('amount');
                        $queryShowAmount = "&query=show&amount=$amount";
                    }
                    if(Request::has('sortby') && Request::has('type')) {
                        $sortby = Request::get('sortby');
                        $type = Request::get('type');
                        $querySort = "&sortby=$sortby&type=$type";
                    }
                        if(Request::has('search')) {
                        $search = Request::get('search');
                        $querySearch = "&search=$search";
                    }
                @endphp
                <button type="button" class="btn btn-outline-primary py-1 px-2 dropdown-toggle">{{ $products -> perPage() }}</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=1')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}">1</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=5')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}">5</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=10')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}">10</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=15')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}">15</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/products?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}">30</a>
                </div>
            </div>
            <p>sản phẩm</p>
        </div>
        <form action="{{URL::to('/admin/products')}}" class="form-search" method="GET">
            @if(Request::has('amount'))
            <input type="hidden" name="query" value="show">
            <input type="hidden" name="amount" value="{{Request::get('amount')}}">
            @endif
            @if(Request::has('sortby'))
            <input type="hidden" name="sortby" value="{{Request::get('sortby')}}">
            <input type="hidden" name="type" value="{{Request::get('type')}}">
            @endif
            <input type="search" class="search-input search-input-general" name="search" value="{{isset($search) ? $search : ''}}" placeholder="Tìm kiếm sản phẩm ..." autocomplete="off">
            <div class="box-autocomplete position-absolute"></div>
            <button type="submit"><img src="{{asset('images/svg/search2.svg')}}" alt=""></button>
        </form>
    </div>
    <table class="table table-bordered" cellspacing="0" border="1">
        <thead>
            <tr>
                <th width="160px">
                    <div class="title-column">
                        <p>Mã sản phẩm</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/products?sortby=id&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/products?sortby=id&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="title-column">
                        <p>Tên sản phẩm</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/products?sortby=name&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/products?sortby=name&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="200px">
                    <div class="title-column">
                        <p>Giá thành</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/products?sortby=price&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/products?sortby=price&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="200px">
                    <div class="title-column">
                        <p>Phần trăm giảm</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/products?sortby=discount&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/products?sortby=discount&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="140px">
                    <div class="title-column">
                        <p>Trạng thái</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/products?sortby=state&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/products?sortby=state&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="200px">
                    <div class="title-column">
                        <p>#</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/products?sortby=id&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/products?sortby=id&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $value)
            <tr>
                <td>{{ $value -> id }}</td>
                <td>{{ $value -> name }} </td>
                <td>{{ number_format($value -> price, 0, ",", ".") }} VND</td>
                <td>{{ (int)($value -> discount) ? $value -> discount . '%' : $value -> discount}}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{URL::to('admin/product/updated?id=' . $value -> id . '&state=')}}{{ $value -> state == 1 ? 'private' : 'public' }}" class="btn-state py-0 btn btn-outline-secondary rounded-pill d-flex align-items-center {{ $value -> state == 1 ? 'text-primary' : 'text-danger' }} ">
                            <i class="mdi mdi-adjust me-1"></i>
                            {{ $value -> state == 1 ? 'Hiển thị' : 'Ẩn' }}
                        </a>
                    </div>
                </td>
                <td>
                    <a class="btn btn-outline-success" href="{{URL::to('admin/product/details/' . $value -> id)}}" type="button" target="">Xem</a>
                    <a class="btn btn-outline-warning" href="{{URL::to('admin/product/edit/' . $value -> id)}}" type="button">Sửa</a>
                    <a class="btn btn-outline-danger" href="{{URL::to('admin/product/delete/' . $value -> id)}}" onclick="return z" type="button">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="box-paging">
        {{$products -> appends(Request::all()) -> links('admin.layouts.pagination')}}
    </div>
</div>
@endsection