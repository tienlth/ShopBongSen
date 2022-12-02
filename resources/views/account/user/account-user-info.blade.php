@extends('layouts.account')
@section('title', 'Thông tin tài khoản')

@section('content')
<div class="account-user-info-page">
    <form action={{route('account-user-info.store')}} method="POST">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Họ tên (*)</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="name" value="{{$customer->name}}">
                @include('components.error-mess', ['field'=>'name'])
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Điện thoại (*)</label>
            <div class="col-sm-10">
                <input name="phone" type="text" class="form-control" id="phone" value="{{$customer->phone}}">
                @include('components.error-mess', ['field'=>'phone'])
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="text" class="form-control" id="email" value="{{$customer->email}}">
                @include('components.error-mess', ['field'=>'email'])
            </div>
        </div> 
        <div class="row mb-3">
            <label for="address" class="col-sm-2 col-form-label">Địa chỉ (*)</label>
            <div class="col-sm-10">
                <input name="address" type="text" class="form-control" id="address" value="{{$customer->address}}">
                @include('components.error-mess', ['field'=>'address'])
            </div>
        </div> 
        <div class="row mb-3 receive-day">
            <label for="day" class="col-sm-2 col-form-label">Ngày sinh (*)</label>
            <div class="col-sm-10 row">
                <div class="col-6">
                    @include('components.datepicker', ['date'=>$customer->birthday, 'name'=>'birthday', 'required'=>true])
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="gender" class="col-sm-2 col-form-label">Giới tính (*)</label>
            <div class="col-sm-10 d-flex">
                <div class="me-4 form-check d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" @if($customer->gender==1) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Nam
                    </label>
                </div>
                <div class="ms-4 form-check d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" @if($customer->gender==0) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Nữ
                    </label>
                </div>
            </div>
        </div>
        <button class="text-white" type="submit" 
        style="border: none; border-radius:4px; background-color: #ff8383; 
        box-shadow: 2px 2px 4px #ccc; padding: 8px 32px;">
            Lưu
        </button>
    </form>
</div>
@endsection




