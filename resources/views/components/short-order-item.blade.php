<div class="account-function mb-3">
    <div class="row d-flex align-items-center" style="color: #ff7474;">
        <div class="col-2 ps-0">
            <div class="row d-block text-center text-secondary">Mã đơn hàng:</div>
            <div class="row d-block text-center">{{$id}}</div>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
            <div class="row"><div class="col-4 pe-0"><span class="text-secondary">Thời gian: </span></div>
            <div class="col-7 ps-0"><span>{{$date}}</span></div></div>
            <div class="row"><div class="col-4 pe-0"><span class="text-secondary">Người đặt: </span></div>
            <div class="col-7 ps-0"><span>{{$customer}}</span></div></div>
        </div>
        <div class="col-4 ">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-4 pe-0"><span class="text-secondary">Tổng cộng: </span></div>
                <div class="col-5">
                    <span class="price-convert">
                    @if(isset($total)){{$total}}
                    @else
                    <a href={{route('account.staff.receipt',['id'=>$id])}} style="color: #3f4fdd; text-decoration: underline;">Xem chi tiết</a>
                    @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>