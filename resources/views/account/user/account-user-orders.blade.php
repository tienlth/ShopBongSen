@extends('layouts.account')
@section('title', 'Đơn hàng đã đặt')

@section('content')
<div class="account-user-cart-page">
    <div class="row mb-3">
        <form action="" class="d-flex my-3" role="search">
            <div class="col-sm-11">
                <input class="form-control" name="search" type="search" placeholder="Nhập mã đơn hàng" aria-label="Search">
            </div>
            <div class="col-sm-1 px-4 d-flex align-items-center">
                <a href="#" class="d-block text-black">
                    <button type="submit" style="border: none; background-color: unset;" for="name"><h5><i class="fa-solid fa-magnifying-glass"></i></h5></button>
                </a>
            </div>
        </form>
    </div>
    <hr style="margin: 24px -32px">
    <h5 class=" mb-3">Đơn hàng đã đặt</h5>

    <div class="order-list mb-3">
        @foreach($orders as $order)
        @include('components.user-order-item', [
            'date'=>$order->created_at,
            'total'=>$order->total,
            'reciver'=>$order->receiver_name,
            'status'=>$order->status_id,
            'address'=>$order->receiver_address,
            'id'=>$order->id
        ])
        @endforeach
    </div>
    @if(count($orders)==0) <h6 class="text-center mt-4" style="color: rgb(152, 152, 152)">Không tìm thấy đơn hàng</h6> @endif
</div>
@endsection




