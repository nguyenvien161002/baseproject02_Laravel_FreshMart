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
                            <li class="item-name itemcheckbox" data-field="price_under:100000" data-id="1" data-id-merge="1">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>Giá dưới 100.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="(range_price:100000-200000)" data-id="2" data-id-merge="2">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>100.000đ - 200.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="(range_price:200000-300000)" data-id="3" data-id-merge="3">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>200.000đ - 300.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="(range_price:300000-500000)" data-id="4" data-id-merge="4">
                                <a href="" class="d-flex align-items-center">
                                    <i class="checkboxfa"></i>
                                    <p>300.000đ - 500.000đ</p>
                                </a>
                            </li>
                            <li class="item-name itemcheckbox" data-field="price_over:500000" data-id="5" data-id-merge="5">
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
                            <div class="btnQuickSort" name="alpha-asc" data-id="1" data-id-merge="6">
                                <i></i>
                                <label for="">Tên A-Z</label>
                            </div>
                        </li>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="alpha-desc" data-id="2" data-id-merge="7">
                                <i></i>
                                <label for="">Tên Z-A</label>
                            </div>
                        </li>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="price-asc" data-id="3" data-id-merge="8">
                                <i></i>
                                <label for="">Giá thấp đến cao</label>
                            </div>
                        </li>
                        <li class="btn-quick-sort">
                            <div class="btnQuickSort" name="price-desc" data-id="4" data-id-merge="9">
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
    let sort = JSON.parse(localStorage.getItem('SORT')) || [];
    let filter = JSON.parse(localStorage.getItem('FILTER')) || [];
    let filterMergeSort = JSON.parse(localStorage.getItem('FILTER_MERGE_SORT')) || [];
    if (sort.length != 0) {
        $$('.btnQuickSort').forEach(btn => {
            sort.forEach(item => {
                if (btn.getAttribute('data-id') == item.id) {
                    btn.classList.add('active');
                }
            })
        });
    }
    if (filter.length != 0) {
        $$('.itemcheckbox').forEach(btn => {
            filter.forEach(item => {
                if (btn.getAttribute('data-id') == item.id) {
                    btn.classList.add('active');
                }
            })
        });
    }
    $j(document).ready(function() {
        window.onpopstate = (event) => {
            window.location.href = document.location;
        };
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
            var nameSort = event.target.getAttribute('name');
            var idSort = event.target.getAttribute('data-id');
            sort = [];
            sort.push({
                id: idSort,
                name: nameSort
            })
            localStorage.setItem('SORT', JSON.stringify(sort));
            var urlMerge = window.location.href;
            var url = "{{ route('products') }}" + "?sort_by=" + nameSort;
            window.history.pushState("", "", url);
            // GENNARAL
            filterMergeSort.forEach((item, index) => { // Vì là sort by radio nên phải xóa các radio có selected trc r mới thêm cái mới vào
                if (item.id == 6 || item.id == 7 || item.id == 8 || item.id == 9) {
                    filterMergeSort.splice(index, 1);
                }
            });
            var idMerge = event.target.getAttribute('data-id-merge');
            filterMergeSort.push({
                id: idMerge,
                name: nameSort,
                category: 'sort'
            });
            urlMerge = checkMerge(filterMergeSort);
            window.history.pushState("", "", urlMerge);
            localStorage.setItem('FILTER_MERGE_SORT', JSON.stringify(filterMergeSort));
            getProductsMePost(window.location.href);
        });
        //FILTER CHECKBOX
        var count = 1;
        var url = "";
        var params = "";
        var data_field = "";
        var data_checkbox_id = "";
        var length = filter.length;
        $j(document).on('click', '.itemcheckbox', function(event) {
            $j(this).toggleClass('active');
            var isTrue = $j(this).hasClass('active');
            if (isTrue) {
                data_field = $j(this).attr('data-field');
                data_checkbox_id = $j(this).attr('data-id');
                if (count == 1 && length == 0) {
                    filter.push({
                        id: data_checkbox_id,
                        name: data_field
                    })
                    localStorage.setItem('FILTER', JSON.stringify(filter));
                    url = "{{ route('products') }}" + "?filter=" + data_field;
                } else {
                    filter.push({
                        id: data_checkbox_id,
                        name: data_field
                    })
                    length = filter.length;
                    localStorage.setItem('FILTER', JSON.stringify(filter));
                    for (var i = 0; i < length; i++) {
                        if (i == 0) {
                            params = `${filter[i].name}`
                        } else {
                            params += `&${filter[i].name}`
                        }
                    }
                    url = window.location.origin + window.location.pathname + "?filter=" + params;
                }
                count++;
                window.history.pushState("", "", url);

                // GENNARAL
                data_id_merge = $j(this).attr('data-id-merge');
                filterMergeSort.push({
                    id: data_id_merge,
                    name: data_field,
                    category: 'filter'
                });
                var urlMerge = checkMerge(filterMergeSort);
                if(urlMerge != undefined) {
                    window.history.pushState("", "", urlMerge);
                }
                localStorage.setItem('FILTER_MERGE_SORT', JSON.stringify(filterMergeSort));
                // END GENERAL
            } else {
                data_field = $j(this).attr('data-field');
                data_checkbox_id = $j(this).attr('data-id');
                filter.forEach((item, index) => {
                    if (data_checkbox_id == item.id) {
                        filter.splice(index, 1);
                        localStorage.setItem('FILTER', JSON.stringify(filter));
                    }
                })
                var lengthFilter = filter.length;
                params = "";
                for (var i = 0; i < lengthFilter; i++) {
                    if (i == 0) {
                        params = `${filter[i].name}`
                    } else {
                        params += `&${filter[i].name}`
                    }
                }
                var urlCurrent = window.location.href;
                url = window.location.origin + window.location.pathname + "?filter=" + params;
                if (length == 0) {
                    url = window.location.origin + window.location.pathname;
                }
                window.history.pushState("", "", url);
                // GENERAL
                filterMergeSort.forEach((item, index) => {
                    if (data_checkbox_id == item.id) {
                        filterMergeSort.splice(index, 1);
                    }
                })
                var urlMerge = checkMerge(filterMergeSort);
                if(filterMergeSort.length == 1) {
                    if(urlCurrent.includes('sort_by=')) {
                        urlMerge = window.location.origin + window.location.pathname + "?sort_by=" + filterMergeSort[0].name;
                    } else {
                        urlMerge = url;
                    }
                } 
                if(filterMergeSort.length == 0) {
                    urlMerge = window.location.origin + window.location.pathname;
                }
                window.history.pushState("", "", urlMerge);
                localStorage.setItem('FILTER_MERGE_SORT', JSON.stringify(filterMergeSort));
            }
            getProductsMePost(window.location.href);
        });
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
                // console.log(response);
            }
        });
    }

    function checkMerge(array) {
        var urlMerge = "";
        var checkUrlMerge = "";
        // Kiểm tra nếu có cả sort và filter thì mới đổi url ?filter={...}&sort_by={...} hoặc ?sort_by={...}&filter={...} 
        // Nếu không có thì ?filter=abc&&abc với abc là range price
        for (var i = 0; i < array.length; i++) {
            if (i == 0) { // Sắp xếp hay lọc lần đầu thì hostname + path + (?sort_by hoặc ?filter) (*)
                if (array[i].id == 6 || array[i].id == 7 || array[i].id == 8 || array[i].id == 9) {
                    urlMerge = window.location.origin + window.location.pathname + "?sort_by=" + array[i].name;
                } else {
                    urlMerge = window.location.origin + window.location.pathname + "?filter=" + array[i].name;
                }
            } else { // Tiếp theo của (*) là: nếu ?sort_by thì &filter và ngược lại
                if (urlMerge.includes('?sort_by=')) {
                    if (i == 1) {
                        urlMerge += `&filter=${array[i].name}`;
                    } else {
                        urlMerge += `&${array[i].name}`;
                    }
                }
                if (urlMerge.includes('?filter=')) {
                    if (array[i].id == 6 || array[i].id == 7 || array[i].id == 8 || array[i].id == 9) {
                        urlMerge += `&sort_by=${array[i].name}`;
                    } else {
                        urlMerge += `&${array[i].name}`;
                    }
                }
            }
        }
        array.forEach(item => {
            if (item.category == 'sort') {
                if (!checkUrlMerge.includes('sort_by')) {
                    checkUrlMerge += 'sort_by';
                }
            } else if (item.category == 'filter') {
                if (!checkUrlMerge.includes('filter')) {
                    checkUrlMerge += 'filter';
                }
            }
        })
        if (checkUrlMerge.includes('sort_by') && checkUrlMerge.includes('filter')) {
            return urlMerge;
        }
    }
</script>
@endpush