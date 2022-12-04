@extends('admin.masterlayouts')
@section('active.dashboard', 'active')
@section('content')
<div class="container-fluid">
    <div class="header-table">
        <div class="box-titleList box-titleDashboard">
            <i class="fa-solid fa-house"></i>
            <p class="titleList">Trang tổng quát</p>
        </div>
    </div>
    <div class="box-statistical mt-4">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu tháng này</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($revenue['monthly'], 0, ",", ".") }} VNĐ</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Khách hàng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCustomer }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sản phẩm</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProduct }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="mdi mdi-bookmark-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đơn hàng chưa duyệt</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOUnapp }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="mdi mdi-lead-pencil fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu năm nay</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($revenue['yearly'], 0, ",", ".") }} VNĐ</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-sack-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nhân viên</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStaff }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tin tức</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalNews }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="mdi mdi-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng số đơn hàng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrder }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="mdi mdi-table-large menu-icon fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-table">
        <div class="box-titleList box-titleChart">
            <i class="mdi mdi-chart-line"></i>
            <p class="titleList">Biểu đồ</p>
        </div>
    </div>
    <div class="box-statistical mt-4">
        <canvas id="line-chart"></canvas>
    </div>
</div>
@endsection