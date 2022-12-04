@extends('admin.masterlayouts')
@section('active.accounts', 'active')
@section('active.accounts.user', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList">
        <p class="titleList">Sửa thông tin tài khoản</p>
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('admin/account/user/update')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_account" value="{{ $account['id'] }}">
            <div class="mb-3 mt-3">
                <label for="fullname">Tên người dùng:</label>
                <input type="text" class="form-control" value="{{ $account['fullname'] }}" name="fullname" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" value="{{ $account['email'] }}" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Mật khẩu (đã md5):</label>
                <input type="text" class="form-control" value="{{ $account['password'] }}" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password">Nhập lại mật khẩu (đã md5):</label>
                <input type="text" class="form-control" value="{{ $account['confirm_password'] }}" name="confirm_password" required>
            </div>
            <div class="mb-3">
                <label for="id_authorization">Phân quyền:</label>
                <select name="id_authorization" id="" class="form-select">
                    @foreach($authorization as $key => $value)
                    <option value="{{ $value['id'] }}" {{$value['id'] == $account['id_authorization'] ? "selected" : '' }}>{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary float-end">Sửa thông tin</button>
        </form>
    </div>
</div> 
@endsection