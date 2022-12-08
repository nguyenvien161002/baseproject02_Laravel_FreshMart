@extends('admin.masterlayouts')
@section('active.orders', 'active')
@section('content')
<div class="container-fluid">
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
        if(Request::has('search')) {
            $search = Request::get('search'); 
            $querySearch = "&search=$search";
        }
        if(Request::has('review')) {
            $review = Request::get('review'); 
            $queryReview = "&review=$review ";
        }
    @endphp
    <div class="header-table">
        <div class="box-titleList box-titleOrders d-flex justify-content-between align-items-center">
            <p class="titleList"><i class="fa-solid fa-cart-shopping"></i>Đơn hàng</p>
            @if (Session::has('success'))
            <p class="congratulations"> {{Session::get('success')}} </p>
            @elseif (Session::has('failed'))
            <p class="failed"> {{Session::get('failed')}} </p>
            @endif
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('admin/orders?review=approved')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}" class="btn btn-outline-primary">Đã duyệt</a>
            <a href="{{URL::to('admin/orders?review=unapproved')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}" class="btn btn-outline-primary ms-2">Chưa duyệt</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
            <p>Hiển thị</p>
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-outline-primary py-1 px-2 dropdown-toggle">{{ $orders -> perPage() }}</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=1')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}">1</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=10')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}">10</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=15')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}">15</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}">30</a>
                </div>
            </div>
            <p>đơn hàng</p>
        </div>
        <form action="{{URL::to('/admin/orders')}}" class="form-search" method="GET"> 
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
    <div class="table-responsive">
        <table class="table table-bordered" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th style="width: 160px">
                        <div class="title-column">
                            <p>Mã đơn hàng</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=order_code&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=order_code&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="title-column">
                            <p>Tên người nhận</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=fullname&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=fullname&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="title-column">
                            <p>Số đt người nhận</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=number_phone&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=number_phone&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="title-column">
                            <p>Địa chỉ</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=address&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=address&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                    <th width=130px>
                        <div class="title-column">
                            <p>Tổng tiền</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=total_money&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=total_money&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="title-column">
                            <p>Trạng Thái</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=state&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=state&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                    <th width="142px">
                        <div class="title-column">
                            <p>#</p>
                            <div class="box-icon-sort d-flex ms-2">
                                <a href="{{URL::to('/admin/orders?sortby=id&type=asc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-up sort-asc"></i></a>
                                <a href="{{URL::to('/admin/orders?sortby=id&type=desc')}}{{isset($queryShowAmount) ? $queryShowAmount : ''}}{{isset($querySearch) ? $querySearch : ''}}{{isset($queryReview) ? $queryReview : ''}}"><i class="fa-solid fa-arrow-down sort-desc"></i></a>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $order['order_code'] }}</td>
                    <td>{{ $order['fullname'] }}</td>
                    <td>{{ $order['number_phone'] }}</td>
                    <td>{{ $order['address'] }}</td>
                    <td>{{ number_format($order['total_money'], 0, "", ".") }} VND</td>
                    <td>{{ $order['state'] }}</td>
                    <td>
                        <a href="{{URL::to('admin/order/details/' . $order['order_code'])}}" class="btn btn-outline-success">Xem</a>
                        <a href="{{URL::to('admin/order/delete/' . $order['order_code'])}}" class="btn btn-outline-danger " onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-paging">
        {{$orders -> appends(Request::all()) -> links('admin.layouts.pagination')}}
    </div>
</div>
@endsection