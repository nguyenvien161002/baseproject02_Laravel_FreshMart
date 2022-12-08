@extends('admin.masterlayouts')
@section('active.accounts', 'active')
@section('active.accounts.staff', 'active')
@section('content')
<div class="container-fluid">
    @foreach ($account as $key)
    <div class="header-table">
        <div class="box-titleList">
            <p class="titleList">Chi tiết tài khoản</p>
        </div>
        <div class="box-addproduct">
            <a href="{{URL::to('admin/account/staff/edit/' . $key['id'])}}" class="btn btn-outline-success">Chỉnh sửa</a>
            <a href="{{URL::to('admin/account/staff/delete/' . $key['id'])}}" class="btn btn-outline-danger ms-1" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button">Xóa</a>
        </div>
    </div>
    <div class="sort-search">
        <div class="d-flex align-items-center">
            <p>Hiển thị</p>
            <div class="btn-group mx-2">
                <button type="button" class="btn pe-none btn-outline-primary py-1 px-2 dropdown-toggle">1</button>
                <div class="dropdown-menu py-1">
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/accounts/staffs?query=show&amount=4')}}{{isset($querySort) ? $querySort : ''}}">4</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/accounts/staffs?query=show&amount=15')}}{{isset($querySort) ? $querySort : ''}}">15</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/accounts/staffs?query=show&amount=20')}}{{isset($querySort) ? $querySort : ''}}">20</a>
                    <a class="dropdown-item py-1 px-3" href="{{URL::to('/admin/accounts/staffs?query=show&amount=30')}}{{isset($querySort) ? $querySort : ''}}">30</a>
                </div>
            </div>
            <p>tài khoản</p>
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
    <div class="table-responsive">
        <div class="details__order">
            <div class="info-order w-50">
                <div class="group-order">
                    <label for="value_column">Mã tài khoản: </label>
                    <span class="value_column">{{ $key['id'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Tên tài khoản: </label>
                    <span class="value_column">{{ $key['staff_name'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Mật khẩu (MD5): </label>
                    <span class="value_column">{{ $key['password'] }}</span>
                </div>
                <div class="group-order group-order-special">
                    <label for="value_column">Mật khẩu nhập lại (MD5): </label>
                    <span class="value_column">{{ $key['confirm_password'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Phân quyền người dùng: </label>
                    <span class="value_column">{{ $key['name'] }}</span>
                </div>
                <div class="group-order">
                    <label for="value_column">Mô tả phân quyền người dùng: </label>
                    <span class="value_column">{{ $key['description'] }}</span>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="" alt=""></td>
                            <td><img src="" alt=""></td>
                            <td><img src="" alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box-paging mt-3">
        <div class="">Hiển thị 1 của {{$totalAccounts}} tài khoản</div>
        <div class="paging_simple_numbers">
            <a href="" class="paginate_button previous btn">Previous</a>
            <span class="number_paging">
                <a href="" class="paginate_button">1</a>
            </span>
            <a href="" class="paginate_button next btn">Next</a>
        </div>
    </div>
    @endforeach
</div>
@endsection