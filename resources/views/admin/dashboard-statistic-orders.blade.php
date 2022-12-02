@extends('layouts.dashboard')
@section('title', 'Thống kê đơn hàng')

@section('content')
<div class="dashboard-inventory-page">
    <h5>Thống kê đơn hàng</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        @include('components.admin.date-filter', ['routeName'=>'dashboard-orders.index'])
    </div>
    <div class="table-contain">
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr class="table-dark">
                    <th class="pe-5" scope="col">Mã</th>
                    <th class="ps-5 text-start" scope="col">Người đặt</th>
                    <th class="text-start" scope="col">Thời gian đặt</th>
                    <th class="pe-5" scope="col">Thời gian nhận</th>
                    <th class="text-start" scope="col">Trạng thái</th>
                    <th class="" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                <tr>
                    <td class="pe-5">{{$e->id}}</td>
                    <td class="ps-5 text-start">{{$e->customer_name}}</td>
                    <td class="text-start">{{$e->created_at}}</td>
                    <td class="pe-5">{{$e->deliverytime}}</td>
                    <td class="ps-3">
                        <div class="order-status component d-flex">
                            @if($e->status_id==1)
                            <span class="text-primary">Đã nhận</span>
                            @elseif($e->status_id==2)
                            <span class="text-warning">Đang giao</span>
                            @elseif($e->status_id==3)
                            <span class="text-success">Đã giao</span>
                            @endif
                        </div>
                    </td>
                    <td class="text-start">
                        @include('components.admin.modify-data-btn',[
                            'routeName'=> 'dashboard-orders.show',
                            'id'=>[
                                'idName'=>'dashboard_order',
                                'value'=>$e->id
                            ]
                        ])
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
                <form action={{route('order-update',['dashboard_order'=>$currentElement->id])}} method='POST' enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin đơn hàng</h1>
                        <div class="mb3">
                            <h6 class="mb-0">{{$currentElement->created_at}}</h6>
                        </div>
                        <a href={{route('dashboard-orders.index')}}><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="mb-2">Trạng thái: </label> 
                            <select name="status" class="form-select w-100" aria-label="Default select example">
                                <option class="text-primary" @if($currentElement->status_id==1){{'selected'}}@endif value="1">Đã nhận</option>
                                <option class="text-warning" @if($currentElement->status_id==2){{'selected'}}@endif value="2">Đang giao</option>
                                <option class="text-success" @if($currentElement->status_id==3){{'selected'}}@endif value="3">Đã giao</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <label class="mb-2" for="">Người đặt</label>
                            </div>
                            <input disabled type="text" class="form-control" value='{{$currentElement->customer_name}}'>
                        </div>
                        @foreach($details as $detail)
                            <div class="mb-4">
                                <label for="" class="form-label text-danger">{{$detail['name']}}</label>
                                <hr class="mt-0 mb-3">
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for=""class="form-label">Số lượng</label>
                                    </div>
                                    <div class="col-9">
                                        <input disabled type="text" class="form-control" placeholder="" value={{$detail['quantity']}}>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for=""class="form-label">Giá</label>
                                    </div>
                                    <div class="col-9">
                                        <input disabled type="text" class="form-control price-convert" placeholder="" value={{$detail['price']}}>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for=""class="form-label">Tổng</label>
                            </div>
                            <div class="col-9">
                                <span class="price-convert">{{$total}}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <label class="mb-2" for="">Thông điệp</label>
                            </div>
                            <textarea class="form-control text-start" name="" id="" cols="30" rows="3">{{$currentElement->message}}</textarea>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <label class="mb-2" for="">Ghi chú cho shop</label>
                            </div>
                            <textarea class="form-control text-start" name="" id="" cols="30" rows="3">{{$currentElement->note}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href={{route('dashboard-orders.index')}}><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></a>
                        <button type="submit" class="btn btn-primary">Lưu Lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

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
@endpush