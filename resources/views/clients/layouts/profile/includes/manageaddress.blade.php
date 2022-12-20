@extends('clients.layouts.profile.profile')
@section('title', 'Quản lý địa chỉ | Fresh Mart')
@section('profile.content')
<div class="col-xl-12 mt-3">
    <div class="account-info box-shadow p-3">
        <button class="btn-add-addr btn btn-primary d-flex align-items-center fw-bold" type="button">
            <img src="{{asset('images/svg/home.svg')}}" alt="">
            <p class="ms-3">Thêm địa chỉ</p>
        </button>
        @php
            $id_authorization = Session::get('id_authorization');
            if($id_authorization == 3) {
                $urlUser = URL::to('user/profile/');
            } elseif($id_authorization == 5) {
                $urlUser = URL::to('user/google/profile/');
            }
        @endphp
        @if(isset($address_default))
        <div class="address-group align-items-start mt-2 mb-2 justify-content-between {{ isset($address_default) ? 'd-flex' : 'd-none' }}">
            <div class="fs-15">
                <p class="mt-1"><strong>Họ và tên: </strong>{{ $address_default[0]['fullname'] }} (<span class="text-success">Địa chỉ mặc định</span>)</p>
                <p class="mt-1"><strong>Địa chỉ: </strong>{{ $address_default_fm }}</p>
                <p class="mt-1"><strong>Số điện thoại: </strong>{{ $address_default[0]['number_phone'] }}</p>
            </div>
            <div class="address-fix">
                <button class="btn btn-success mt-2 btn-addr-fix" data-id-user="{{ $address_default[0]['id_user'] }}" data-id="{{ $address_default[0]['id'] }}"><img src="{{asset('images/svg/fix.svg')}}" alt=""></button>
            </div>
        </div>
        @endif
        @if(isset($address_different))
        @foreach($address_different as $key => $value)
        <div class="address-group align-items-start pt-3 mb-2 justify-content-between {{ isset($address_different) ? 'd-flex' : 'd-none' }} {{ $key==0 ? 'border-0' : 'border-1 border-top' }}">
            <div class="fs-15">
                <p class="mt-1"><strong>Họ và tên: </strong>{{ $value['fullname'] }}</p>
                @php
                    $components_address = explode("|", $value['address_default']);
                    $address_default_fm = "";
                    for($i = 0; $i < count($components_address); $i++) { 
                        if($i == count($components_address) - 1) {
                            $address_default_fm .= " $components_address[$i]";
                        } else {
                            $address_default_fm .= " $components_address[$i],";
                        }
                    }
                @endphp
                <p class="mt-1"><strong>Địa chỉ: </strong>{{ isset($address_default_fm) ? $address_default_fm : '' }}</p>
                <p class="mt-1"><strong>Số điện thoại: </strong>{{ $value['number_phone'] }}</p>
            </div>
            <div class="address-fix">
                <button class="btn btn-success mt-2 btn-addr-fix" data-id-user="{{ $value['id_user'] }}" data-id="{{ $value['id'] }}"><img src="{{asset('images/svg/fix.svg')}}" alt=""></button>
                <a href="{{URL::to('user/google/profile/address/delete/' . $value['id_user'] . '/' . $value['id'])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')" class="btn btn-warning mt-2 btn-addr-delete"><img src="{{asset('images/svg/delete.svg')}}" alt=""></a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
@push('scripts')
<script> 
    var btnAddrFix = $$('.btn-addr-fix');
    var btnAddAddr = $('.btn-add-addr');
    var btnCloseAddr = $('.btn-close-addr');

    btnAddAddr.addEventListener('click', () => {
        $('.form-modal-address').reset();
        if (btnAddAddr.classList.contains('btn-add-addr')) {
            $('.address__header--midifi h5').innerText = "Thêm địa chỉ";
            $('.form-modal-address .btn-submit').innerText = "Thêm địa chỉ";
            $('.form-modal-address input[name="province"]').value = "";
            $('.form-modal-address input[name="district"]').value = "";
            $('.form-modal-address input[name="ward"]').value = "";
            $('.form-modal-address .form-province').innerHTML = `<p class="group-placeholder">Tỉnh/Thành phố</p>`;
            $('.form-modal-address .form-district').innerHTML = `<p class="group-placeholder">Quận/Huyện</p>`;
            $('.form-modal-address .form-ward').innerHTML = `<p class="group-placeholder">Phường/Xã</p>`;
        } else {
            $('.address__header--midifi h5').innerText = "Cập nhật địa chỉ";
            $('.form-modal-address .btn-submit').innerText = "Cập nhật địa chỉ";
        }
        if (modalCart.classList.contains('active') || modalSidebar.classList.contains('active')) {
            modalCart.classList.remove('active');
            modalSidebar.classList.remove('active');
        }
        modal.classList.add('active');
        modalAddress.classList.add('active');
    });

    btnAddrFix.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            if (btn.classList.contains('btn-add-addr')) {
                $('.address__header--midifi h5').innerText = "Thêm địa chỉ";
                $('.form-modal-address .btn-submit').innerText = "Thêm địa chỉ";
            } else {
                $('.address__header--midifi h5').innerText = "Cập nhật địa chỉ";
                $('.form-modal-address .btn-submit').innerText = "Cập nhật địa chỉ";
            }
            if (modalCart.classList.contains('active') || modalSidebar.classList.contains('active')) {
                modalCart.classList.remove('active');
                modalSidebar.classList.remove('active');
            }
            modal.classList.add('active');
            modalAddress.classList.add('active');
            var btnAddFixId = btn.getAttribute('data-id');
            var btnAddFixIdUser = btn.getAttribute('data-id-user');
            $j.ajax({
                type: "GET",     
                url: `{{isset($urlUser) ? $urlUser : ''}}` + `/address/get/` + `${btnAddFixId}`,
                success: function (response) {
                    var addressComponents = response[0].address_default;
                    addressComponents = addressComponents.split("|");
                    $('.form-modal-address input[name="fullname"]').value = response[0].fullname;
                    $('.form-modal-address input[name="number_phone"]').value = response[0].number_phone;
                    $('.form-modal-address input[name="street"]').value = addressComponents[0];
                    $('.form-modal-address input[name="province"]').value = addressComponents[3];
                    $('.form-modal-address input[name="district"]').value = addressComponents[2];
                    $('.form-modal-address input[name="ward"]').value = addressComponents[1];
                    $('.form-modal-address .form-province').innerHTML = addressComponents[3];
                    $('.form-modal-address .form-district').innerHTML = addressComponents[2];
                    $('.form-modal-address .form-ward').innerHTML = addressComponents[1];
                    if(response[0].state == 1) {
                        $('.form-modal-address input[name="address_default_checkbox"]').checked = true;
                    } else {
                        $('.form-modal-address input[name="address_default_checkbox"]').checked = false;
                    }
                    $('.form-modal-address').action = `{{isset($urlUser) ? $urlUser : ''}}` + `/address/update/${btnAddFixIdUser}/${btnAddFixId}`;
                }
            })

        });
    });

    btnCloseAddr.addEventListener('click', () => {
        modal.classList.remove('active');
    });

</script>
@endpush