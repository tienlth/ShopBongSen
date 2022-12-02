@extends('layouts.account')
@section('title', 'Thống kê doanh thu')

@section('content')
<div class="account-staff-turnover-page">
    @include('components.account-staff-function-filter', ['routeName'=>'account-staff-turnover.index'])

    <div class="account-function py-3 row m-0">
        <div class="col row ps-0">
            <div class="col"><b>Số đơn hàng</b></div>
            <div class="col text-end pe-4">{{count($orders)}}</div>
        </div>
        <div class="col row pe-0">
            <div class="col ps-4"><b>Tổng cộng</b></div>
            <div class="col text-end price-convert">{{$totalValue}}</div>
        </div> 
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    <div class="list">
        @foreach($orders as $order)
        @include('components.short-order-item',[
            'id'=>$order->id,
            'date'=>$order->created_at,
            'customer'=>$order->customer->name,
            'total'=>$order->total
        ])
        @endforeach
        @if(count($orders)==0) <h6 class="text-center mt-4" style="color: rgb(152, 152, 152)">Không tìm thấy đơn hàng</h6> @endif
    </div>
</div>
@endsection




