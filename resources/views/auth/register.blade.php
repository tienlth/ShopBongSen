@extends('layouts.user')
@section('title', 'Đăng Ký')

<?php
    $_SESSION['header']='transparent';
?>

@section('content')
    <div class="top-bg d-flex justify-content-center align-items-center text-center" style="background-image: url('/imgs/share/top-bg1.png')">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="log-form">
            <h5 class="mb-3">Đăng ký tài khoản</h5>
            <hr style="margin: 0 -32px">
            
            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="username" placeholder="Tên tài khoản" class="form-control" id="username" value="">
                        @include('components.error-mess', ['field'=>'username'])
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="password" placeholder="Mật khẩu" class="form-control" id="password" value="">
                        @include('components.error-mess', ['field'=>'password'])
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" class="form-control" id="password" value="">
                        @include('components.error-mess', ['field'=>'password_confirmation'])
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Bạn đã có tài khoản? <a href={{route('login')}} style="color: #FF5353;">Đăng nhập</a></span>
                    <button class="text-white" type="submit" 
                    style="border: none; border-radius:4px; background-color: #ff8383; 
                    box-shadow: 2px 2px 4px #ccc; padding: 8px 32px;">
                        Đăng Ký
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection



   
        
    