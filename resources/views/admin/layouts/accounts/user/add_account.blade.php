@extends('admin.masterlayouts')
@section('active.accounts', 'active')
@section('active.accounts.user', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Thêm tài khoản người dùng</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('admin/account/user/insert')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="fullname">Họ và tên:</label>
                <input type="text" class="form-control" placeholder="Nhập họ và tên" name="fullname" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" placeholder="Nhập email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Mật khẩu:</label>
                <input type="text" class="form-control" placeholder="Nhập mật khẩu" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password">Nhập lại mật khẩu:</label>
                <input type="text" class="form-control" placeholder="Nhập lại mật khẩu" name="confirm_password" required>
            </div>
            <div class="mb-3">
                <label for="id_authorization">Phân quyền:</label>
                <select name="id_authorization" id="" class="form-select">
                    @foreach($authorization as $key => $value)
                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Thêm tài khoản</button>
        </form>
    </div>
</div>
@endsection