@extends('layouts.account')
@section('title', 'Thông tin tài khoản')

@section('content')
<div class="account-staff-info-page">
    <form action={{route('staff-info-update',['id'=>$staff->id])}} method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-2">
                <div class="staff-avt-contain position-relative">
                    <div class="staff-avt w-100 h-100" style="background-image: url('/imgs/staffs/avts/{{$staff->avatar}}');"></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Họ tên (*)</label>
            <div class="col-sm-10">
                <input disabled type="text" name="name" class="form-control" id="name" value="{{$staff->name}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Điện thoại (*)</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone" value="{{$staff->phone}}">
                @include('components.error-mess', ['field'=>'phone'])
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" value="{{$staff->email}}">
                @include('components.error-mess', ['field'=>'email'])
            </div>
        </div> 
        <div class="row mb-3">
            <label for="hometown" class="col-sm-2 col-form-label">Quê quán (*)</label>
            <div class="col-sm-10">
                <input type="text" name="hometown" class="form-control" id="hometown" value="{{$staff->hometown}}">
                @include('components.error-mess', ['field'=>'hometown'])
            </div>
        </div> 
        <div class="row mb-3">
            <label for="address" class="col-sm-2 col-form-label">Địa chỉ (*)</label>
            <div class="col-sm-10">
                <input type="text" name="address" class="form-control" id="address" value="{{$staff->address}}">
                @include('components.error-mess', ['field'=>'address'])
            </div>
        </div> 
        <div class="row mb-3 receive-day">
            <label for="day" class="col-sm-2 col-form-label">Ngày sinh (*)</label>
            <div class="col-sm-10 row">
                <div class="col-6">
                    @include('components.datepicker',['date'=>$staff->birthday, 'name'=>'birthday', 'required'=>true])
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="gender" class="col-sm-2 col-form-label">Giới tính (*)</label>
            <div class="col-sm-10 d-flex">
                <div class="me-4 form-check d-flex align-items-center">
                    <input class="form-check-input" @if($staff->gender!=1) disabled @endif type="radio"  name="gender" id="flexRadioDefault1" @if($staff->gender==1) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Nam
                    </label>
                </div>
                <div class="ms-4 form-check d-flex align-items-center">
                    <input class="form-check-input" @if($staff->gender==1) disabled @endif type="radio" name="gender" id="flexRadioDefault2" @if($staff->gender!=1) checked @endif>
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




