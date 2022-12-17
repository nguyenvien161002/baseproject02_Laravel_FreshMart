@extends('clients.masterlayouts')
@section('title', 'Tất cả sản phẩm | Fresh Mart')
@section('content')
<div id="slider-introduction">
    <div class="drop-of-water">
        <img src="{{asset('images/drop_water/bg-after')}}-header.webp" alt="">
    </div>
    <div class="slider-navtitle">
        <div class="slider-title">Tất cả sản phẩm</div>
        <div class="slider-nav">
            <a href="" class="slider-nav-item">Trang chủ</a><i>/</i>
            <b class="slider-nav-item">Tất cả sản phẩm</b>
        </div>
    </div>
</div>
<div id="content-products">
    <div class="container">
        <div class="content-about">
            <div class="sidebar">
                <!-- Product Category: danh mục sản phẩm -->
                <div class="sidebar-item">
                    <div class="sidebar-title">DANH MỤC SẢN PHẨM</div>
                    <div class="sidebar-content">
                        <ul class="sidebar-content-list">
                            @foreach($category_product as $key => $cate)
                            <li class="item-name">
                                <a href="{{URL::to('categoryproduct/' . $cate['id'])}}">{{ $cate['name'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- filter:lọc -->
                <div class="sidebar-item">
                    <div class="sidebar-title">LỌC SẢN PHẨM</div>
                    <div class="sidebar-content">
                        <b>Giá sản phẩm</b>
                        <ul class="sidebar-content-list" id="sidebar-content-list">
                            <li class="item-name itemcheckbox" data-field="price_under:100000" data-id="1">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>Giá dưới 100.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="(range_price:100000-200000)" data-id="2">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>100.000đ - 200.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="(range_price:200000-300000)" data-id="3">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>200.000đ - 300.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="(range_price:300000-500000)" data-id="4">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>300.000đ - 500.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="price_over:500000" data-id="5">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>Giá trên 500.000đ</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-about">
                <div class="sort-products">
                    <div class="sort-product-item sort-product">
                        <i class="fa-solid fa-arrow-down-z-a"></i>
                        <p class="ms-1">Xếp theo</p>
                    </div>
                    <ul>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="alpha-asc">
                                <i></i>
                                <label for="">Tên A-Z</label>
                            </div>
                        </li>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="alpha-desc">
                                <i></i>
                                <label for="">Tên Z-A</label>
                            </div>
                        </li>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="price-asc">
                                <i></i>
                                <label for="">Giá thấp đến cao</label>
                            </div>
                        </li>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="price-desc">
                                <i></i>
                                <label for="">Giá cao xuống thấp</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-product-main" id="content-product-main">
                    @include('clients.layouts.products.main')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    //PAGINATION AJAX JQUERY: SORT
    $j(document).ready(function() {
        //FILTER RADIO
        $j(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var url = $j(this).attr('href');
            window.history.pushState("", "", url);
            getProductsMeGet(window.location.href);
        });

        $j(document).on('click', '.btnQuickSort', function(event) {
            $$('.btnQuickSort').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            var sort = event.target.getAttribute('name');
            var url = "{{ route('products') }}" + "?sort_by=" + sort;
            window.history.pushState("", "", url);
            getProductsMePost(window.location.href);
        });
        //FILTER CHECKBOX
        // var arrayParams = [];
        // var count = 1;
        // var url = "";
        // var data_field = "";
        // var data_checkbox_id = "";
        // $j(document).on('click', '.itemcheckbox', function(event) {
        //     $j(this).toggleClass('active');
        //     var isTrue = $j(this).hasClass('active');
        //     if(isTrue) {
        //         data_field = $j(this).attr('data-field');
        //         data_checkbox_id = $j(this).attr('data-id');
        //         if(count == 1) { 
        //             arrayParams.push({
        //                 id: data_checkbox_id,
        //                 field: data_field
        //             });
        //             url = "{{ route('products') }}" + "?filter=" + data_field;
        //         } else {
        //             arrayParams.push({
        //                 id: data_checkbox_id,
        //                 field: data_field
        //             });
        //             var params = "";
        //             var length = arrayParams.length;
        //             for(var i = 0; i < length ; i++) { 
        //                 if( i == 0) {
        //                     params = `${arrayParams[i].field}`
        //                 } else {
        //                     params += `&${arrayParams[i].field}`
        //                 }
        //             }
        //             url = window.location.origin + window.location.pathname + "?filter=" + params;
        //         }
        //         count++;
        //         window.history.pushState("", "", url);
        //     } else { 
        //         data_field = $j(this).attr('data-field');
        //         console.log("còn cái nịt");
        //     }
        //     getProductsMePost(window.location.href);
        // });
    });

    function getProductsMeGet(url) {
        $j.ajax({
            type: "GET",
            url: url,
            success: function(response) {
                $j('#content-product-main').html(response);
            }
        });
    }
    
    function getProductsMePost(url) {
        $j.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
            }
        });
        $j.ajax({
            type: "POST",
            url: "{{route('post.products')}}",
            data: JSON.stringify({
                url: url
            }),
            dataType: 'JSON',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=UTF-8',
            },
            success: function(response) {
                $j('#content-product-main').html(response);
            }
        });
    }
</script>
@endpush