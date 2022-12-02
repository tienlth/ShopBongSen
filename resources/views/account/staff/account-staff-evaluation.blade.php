@extends('layouts.account')
@section('title', 'Chi tiết đánh giá')

@section('content')
<div class="account-staff-evaluation-page">
    <div class="row mb-3">
        <div class="col-sm-11">
            <h5>Chi tiết đánh giá</h5>
        </div>
    </div>

    <hr style="margin-left: -32px; margin-right: -32px;">

    @include('components.product-comment',[
        'name'=>'Anh Nguyễn Văn B',
        'date'=>'22-10-2022',
        'stars'=>4,
        'imgLinks'=>['product1.png', 'product3.png'],
        'colorComment'=>'Đúng với mô tả',
        'styleComment'=>'Đúng với mô tả',
        'dimensionComment'=>'Đúng với mô tả',
        'comment'=>'Shop giao chậm, hoa đẹp rất hài lòng'
    ])

    <div class="form-check my-3">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
            data-bs-toggle="collapse" data-bs-target="#receiver-info">
        <label class="form-check-label" for="flexCheckDefault">Khóa đánh giá</label>
    </div>

    <div class="form-check my-3 form-switch">
        <input class="form-check-input" type="checkbox" role="switch" data-bs-toggle="collapse" data-bs-target="#response">
        <label class="form-check-label" for="receiver-type">phản hồi</label>
    </div>

    <div id="response" class="collapse">
        <h6>Phản hồi đánh giá</h6>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Nội dung phản hồi</label>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="text-white mt-3" type="submit" 
        style="border: none; border-radius:4px; background-color: #ff8383; 
        box-shadow: 2px 2px 4px #ccc; padding: 8px 32px;">
            Lưu
        </button>
    </div>

</div>     
@endsection




