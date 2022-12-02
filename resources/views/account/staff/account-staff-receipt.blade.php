@extends('layouts.account')
@section('title', 'Thông tin hóa đơn')

@section('content')
<div class="account-staff-receipt-page">
    <div class="row mb-3">
        <div class="col-sm-10">
            <h5>Thông tin hóa đơn</h5>
        </div>
        <div class="col-sm-2 px-4">
            Chưa gửi
        </div>
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    <div style="color: rgb(74, 74, 74);">
        <div class="row mb-3">
            <div class="col-4"><b>Người lập:</b></div>
            <div class="col-8">Nguyễn Văn A</div>
        </div>
        <div class="row mb-3">
            <div class="col-4"><b>Thời gian:</b></div>
            <div class="col-8">9/10/2022</div>
        </div>
        <div class="row mb-3">
            <div class="col-4"><b>Người nhận:</b></div>
            <div class="col-8">Nguyễn Văn F</div>
        </div>
        <div class="row mb-3">
            <div class="col-4"><b>Địa chỉ:</b></div>
            <div class="col-8">3/2, Xuân Khánh, Ninh Kiều, TP. Cần Thơ</div>
        </div>
    </div>

    <hr class="my-4">

    <div class="product-list mb-4">
        @for($i=0; $i<3; $i++)
        <div class="row mb-3">
            <div class="col"><b>Good mood</b></div>
            <div class="col">2</div>
            <div class="col">400.000đ</div>
        </div>
        @endfor
    </div>

    <div class="row mb-3">
        <div class="col-4"><b>Tổng cộng</b></div>
        <div class="col-8">1.000.000đ</div>
    </div>

    <hr class="my-4">

    <div class="row mb-3">
        <div class="col-4"><b>Tên công ty</b></div>
        <div class="col-8">Công ty abc</div>
    </div>
    <div class="row mb-3">
        <div class="col-4"><b>Mã số thuế</b></div>
        <div class="col-8">12345678</div>
    </div>
    <div class="row mb-3">
        <div class="col-4"><b>Email công ty</b></div>
        <div class="col-8">abc@gmail.com</div>
    </div>
    <div class="row mb-3">
        <div class="col-4"><b>Địa chỉ công ty</b></div>
        <div class="col-8">3/2, Xuân Khánh, Ninh Kiều, TP. Cần Thơ</div>
    </div>
    <div class="row mb-3">
        <div class="col-4"><b>Email nhận</b></div>
        <div class="col-8">nguyenvanf@gmail.com</div>
    </div>

    <button type="button" class="submit-btn mt-3 text-white py-2 w-100" 
    style="background-color: #2CC1C9; border: none; border-radius: 6px; box-shadow: 2px 2px 2px #ccc">
        Yêu cầu xuất hóa đơn
    </button>

</div>
@endsection




