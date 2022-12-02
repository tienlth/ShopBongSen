@extends('layouts.account')
@section('title', 'Thống kê đơn hàng')

@section('content')
<div class="account-staff-orders-page">
    @include('components.account-staff-function-filter', ['routeName'=>'account-staff-orders.index'])

    <div class="account-function py-3 row m-0">
        <div class="col ps-0"><b>Số đơn hàng</b></div>
        <div class="col text-end pe-0">{{count($orders)}}</div>
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    <div class="list">
        @foreach($orders as $order)
        @include('components.user-order-item', [
            'date'=>$order->created_at,
            'total'=>$order->total,
            'owner'=>$order->customer->name,
            'reciver'=>$order->receiver_name,
            'status'=>$order->status_id,
            'address'=>$order->receiver_address,
            'id'=>$order->id
        ])
        @endforeach
        @if(count($orders)==0) <h6 class="text-center mt-4" style="color: rgb(152, 152, 152)">Không tìm thấy đơn hàng</h6> @endif
    </div>
</div>
@endsection




