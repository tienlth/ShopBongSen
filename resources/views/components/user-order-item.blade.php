<div class="user-order-item component px-3 py-2 row mx-0 mb-3">
    <div class="col-10">
        <div class="row mb-2">
            <div class="col"><label>Thời gian: </label><span>{{$date}}</span></div>
            <div class="col"><label>Tổng cộng: </label><span class="price-convert">{{$total}}</span></div>
        </div>
        <div class="row mb-2">
            @if(isset($owner))
            <div class="col"><label>Người đặt: </label><span>{{$owner}}</span></div>
            @else
            <div class="col"><label>Người nhận: </label><span>{{$reciver}}</span></div>
            @endif
            <div class="col d-flex">
                <label>Trạng thái: </label>
                @include('components.order-status')
            </div>
        </div>
        <div class="row">
            <div class="col"><label>Địa chỉ nhận:</label><span>{{$address}}</span></div>
        </div>
    </div>
    <div class="seemore col-2 d-flex justify-content-center align-items-center"><a href={{route('home-orders.show', ['home_order'=>$id])}}>Xem chi tiết</a></div>
</div>