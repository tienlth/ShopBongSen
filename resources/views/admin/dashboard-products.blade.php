@extends('layouts.dashboard')
@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="dashboard-inventory-page">
    <h5>Quản lý sản phẩm</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        <div class="row">
            <div class="col-4">
                @include('components.admin.search-input-data', [
                    'routeName'=>'dashboard-products.index',
                    'placeholder'=>'Tìm kiếm sản phẩm'
                ])
            </div>
            <div class="col-8 d-flex align-items-center justify-content-end">
                @include('components.admin.add-data-btn',[
                    'borderColor' => '#fff',
                    'content' => '+ Thêm sản phẩm',
                    'color' => '#fff',
                    'bgc' => '#3098F9',
                ])
                <div class="pe-3"></div>
                @include('components.admin.multi-delete-data-btn', [
                    'borderColor' => '#fff',
                    'icon' => 'fa-regular fa-trash-can',
                    'content' => 'Xóa sản phẩm',
                    'color' => '#fff',
                    'bgc' => '#FF8A8A'
                ])
            </div>
        </div>
        @include('components.product-filter')
    </div>

    <div class="table-contain">
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr class="table-dark">
                    <th class="" scope="col"><input class="all-check form-check-input p-2" type="checkbox" value=""></th>
                    <th class="" scope="col">Mã</th>
                    <th class="pe-5" scope="col">Hình ảnh</th>
                    <th class="text-start" scope="col">Tên sản phẩm</th>
                    <th class="text-start" scope="col">Giá</th>
                    <th class="" scope="col"></th>
                    <th class="" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                <tr>
                    <td><input id={{$e->id}} class="form-check-input p-2" type="checkbox" value=""></td>
                    <td class="">{{$e->id}}</td>
                    <td class="pe-5"><img class="" src={{"/imgs/products/".$e->main_image}} alt="ingredient img" height="60" width="60"></td>
                    <td class="text-start">{{$e->name}}</td>
                    <td class="text-start price-convert">{{$e->price}}</td>
                    <td class="text-end">
                        @include('components.admin.modify-data-btn',[
                            'routeName'=> 'dashboard-products.show',
                            'id'=>[
                                'idName'=>'dashboard_product',
                                'value'=>$e->id
                            ]
                        ])
                    </td>
                    <td class="text-start">
                        @include('components.admin.delete-data-btn',['id'=>$e->id])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(isset($currentElement))
    <div class="modal fade" aria-modal="true" id="add-modify-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin sản phẩm</h1>
                        <a href={{url()->previous()}}><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 d-flex justify-content-center">
                            <img src='{{'\imgs\products/'.$currentElement->main_image}}' height="120" width="160" alt="">
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            @include('components.tag',['tagContent'=>'producttype'])
                            @include('components.tag',['tagContent'=>'style'])
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Tên sản phẩm</label>
                            <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->name}}'>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Giá</label>
                            <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->price}}'>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Giảm giá</label>
                            <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->sale}}'>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for=""class="form-label">Màu sắc</label>
                                <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->color}}'>
                            </div>
                            <div class="col">
                                <label for=""class="form-label">Hạn sử dụng</label>
                                <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->sale}}'>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for=""class="form-label">Chiều cao</label>
                                <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->height}}'>
                            </div>
                            <div class="col">
                                <label for=""class="form-label">Chiều rộng</label>
                                <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->width}}'>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Ý nghĩa</label>
                            <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->meaning}}'>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Cách chăm sóc</label>
                            <input disabled type="text" class="form-control" placeholder="" value='{{$currentElement->taking_care_guide}}'>
                        </div>
                        <div class="my-2">
                            <h6>Thành phần</h6>
                        </div>
                        @foreach($details as $detail)
                            <div class="mb-4">
                                <label for="" class="form-label text-danger">{{$detail['name']}}</label>
                                <hr class="mt-0 mb-2">
                                <div class="">
                                    <label for=""class="form-label">Số lượng</label>
                                    <input disabled type="text" class="form-control" placeholder="" value={{$detail['quantity']}}>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <a href={{url()->previous()}}>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @else
    <div class="modal fade" aria-modal="true" id="add-modify-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action={{route('dashboard-products.index')}} method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sản phẩm</h1>
                        <a><button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for=""class="form-label">Tên sản phẩm</label>
                            <input required type="text" name="name" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Tải ảnh lên</label>
                            <input required type="file" name="photo" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Giá</label>
                            <input required type="number" name="price" class="form-control" placeholder="" >
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Giảm giá</label>
                            <input required type="number" name="sale" class="form-control" placeholder="" >
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for=""class="form-label">Màu sắc</label>
                                <input required type="text" name="color" class="form-control" placeholder="">
                            </div>
                            <div class="col">
                                <label for=""class="form-label">Hạn sử dụng</label>
                                <input required type="number" name="expiry" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for=""class="form-label">Chiều cao</label>
                                <input required type="number" name="height" class="form-control" placeholder="">
                            </div>
                            <div class="col">
                                <label for=""class="form-label">Chiều rộng</label>
                                <input type="number" name="width" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Phân loại</label>
                            <select name="type" class="form-select w-100 text-danger">
                                @foreach($producttypes as $type)
                                <option value={{$type->id}}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Kiểu dáng</label>
                            <select name="style" class="form-select w-100 text-danger">
                                @foreach($styles as $style)
                                <option value={{$style->id}}>{{$style->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Ý nghĩa</label>
                            <input type="text" name="meaning" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for=""class="form-label">Cách chăm sóc</label>
                            <input type="text" name="taking_care_guide" class="form-control" placeholder="" are_guide>
                        </div>
                        <h6 class="mb-3">Thành phần hoa</h6>
                        <div class="input-item-contain">
                            <div class="mb-3 row input-item">
                                <div class="">
                                    <select name="ingredients[0][]" class="form-select w-100 text-danger">
                                        @foreach($ingredients as $ingr)
                                        <option value={{$ingr->id}}>{{$ingr->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mt-3 pe-0">
                                    <div class="col">
                                        <div>
                                            <input required name="ingredients[1][]" type="number" class="form-control" placeholder="Số lượng">
                                        </div>
                                    </div>
                                    <hr class="mt-4">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex add-btn justify-content-center">
                            @include('components.function-btn', [
                                'borderColor' => '#64AAFF',
                                'content' => '+ Thêm',
                                'color' => '#64AAFF'
                            ])
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a><button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Đóng</button></a>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @include('components.admin.delete-form',[
        'singleDeleteRouteName'=>'product-delete',
        'multiDeleteRouteName'=>'product-deleteMulti',
    ])

</div>
@endsection
@push('script')
    @if(isset($currentElement))
    <script>
        var modal = new bootstrap.Modal($('#add-modify-modal')[0], {
        keyboard: false
        });

        modal.show();
    </script>
    @endif

    <script>
        var inputItem = $('.input-item:last-child')
        $('.add-btn').on('click', (evt)=>{
            console.log($('.input-item'))
            inputItem = inputItem.clone()
            $(inputItem).find('input').val('')
            inputItem.appendTo('.input-item-contain')
        })

        $('.close-btn').on('click', (evt)=>{
            $('.input-item-contain').text('')
            $(inputItem).find('input').val('')
            inputItem.appendTo('.input-item-contain')

        })
    </script>
@endpush