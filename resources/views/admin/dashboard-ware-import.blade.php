@extends('layouts.dashboard')
@section('title', 'Quản lý nhập hàng')

@section('content')
<div class="dashboard-import-page">
    <h5>Quản lý nhập hàng</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        <div class="row">
            <div class="col-4">
                @include('components.admin.search-input-data', [
                    'routeName'=>'dashboard-imports.index',
                    'placeholder'=>'Tìm kiếm phiếu nhập'
                ])
            </div>
            <div class="col-4"></div>
            <div class="col-4 d-flex align-items-center justify-content-end">
                @include('components.admin.add-data-btn',[
                    'borderColor' => '#fff',
                    'content' => '+ Thêm phiếu nhập',
                    'color' => '#fff',
                    'bgc' => '#3098F9',
                ])
            </div>
        </div>
        <div style="margin-top: -16px">
            @include('components.admin.date-filter', ['routeName'=>'dashboard-imports.index'])
        </div>
    </div>

    <div class="table-contain">
        <table class="table table-striped text-center align-middle">
            <thead> 
                <tr class="table-dark">
                    <th class="pe-5" scope="col">Mã</th>
                    <th class="text-start" scope="col">Nhà cung cấp</th>
                    <th class="text-start" scope="col">Ngày nhập</th>
                    <th class="" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                    @foreach($e->importcoupons as $ce)
                    @if($ce->id>0)
                    <tr>
                        <td class="pe-5">{{$ce->id}}</td>
                        <td class="text-start">{{$e->name}}</td>
                        <td class="text-start">{{$ce->time}}</td>
                        <td class="">
                            @include('components.admin.see-data-btn',[
                                'routeName'=> 'dashboard-imports.show',
                                'id'=>[
                                    'idName'=>'dashboard_import',
                                    'value'=>$ce->id
                                ]
                            ])
                        </td>
                    </tr>
                    @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    @if(isset($supplierName))
    <div class="modal fade" aria-modal="true" id="add-modify-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin phiếu nhập</h1>
                        <div class="mb3">
                            <h6 class="mb-0">{{$currentElement->time}}</h6>
                        </div>
                        <a href={{route('dashboard-imports.index')}}><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                    <div class="modal-body">
                        @foreach($details as $detail)
                            <div class="mb-4">
                                <label for="" class="form-label text-danger">{{$detail['name']}}</label>
                                <hr class="mt-0 mb-2">
                                <div class="row">
                                    <div class="col">
                                        <label for=""class="form-label">Số lượng</label>
                                        <input disabled type="text" class="form-control" placeholder="" value={{$detail['quantity']}}>
                                    </div>
                                    <div class="col">
                                        <label for=""class="form-label">Đơn giá</label>
                                        <input disabled type="text" class="form-control price-convert" placeholder="" value={{$detail['price']}}>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <a href={{route('dashboard-imports.index')}}><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></a>
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
                <form action={{route('dashboard-imports.index')}} method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm phiếu nhập</h1>
                        <a><button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="mb-2" for="">Nhà cung cấp</label>
                            <select name="supplier" class="form-select w-100">
                                @foreach($suppliers as $sp)
                                <option value={{$sp->id}}>{{$sp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="">Ngày nhập hàng</label>
                            @include('components.datepicker',['required'=>true])
                        </div>
                        <label class="mb-2" for="">Chi tiết nhập hàng</label>
                        <div class="input-item-contain">
                            <div class="mb-3 row input-item">
                                <div class="">
                                    <select name="imports[0][]" class="form-select w-100 text-danger">
                                        @foreach($ingredients as $ingr)
                                        <option value={{$ingr->id}}>{{$ingr->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mt-3 pe-0">
                                    <div class="col">
                                        <div>
                                            <input required name="imports[1][]" type="number" class="form-control" placeholder="Số lượng">
                                        </div>
                                    </div>
                                    <div class="col pe-0">
                                        <div>
                                            <input required name="imports[2][]" type="number" class="form-control" placeholder="Đơn giá">
                                        </div>
                                    </div>
                                    <hr class="my-2">
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


</div>
@endsection
@push('script')
    @if(isset($supplierName))
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