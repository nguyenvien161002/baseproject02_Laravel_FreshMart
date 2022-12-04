@extends('admin.masterlayouts')
@section('active.accounts', 'active')
@section('active.accounts.staff', 'active')
@section('content')
<div class="container-fluid">
    <div class="box-titleList box-titleAccount d-flex justify-content-between align-items-center">
        <p class="titleList">Thêm tài khoản nhân viên</p>
        @if (Session::has('success'))
        <p class="congratulations"> {{Session::get('success')}} </p>
        @elseif (Session::has('failed'))
        <p class="failed"> {{Session::get('failed')}} </p>
        @endif
    </div>
    <div class="table-responsive">
        <form action="{{URL::to('admin/account/staff/insert')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="staff_name">Tên đăng nhập:</label>
                <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="staff_name" required>
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