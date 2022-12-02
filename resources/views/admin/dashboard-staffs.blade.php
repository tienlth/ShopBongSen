@extends('layouts.dashboard')
@section('title', 'Quản lý nhân viên')

@section('content')
<div class="dashboard-inventory-page">
    <h5>Quản lý nhân viên</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        <div class="row">
            <div class="col-4">
                <form class="d-flex my-3" role="search">
                    @include('components.admin.search-input-data', [
                        'routeName'=>'dashboard-staffs.index',
                        'placeholder'=>'Tìm kiếm nhà nhân viên'
                    ])
                </form>
            </div>
            <div class="col-8 d-flex align-items-center justify-content-end">
                @include('components.admin.add-data-btn',[
                    'borderColor' => '#fff',
                    'content' => '+ Thêm nhân viên',
                    'color' => '#fff',
                    'bgc' => '#3098F9',
                ])
                <div class="pe-3"></div>
                @include('components.admin.multi-delete-data-btn', [
                    'borderColor' => '#fff',
                    'icon' => 'fa-regular fa-trash-can',
                    'content' => 'Xóa nhân viên',
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
                    <th class="" scope="col">Mã</th>
                    <th class="px-5" scope="col">Hình ảnh</th>
                    <th class="text-start" scope="col">Họ tên</th>
                    <th class="text-start" scope="col">Email</th>
                    <th class="text-start" scope="col">SĐT</th>
                    <th class="text-start" scope="col">Tài khoản</th>
                    <th class="" scope="col"></th>
                    <th class="" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                <tr>
                    <td><input id={{$e->id}} class="form-check-input p-2" type="checkbox" value=""></td>
                    <td class="">{{$e->id}}</td>
                    <td class="px-5"><img class="round" src={{"/imgs/staffs/avts/".$e->avatar}} alt="ingredient img" height="60" width="60"></td>
                    <td class="text-start">{{$e->name}}</td>
                    <td class="text-start">{{$e->email}}</td>
                    <td class="text-start">{{$e->phone}}</td>
                    <td class="text-start">{{'staffaccount'.$e->id}}</td>
                    <td class="text-end">
                        @include('components.admin.modify-data-btn',[
                            'routeName'=> 'dashboard-staffs.show',
                            'id'=>[
                                'idName'=>'dashboard_staff',
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
        'indexRouteName'=>'dashboard-staffs.index',
        'updateRouteName'=>'staff-update',
        'fields'=>[
            [
                'type'=>'text',
                'label'=>'Tên nhân viên',
                'name'=>'name',
                'currentValueProp'=>'name',
                'disabled'=>false
            ],
            [
                'type'=>'file',
                'label'=>'Tải ảnh đại diện',
                'name'=>'photo',
                'disabled'=>false
            ],
            [
                'type'=>'date',
                'label'=>'Ngày sinh',
                'name'=>'birthday',
                'currentValueProp'=>'birthday',
                'disabled'=>false
            ],
            [
                'type'=>'text',
                'label'=>'Quê quán',
                'name'=>'hometown',
                'currentValueProp'=>'hometown',
                'disabled'=>false
            ],
            [
                'type'=>'text',
                'label'=>'Địa chỉ',
                'name'=>'address',
                'currentValueProp'=>'address',
                'disabled'=>false
            ],
            [
                'type'=>'checkbox',
                'label'=>'Giới tính',
                'name'=>'gender',
                'currentValueProp'=>'gender',
                'disabled'=>false
            ],
            [
                'type'=>'text',
                'label'=>'Điện thoại',
                'name'=>'phone',
                'currentValueProp'=>'phone',
                'disabled'=>false
            ],
            [
                'type'=>'text',
                'label'=>'Email',
                'name'=>'email',
                'currentValueProp'=>'email',
                'disabled'=>false
            ]
        ]
    ])

    @include('components.admin.delete-form',[
        'singleDeleteRouteName'=>'staff-delete',
        'multiDeleteRouteName'=>'staff-deleteMulti',
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