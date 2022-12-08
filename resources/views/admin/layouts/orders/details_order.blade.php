@extends('admin.masterlayouts')
@section('active.orders', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList">
            <p class="titleList">Chi tiết đơn hàng</p>
        </div>
        <div class="box-addproduct">
            @foreach($orders as $key => $order)
            <div data-order_code="{{ $order['order_code'] }}" class="btn btn-outline-success btn-order-browsing">Duyệt đơn hàng</div>
            <a href="{{URL::to('admin/order/delete/' . $order['order_code'])}}" class="btn btn-outline-danger ms-1" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button">Xóa</a>
            @endforeach
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
            <p>Hiển thị</p>
            <div class="btn-group mx-2">
                <button type="button" class="btn pe-none btn-outline-primary py-1 px-2 dropdown-toggle">1</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=3')}}{{isset($querySort) ? $querySort : ''}}">3</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=4')}}{{isset($querySort) ? $querySort : ''}}">4</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/orders?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}">30</a>
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
        <div class="details__order">
            <div class="info-order info-order--modifi">
                @foreach($orders as $key => $order)
                <div class="group-order">
                    <label for="value_column">Mã hóa đơn: </label>
                    <span class="value_column">{{ $order['order_code'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Tên người nhận: </label>
                    <span class="value_column">{{ $order['fullname'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Số đt người nhận: </label>
                    <span class="value_column">{{ $order['number_phone'] }}</span>
                </div>
                <div class="group-order group-order-special">
                    <label for="value_column">Địa chỉ người nhận: </label>
                    <span class="value_column">{{ $order['address'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Phương thức thanh toán: </label>
                    <span class="value_column">{{ $order['payment_method'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Ngày đặt hàng: </label>
                    <span class="value_column">{{ $order['created_at'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Trạng thái đơn hàng: </label>
                    <span class="value_column">{{ $order['state'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Tổng tiền: </label>
                    <span class="value_column text-danger">{{ number_format($order['total_money'], 0, "", ".") . " VND"}}</span>
                </div>
                @endforeach
            </div>
            <div class="info-product info-product--modifi">
                <table class="table table-bordered" cellspacing="0" border="1">
                    <thead>
                        <tr>
                            <th>
                                <div class="title-column">
                                    <p>Mã sản phẩm</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Tên sản phẩm</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Số lượng</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Giá sản phẩm</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Phần trăm giảm</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="title-column">
                                    <p>Thành tiền</p>
                                    <div class="box-icon-sort d-flex ms-2">
                                        <i class="fa-solid fa-arrow-up sort-asc"></i>
                                        <i class="fa-solid fa-arrow-down sort-desc"></i>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details_order as $key => $value)
                        <tr>
                            <td>{{ $value['id_product'] }}</td>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['quantity'] }}</td>
                            <td>{{ number_format($value['price'], 0, "", ".") . " "}}VND</td>  
                            <td>{{ $value['discount'] }}</td>  
                            <td>{{ $value['into_money'] }}.000 VND</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box-paging">
        <div class="">Hiển thị 1 của {{$totalOrders}} mục</div>
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