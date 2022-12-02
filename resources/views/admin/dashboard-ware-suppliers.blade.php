@extends('layouts.dashboard')
@section('title', 'Quản lý nhà cung cấp')

@section('content')
<div class="dashboard-inventory-page">
    <h5>Quản lý nhà cung cấp</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        <div class="row">
            <div class="col-4">
                <form class="d-flex my-3" role="search">
                    @include('components.admin.search-input-data', [
                        'routeName'=>'dashboard-suppliers.index',
                        'placeholder'=>'Tìm kiếm nhà cung cấp'
                    ])
                </form>
            </div>
            <div class="col-8 d-flex align-items-center justify-content-end">
                @include('components.admin.add-data-btn',[
                    'borderColor' => '#fff',
                    'content' => '+ Thêm nhà cung cấp',
                    'color' => '#fff',
                    'bgc' => '#3098F9',
                ])
                <div class="pe-3"></div>
                @include('components.admin.multi-delete-data-btn', [
                    'borderColor' => '#fff',
                    'icon' => 'fa-regular fa-trash-can',
                    'content' => 'Xóa nhà cung cấp',
                    'color' => '#fff',
                    'bgc' => '#FF8A8A'
                ])
            </div>
        </div>
    </div>

    <div class="table-contain">
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr class="table-dark">
                    <th class="" scope="col"><input class="all-check form-check-input p-2" type="checkbox" value=""></th>
                    <th class="pe-5" scope="col">Mã</th>
                    <th class="text-start ps-5" scope="col">Tên nhà cung cấp</th>
                    <th class="text-start" scope="col">Địa chỉ</th>
                    <th class="" scope="col"></th>
                    <th class="" scope="col"></th>
                </tr>
            </thead>
            <tbody> 
                @foreach($data as $e)
                <tr>
                    <td><input id={{$e->id}} class="form-check-input p-2" type="checkbox" value=""></td>
                    <td class="pe-5">{{$e->id}}</td>
                    <td class="text-start ps-5">{{$e->name}}</td>
                    <td class="text-start">{{$e->address}}</td>
                    <td class="text-end">
                        @include('components.admin.modify-data-btn',[
                            'routeName'=> 'dashboard-suppliers.show',
                            'id'=>[
                                'idName'=>'dashboard_supplier',
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

    @include('components.admin.add-modify-form',[
        'indexRouteName'=>'dashboard-suppliers.index',
        'updateRouteName'=>'supplier-update',
        'fields'=>[
            [
                'type'=>'text',
                'label'=>'Tên nhà cung cấp',
                'name'=>'name',
                'currentValueProp'=>'name',
                'disabled'=>false
            ],
            [
                'type'=>'text',
                'label'=>'Địa chỉ',
                'name'=>'address',
                'currentValueProp'=>'address',
                'disabled'=>false
            ]
        ]
    ])

    @include('components.admin.delete-form',[
        'singleDeleteRouteName'=>'supplier-delete',
        'multiDeleteRouteName'=>'supplier-deleteMulti',
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
@endpush