@extends('layouts.dashboard')
@section('title', 'Danh sách tồn kho')

@section('content')
<div class="dashboard-inventory-page">
    <h5>Danh sách tồn kho</h5>
    
    <div class="row bg-white mx-0 my-4">
        <div class="col-4">
            @include('components.admin.search-input-data', [
                    'routeName'=>'dashboard-inventories.index',
                    'placeholder'=>'Tìm kiếm nguyên liệu'
            ])
        </div>
    </div>

    <div class="table-contain">
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr class="table-dark">
                    <th class="" scope="col">Mã</th>
                    <th class="" scope="col">Hình ảnh</th>
                    <th class="" scope="col">Tên nguyên liệu</th>
                    <th class="" scope="col">Số lượng</th>
                    <th class="" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                <tr>
                    <td>{{$e->id}}</td>
                    <td><img src="/imgs/ingredients/{{$e->ingredients->image}}" alt="ingredient img" height="60" width="60"></td>
                    <td>{{$e->ingredients->name}}</td>
                    <td>{{$e->quantity}}</td>
                    <td class="">
                        @include('components.admin.modify-data-btn',[
                            'routeName'=> 'dashboard-inventories.show',
                            'id'=>[
                                'idName'=>'dashboard_inventory',
                                'value'=>$e->id
                            ]
                        ])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        @include('components.admin.add-modify-form',[
            'indexRouteName'=>'dashboard-inventories.index',
            'updateRouteName'=>'inventory-update',
            'fields'=>[
                [
                    'type'=>'text',
                    'label'=>'Nguyên liệu',
                    'name'=>'name',
                    'currentValueProp'=>'name',
                    'disabled'=>true
                ],
                [
                    'type'=>'number',
                    'label'=>'Số lượng còn lại',
                    'name'=>'quantity',
                    'currentValueProp'=>'quantity',
                    'disabled'=>false
                ]
            ]
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