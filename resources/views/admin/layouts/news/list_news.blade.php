@extends('admin.masterlayouts')
@section('active.news', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList box-titleNews d-flex justify-content-between align-items-center">
            <p class="titleList"> <i class="fa-solid fa-file-contract"></i>Tin tức</p>
            @if (Session::has('success'))
            <p class="congratulations"> {{Session::get('success')}} </p>
            @elseif (Session::has('failed'))
            <p class="failed"> {{Session::get('failed')}} </p>
            @endif
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('/admin/news/add')}}" class="btn btn-outline-primary">Thêm mới</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="">
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
                            $querySort = "&sortby=$sortby&type=$type ";
                        }
                    @endphp
                    <button type="button" class="btn btn-outline-primary py-1 px-2 dropdown-toggle">{{ $allNews -> perPage() }}</button>
                    <div class="dropdown-menu py-1">
                        <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=10')}}{{isset($querySort) ? $querySort : ''}}">10</a>
                        <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=15')}}{{isset($querySort) ? $querySort : ''}}">15</a>
                        <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}">20</a>
                        <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/news?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}">30</a>
                    </div>
                </div>
                <p>tin tức</p>
            </div>
        </div>
        <input type="search" class="search-input" placeholder="Tìm kiếm tin tức">
    </div>
    <table class="table table-bordered" cellspacing="0" border="1">
        <thead>
            <tr>
                <th style="width: 160px">
                    <div class="title-column">
                        <p>Mã tin tức</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/news?sortby=id&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/news?sortby=id&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="150px">
                    <div class="title-column">
                        <p>Tên tin tức</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/news?sortby=title&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/news?sortby=title&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="title-column">
                        <p>Nội dung tin tức</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/news?sortby=content&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/news?sortby=content&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="150px">
                    <div class="title-column">
                        <p>Tác giả</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/news?sortby=author&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/news?sortby=author&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="140px">
                    <div class="title-column">
                        <p>Trạng thái</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/news?sortby=state&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/news?sortby=state&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
                <th width="200px">
                    <div class="title-column">
                        <p>#</p>
                        <div class="box-icon-sort d-flex ms-2">
                            <a href="{{URL::to('/admin/news?sortby=id&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                            <a href="{{URL::to('/admin/news?sortby=id&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($allNews as $key => $value)
            <tr>
                <td>{{ $value -> id }}</td>
                <td>
                    <div class="box-title_news">
                        {!!$value -> title!!}
                    </div>
                </td>
                <td>
                    <div class="box-content_news">
                        {!!$value -> content!!}
                    </div>
                </td>
                <td>{{ $value -> author }}</td>
                <td>{{ $value -> state == 1 ? "Hiển thị" : "Ẩn" }}</td>
                <td>
                    <a class="btn btn-outline-success" href="{{URL::to('/admin/news/details/' . $value -> id)}}" type="button" target="">Xem</a>
                    <a class="btn btn-outline-warning" href="{{URL::to('/admin/news/edit/' . $value -> id)}}" type="button">Sửa</a>
                    <a class="btn btn-outline-danger" href="{{URL::to('/admin/news/delete/' . $value -> id)}}" onclick="return confirm('Bạn có thật sự muốn xóa ');" type="button">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="box-paging">
        {{$allNews -> appends(Request::all()) -> links('admin.layouts.pagination')}}
    </div>
</div>
@endsection