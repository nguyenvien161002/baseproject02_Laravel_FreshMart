@extends('clients.layouts.profile.profile')
@section('title', 'Trang cá nhân | Fresh Mart')
@section('profile.content')
<div class="col-xl-12 mt-3">
    <div class="account-info box-shadow p-3">
        <h4 class="fw-bold mt-0">Thông tin cá nhân</h4>
        <p class="mb-1"><b>Họ và tên: </b> {{ $user[0]['fullname'] }}</p>
        <p class="mb-1"><b>Email: </b> {{ $user[0]['email'] }}</p>
        <p class=""><b>Giới tính: </b> </p>
    </div>
</div>
@endsection