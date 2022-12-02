@extends('layouts.user')
@section('title', 'Thiết kế sản phẩm')

@section('content')
<div class="design-form-page">
    @include('components.breadcrumb',[
        'pages'=>[
            ['name'=>'Trang chủ',
                'link'=>route('home')],
            ['name'=>'Sản phẩm',
            'link'=>route('products')]
        ],
        'currentPage'=>'Thiết kế sản phẩm'
    ])

    <div class="design-form-container">
        <div class="title"><h5 class="m-0">Thiết kế sản phẩm</h5></div>
        <div class="dash"></div>
        
        <div class="design-form">
            <form>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">*Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">*Màu sắc</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col row">
                        <label for="" class="col-sm-4 col-form-label">Chiều cao</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="">
                        </div>
                    </div>
            
                    <div class="col row d-flex justify-content-end">
                        <label for="" class="col-sm-4 col-form-label">Chiều rộng</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="">
                        </div>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <div class="col row">
                        <label for="" class="col-sm-4 col-form-label">Kiểu dáng</label>
                        <div class="col-sm-6">
                            <select class="form-select w-100">
                                <option selected>-- Kiểu dáng --</option>
                                <option value="1">Hoa giỏ</option>
                                <option value="2">Hoa bó</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="col row d-flex justify-content-end">
                        <label for="" class="col-sm-4 col-form-label">Hạn sử dụng</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Phân loại</label>
                    <div class="col-sm-6">
                        <select class="form-select w-100">
                            <option selected>-- Phân loại --</option>
                            <option value="1">Hoa sinh nhật</option>
                            <option value="2">Hoa khai trương</option>
                        </select>
                    </div>
        
                    <div class="col-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary w-75">Thêm phân loại</button>
                    </div>
                </div>

                <div class="tags d-flex mb-3">
                    @include("components.tag", ['tagContent'=>'Hoa sinh nhật'])
                    @include("components.tag", ['tagContent'=>'Hoa chúc mừng'])
                </div>

                <div class="flower-used-container mb-3">
                    <label class="mb-2" for="">*Sử dụng loại hoa</label>
                    <div class="flower-used">
                        <div class="function d-flex justify-content-end">
                            @include('components.function-btn', [
                            'borderColor' => '#64AAFF',
                            'content' => '+ Thêm loại hoa',
                            'color' => '#64AAFF'
                            ])
                        </div>
                        <div class="dash"></div>
                        <div class="list">
                            @include('components.flowerused-item')
                        </div>
                    </div>
                </div>

                <div class="note mt-4 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Ghi chú</label>
                    </div>
                </div>

                <div class="d-flex mt-4 justify-content-end">
                    <button type="submit" class="btn text-white">Xác nhận</button>
                </div>
            </form>
        </div>
        <div class="dash"></div>
        <div class="infomation-comfirm-container">
            <div class="title"><h5 class="m-0">Thông tin xác nhận từ shop</h5></div>
            <div class="infomation-comfirm">
                <div class="product-imgs row d-flex mb-2 ">
                    <div class="col-2"><h5>Ảnh sản phẩm</h5></div>
                    <div class="col-10 row d-flex justify-content-between">
                        <div class="col-3 px-4">
                            <div class="product-img">Chưa cập nhật</div>
                        </div>
                        <div class="col-3 px-4">
                            <div class="product-img">Chưa cập nhật</div>
                        </div>
                        <div class="col-3 px-4">
                            <div class="product-img">Chưa cập nhật</div>
                        </div>
                        <div class="col-3 px-4">
                            <div class="product-img">Chưa cập nhật</div>
                        </div>
                    </div>
                </div>
    
                <div class="price row mt-4 mb-4 d-flex align-items-center">
                    <div class="col-2"><h5>Giá sản phẩm</h5></div>
                    <div class="col-10 ps-4" style="padding-right: 48px">
                        <div class="value">Chưa cập nhật</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection




