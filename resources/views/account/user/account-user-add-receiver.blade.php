@extends('layouts.account')
@section('title', 'Thêm người nhận')

@section('content')
<div class="account-user-add-receiver-page">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="m-0">Thêm người nhận</h5>
    </div>
    <hr style="margin: 24px -32px">
    <form action="">
        <div class="row mb-3">
            <div class="col row">
                <label for="name" class="col-sm-4 col-form-label">Họ tên (*)</label>
                <div class="col-sm-8 ps-3">
                    <input type="text" class="form-control" id="name" value="">
                </div>
            </div>
            <div class="col">
                <div class="col row">
                    <label for="name" class="col-sm-4 col-form-label text-end pe-4">Quan hệ (*)</label>
                    <div class="col-sm-8 ps-3">
                        <select class="form-select" aria-label="Default select example">
                            <option>--Quan hệ--</option>
                            <option value="1">Bạn bè</option>
                            <option selected value="2">Người thân</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Điện thoại (*)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="col-sm-2 col-form-label">Địa chỉ (*)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" value="">
            </div>
        </div> 
        <div class="row mb-3 receive-day">
            <label for="day" class="col-sm-2 col-form-label">Ngày sinh (*)</label>
            <div class="col-sm-10 row">
                <div class="col-6">
                    @include('components.datepicker')
                </div>
            </div>
        </div>
        
        <button class="text-white" type="submit" 
        style="border: none; border-radius:4px; background-color: #ff8383; 
        box-shadow: 2px 2px 4px #ccc; padding: 8px 32px;">
            Thêm
        </button>
    </form>
</div>
@endsection




