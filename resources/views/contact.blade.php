@extends('layouts.user')
@section('title', 'Liên hệ')

<?php
    $_SESSION['header']='transparent';
?>

@section('content')
<div class="contact-page">
    @include('components.breadcrumb',[
        'pages'=>[
            ['name'=>'Trang chủ',
                'link'=>route('index')]
        ],
        'currentPage'=>'Liên hệ'
    ])
    
    <div class="top-bg d-flex justify-content-center align-items-center text-center" style="background-image: url('/imgs/share/top-bg2.png')">
        <div class="contact-info">
            <h3 class="pink mb-3">Shop hoa tươi Bông Sen</h3>
            <h4 class="blue mb-3">116A, 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP. Cần Thơ</h4>
            <h5 class="mb-3 px-4">Mở cửa từ <span class="pink">6h00</span> đến <span class="pink">23h00</span> các ngày trong tuần kể cả chủ nhật, ngày lễ</h5>
            <div class="info">
                <div>
                    <h5><span>Hot line: </span><span class="pink">0834603541</span></h5>
                </div>
                <div class="d-flex">
                    <h5>Zalo: </h5>
                    <img class="ml-3" src="/imgs/share/qrcode.png" width="80" height="70" alt="">
                </div>
            </div>
            <div class="social-network blue mt-4">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </div>

    <div class="contact-form d-flex align-items-center">
        <h4>Đóng góp ý kiến</h4>
        <form action="" method="POST">
            @csrf
            <div class="mb-4 row">
                <label for="" class="col-sm-2 col-form-label">Họ tên</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" id="">
                    @include('components.error-mess', ['field'=>'name'])
                </div>
            </div>
            <div class="mb-4 row">
                <label for="" class="col-sm-2 col-form-label">Điện thoại</label>
                <div class="col-sm-10">
                    <input name="phone" type="text" class="form-control" id="">
                    @include('components.error-mess', ['field'=>'phone'])
                </div>
            </div>
            <div class="mb-4 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" type="text" class="form-control" id="email">
                    @include('components.error-mess', ['field'=>'email'])
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-2 col-form-label">Góp ý về</label>
                <div class="col-sm-10">
                    <select name="problem" class="form-select" aria-label="Default select example">
                        @foreach($problems as $problem)
                        <option value={{$problem->id}}>{{$problem->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" id="" rows="6"></textarea>
                @include('components.error-mess', ['field'=>'content'])
            </div>
            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn text-white">Gửi</button>
            </div>
        </form>
    </div>

    <div class="map">
        <iframe class="w-100 d-block" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8948.244131601972!2d105.7745152391588!3d10.029782414913448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1668589095206!5m2!1svi!2s" width="600" height="450" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
</div>
@endsection




