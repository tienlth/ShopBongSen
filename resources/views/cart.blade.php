@extends('layouts.user')
@section('title', 'Giỏ hàng')

<?php
    $role = Request::get('role');
?>

@section('content')
<div class="cart-page">
    @include('components.breadcrumb',[
    'pages'=>[
    ['name'=>'Trang chủ',
    'link'=>route('index')]
    ],
    'currentPage'=> isset($ordered)?'Đơn hàng':'Giỏ hàng'
    ])

    <div class="content">
        <div class="title">
            @if(isset($ordered))
            <div class="row">
                <div class="col"><h5>Thông tin đơn hàng</h5></div>
                <div class="col">Mã đơn hàng:<span class="ms-3" style="color: #FF8080;">{{$order->id}}</span></div>
                <div class="col-4">Thời gian đặt hàng:<span class="ms-3" style="color: #FF8080;">{{$order->created_at}}</span></div>
                <div class="col ms-4 ps-4 d-flex">
                    <span class="me-3">Trạng thái:</span>
                    @include('components.order-status', ['status'=>$order->status_id])
                </div>
            </div>
            @else
            <h5>Thông tin giỏ hàng</h5>
            @endif
        </div>
        <form action={{route('home-orders.store')}} method="post">
            @csrf
            <div class="cart-info row mb-3">
                <div class="col-7 cart-list cart-form p-0">
                    @if(count(session('cart'))==0)
                        <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                            <img class="d-block w-50 h-50" src="/imgs/share/nocart.png" alt="nocart">
                            <h4 style="color: #ccc">Giỏ hàng trống</h4>
                        </div>
                        @else
                        <hr class="mb-0" style="margin: 16px -12px">
                        <div class="list" @if(isset($ordered)) style="height: 400px;" @endif>
                            @if(!isset($ordered))<input style="display: none" type="text" name="customer_id" value="{{$customer->id}}">@endif
                            @foreach(session('cart') as $prd)
                                <input style="display: none" type="number" name="product_id[]" value="{{$prd['info']['id']}}">
                                    @include('components.product-cart-item', [ 'imgLink'=>
                                    '/imgs/products/' . $prd["info"]->main_image,
                                    'name'=>$prd["info"]->name,
                                    'price'=>(round($prd["info"]->price - $prd["info"]->price*$prd["info"]->sale/100)),
                                    'quantity'=>$prd['quantity'],
                                    'total'=>$prd['total']
                                    ])
                            @endforeach
                        </div>
                        <hr class="mt-0" style="margin: 16px -12px">
                        @if(!isset($ordered))<button class="submit-btn mt-3 cart-save-btn" type="submit">Lưu lại</button>@endif
                    @endif
                </div>
                <div class="col-5 pt-3">
                    <div class="total-info ms-2">
                        <div><b>Tổng số lượng </b><span>{{$totalNum}}</span></div>
                        <div><b>Tạm tính </b><span class="price-convert">{{$totalPrice}}</span></div>
                        <div><b>Phí giao hàng</b><span class="price-convert">0</span></div>
                        <div><b>Giảm giá</b><span class="price-convert">0</span></div>
                        <div class="mb-4"><b>Phụ phí</b><span class="price-convert">0</span></div>
                        <hr>
                        <div class="mt-4"><b>Tổng cộng</b><span class="price-convert">{{$totalPrice}}</span></div>
                    </div>
                </div>
            </div>

            <div class="title mb-3">
                <h5>Thông tin giao hàng</h5>
            </div>
            <div class="cart-form-container">
                <div class="title d-flex">
                    <h5 class="m-0 me-3">Thông tin người mua</h5><span>(thông tin của tài khoản)</span>
                </div>
                <div class="cart-form">
                        <div class="customer">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Họ tên:</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control" id="name" value="{{$customer->name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label">Điện thoại:</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control" id="phone" value="{{$customer->phone}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control" id="email" value="{{$customer->email}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Địa chỉ:</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control" id="address" value="{{$customer->address}}">
                                </div>
                            </div>
                        </div>

                        <div class="receiver mt-4">
                            <div id="receiver-info" class="">
                                <div class="title">
                                    <h5 class="m-0 me-3">Thông tin người nhận</h5>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Họ tên:</label>
                                    <div class="col-sm-10">
                                        <input type="text" @if(isset($ordered)) disabled @endif name="receiver_name" class="form-control" id="name" value='@if(!isset($ordered)){{$customer->name}}@else{{$order->receiver_name}}@endif'>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone" class="col-sm-2 col-form-label">Điện thoại:</label>
                                    <div class="col-sm-10">
                                        <input type="text" @if(isset($ordered)) disabled @endif name="receiver_phone" class="form-control" id="phone" value="@if(!isset($ordered)){{$customer->phone}}@else{{$order->receiver_phone}}@endif">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Địa chỉ:</label>
                                    <div class="col-sm-10">
                                        <input type="text" @if(isset($ordered)) disabled @endif name="receiver_address" class="form-control" id="address" value="@if(!isset($ordered)){{$customer->address}}@else{{$order->receiver_address}}@endif">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 receive-day">
                            <label for="day" class="col-sm-2 col-form-label">Ngày nhận:</label>
                            <div class="col-sm-10 row">
                                <div class="col-4">
                                    @if(isset($ordered))
                                    @include('components.datepicker',['disabled'=>true,'date'=>$order->deliverytime])
                                    @else
                                    @include('components.datepicker', ['name'=>'deliverytime'])
                                    @endif
                                </div>

                                @if(isset($ordered))
                                @else
                                <div class="col-8 row ps-4 pe-0">
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--Phương thức thanh toán--</option>
                                            <option value="1">Thanh toán khi nhận hàng</option>
                                            <option value="2">Thanh toán qua thẻ ATM</option>
                                            <option value="3">Thanh toán qua ví MOMO</option>
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="mess mt-4 mb-3">
                            <div class="form-floating">
                                <textarea name="message" @if(isset($ordered)) disabled @endif class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">@if(isset($ordered)){{$order->message}}@endif</textarea>
                                <label for="floatingTextarea2">Thông điệp (thiệp gửi kèm)</label>
                            </div>

                            <div class="form-floating mt-4">
                                <textarea name="note" @if(isset($ordered)) disabled @endif class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">@if(isset($ordered)){{$order->note}}@endif</textarea>
                                <label for="floatingTextarea2">Ghi chú cho shop</label>
                            </div>
                        </div>

                        @if(!isset($ordered))<button class="submit-btn mt-3" type="submit">Đặt hàng</button>@endif
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
@push('script')
   <script>
        $('.minus').on('click',(evt)=>{
            input = $(evt.currentTarget).siblings('.quantity-value')
            if(input.val()>1)
                input.val(input.val()-1)
        })

        $('.flush').on('click',(evt)=>{
            input = $(evt.currentTarget).siblings('.quantity-value')
            input.val(input.val()-0+1)
        })

        $('.cart-save-btn').on('click',(evt)=>{
            evt.preventDefault()
            evt.stopPropagation()

            $('form').prop('action',"{{route('cart-update')}}").submit()
        })

        $('.delete-btn').on('click',(evt)=>{
            evt.preventDefault()
            evt.stopPropagation()

            var action = "{{route('cart-delete',['id'=>'id'])}}"
            action = action.replace('id', evt.currentTarget.id)
            $('form').prop('action', action)
            $('form').submit()
        })
   </script>
@endpush