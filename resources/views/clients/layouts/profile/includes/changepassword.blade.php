@extends('clients.layouts.profile.profile')
@section('title', 'Thay đổi mật khẩu | Fresh Mart')
@section('profile.content')
<div class="col-xl-12 mt-3">
    <div class="account-info box-shadow p-3">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold m-0 change-password">Đổi mật khẩu</h4>
            <span>{{Session::has('success') ? Session::get('success') : ''}}</span>
        </div>
        <form action="{{URL::to('/user/forgot/password')}}" method="POST" class="form-change-password mt-3">
            @csrf
            <div class="form-group mb-2">
                <label for="email" class="form-label fw-bold">Email của bạn:</label>
                <input id="email" name="email" rules="required|email" value="" type="text" placeholder="Nhập email của bạn" class="form-control">
                <span class="form-message fw-bold text-danger"></span>
            </div>
            <button class="form-submit btn btn-success">Gửi email xác nhận</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        new Validator('.form-change-password');
    </script>
@endpush