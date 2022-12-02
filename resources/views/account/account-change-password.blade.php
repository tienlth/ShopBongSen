@extends('layouts.user')
@section('title', 'Đổi mật khẩu')

<?php
    $_SESSION['header']='transparent';
?>

@section('content')
    <div class="top-bg d-flex justify-content-center align-items-center text-center" style="background-image: url('/imgs/share/top-bg1.png')">
        <div class="log-form">
            <h5 class="mb-3">Đổi mật khẩu</h5>
            <hr style="margin: 0 -32px">
            
            <form method="POST" action="{{ route('account.changepassword') }}" class="mt-4">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="oldpassword" placeholder="Mật khẩu cũ" class="form-control" value="">
                        @include('components.error-mess', ['field'=>'oldpassword'])
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="password" placeholder="Mật khẩu mới" class="form-control" value="">
                        @include('components.error-mess', ['field'=>'password'])
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="password_confirmation" placeholder="Xác nhận" class="form-control" value="">
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <button class="text-white" type="submit" 
                    style="border: none; border-radius:4px; background-color: #ff8383; 
                    box-shadow: 2px 2px 4px #ccc; padding: 8px 32px;">
                        Đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection



   
        
    