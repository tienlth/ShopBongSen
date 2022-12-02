@extends('layouts.account')
@section('title', 'Kiểm duyệt đánh giá')

@section('content')
<div class="account-staff-evaluation-page">
    <div class="row mb-3">
        <div class="col-sm-11">
            <input type="text" placeholder="Nhập mã sản phẩm" class="form-control" id="name" value="">
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
        <div class="col row ps-0">
            <div class="col"><b>Sản phẩm</b></div>
            <div class="col text-end pe-4">Trong xanh</div>
        </div>
        <div class="col row pe-0">
            <div class="col ps-4"><b>Số đánh giá</b></div>
            <div class="col text-end">20</div>
        </div>
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    <div class="list">
        @for($i=0;$i<6;$i++)
        @include('components.short-comment',[
            'id'=>$i,
            'name'=>'Anh Nguyễn Văn A',
            'date'=>'26-09-2022',
            'stars'=>4,
            'comment'=>'Shop giao hàng nhanh, hoa đẹp rất hài lòng'
        ])
        @endfor
    </div>
</div>     
@endsection




