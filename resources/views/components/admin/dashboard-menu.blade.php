<?php
    $path=url()->full();
?>

<div class="dashboard-menu component pt-3">
    <ul class="list-group p-0">
        <li class=@if(strpos($path, '/dashboard-home')){{"active"}}@endif><a href={{route('dashboard-home.index')}}><i class="fa-solid fa-house me-3"></i>Bảng điều khiển</a></li>
        <li class=@if(strpos($path, '/ware') != false){{"active"}}@endif><a class="" data-bs-toggle="collapse" data-bs-target="#list1" href=""><i class="fa-solid fa-warehouse me-3"></i><span style="display: inline-block; min-width: 86px;">Quản lý kho</span><i class="fa-solid fa-angle-down ms-3"></i></a></li>
        <li id="list1" class="collapse @if(strpos($path, '/ware') != false){{'show'}}@endif">
            <ul class="ps-0">
                <hr class="my-2">
                <li class='ps-1 w-100 @if(strpos($path, '/dashboard-inventories')){{"active"}}@endif'><a href={{route('dashboard-inventories.index')}}>Quản lý tồn kho</a></li>
                <li class='ps-1 w-100 @if(strpos($path, '/dashboard-imports')){{"active"}}@endif'><a href={{route('dashboard-imports.index')}}>Quản lý nhập hàng</a></li>
                <li class='ps-1 w-100 @if(strpos($path, '/dashboard-ingredients')){{"active"}}@endif'><a href={{route('dashboard-ingredients.index')}}>Quản lý nguyên liệu</a></li>
                <li class='ps-1 w-100 @if(strpos($path, '/dashboard-suppliers')){{"active"}}@endif'><a href={{route('dashboard-suppliers.index')}}>Quản lý nhà cung cấp</a></li>
                <hr class="my-2">
            </ul>
        </li>
        <li class=@if(strpos($path, '/dashboard-staffs')){{"active"}}@endif><a href={{route('dashboard-staffs.index')}}><i class="fa-solid fa-user-tie me-3"></i></i>Quản lý nhân viên</a></li>
        <li class=@if(strpos($path, '/dashboard-products')){{"active"}}@endif><a href={{route('dashboard-products.index')}}><i class="fa-solid fa-boxes-stacked me-3"></i></i>Quản lý sản phẩm</a></li>
        <li class=@if(strpos($path, '/statistic') != false){{"active"}}@endif><a class="" data-bs-toggle="collapse" data-bs-target="#list2" href=""><i class="fa-solid fa-table me-3"></i><span style="display: inline-block; min-width: 86px;">Thống kê</span><i class="fa-solid fa-angle-down ms-3"></i></a></li>
        <li id="list2" class="collapse @if(strpos($path, '/statistic') != false){{'show'}}@endif">
            <ul class="ps-0">
                <hr class="my-2">
                <li class='ps-1 w-100 @if(strpos($path, '/dashboard-orders')){{"active"}}@endif'><a href={{route('dashboard-orders.index')}}>Thống kê đơn hàng</a></li>
                <li class='ps-1 w-100 @if(strpos($path, '/dashboard-feedbacks')){{"active"}}@endif'><a href={{route('dashboard-feedbacks.index')}}>Thống kê góp ý</a></li>
                <hr class="mt-2">
            </ul>
        </li>
    </ul>
</div>
