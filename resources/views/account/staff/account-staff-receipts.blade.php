@extends('layouts.account')
@section('title', 'Thống kê hóa đơn')

@section('content')
<div class="account-staff-receipts-page">
    <div class="row mb-3">
        <div class="col-sm-11">
            <input type="text" placeholder="Nhập mã đơn hàng" class="form-control" id="name" value="">
        </div>
        <div class="col-sm-1 px-4 d-flex align-items-center">
            <a href="#" class="d-block text-black">
                <div for="name"><h5><i class="fa-solid fa-magnifying-glass"></i></h5></div>
            </a>
        </div>
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    @include('components.account-staff-function-filter')

    <div class="account-function py-3 row m-0">
        <div class="col ps-0"><b>Số yêu cầu hóa đơn</b></div>
        <div class="col text-end pe-0">50</div>
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    <div class="list">
        @for($i=0;$i<6;$i++)
        @include('components.short-order-item',[
            'id'=>1232,
            'date'=>'10/10/2022',
            'customer'=>'Nguyễn Văn A',
        ])
        @endfor
    </div>
</div>
@endsection




