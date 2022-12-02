@extends('layouts.account')
@section('title', 'Thêm sự kiện')

@section('content')
<div class="account-user-add-receiver-page">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="m-0">Thêm sự kiện</h5>
        <h5 style="color: #FB8A8A;">Nguyễn Văn A <span>(bạn bè)</span></h5>
    </div>
    <hr style="margin: 24px -32px">
    <form action="">
        <div class="col-12 mb-3">
            <div class="row mb-3">
                <div class="col row">
                    <label for="" class="col-sm-2 pe-0 col-form-label">Sự kiện:</label>
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="Default select example">
                            <option>--Quan hệ--</option>
                            <option selected value="1">Sinh nhật</option>
                            <option value="2">Kỉ niệm ...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col row">
                    <label for="" class="col-sm-2 pe-0 col-form-label">Thời gian:</label>
                    <div class="col-sm-6">
                        @include('components.datepicker')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Ghi chú</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button class="text-white" type="submit" style="border: none; border-radius:4px; background-color: #ff8383; 
                box-shadow: 2px 2px 4px #ccc; padding: 8px 32px;">
                Thêm
            </button>
        </div>
    </form>
</div>
@endsection




