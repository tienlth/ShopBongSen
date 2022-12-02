@extends('layouts.dashboard')
@section('title', 'Thống kê góp ý')

@section('content')
<div class="dashboard-evaluation-page">
    <h5>Thống kê góp ý</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        @include('components.admin.date-filter', ['routeName'=>'dashboard-feedbacks.index'])
    </div>

    <div class="table-contain">
        <table class="table table-striped text-start align-middle">
            <thead>
                <tr class="table-dark">
                    <th class="text-center ps-2 pe-4" scope="col">Mã</th>
                    <th class="" scope="col">Số điện thoại</th>
                    <th class="" scope="col">Email</th>
                    <th class="" scope="col">Vấn đề</th>
                    <th class="" scope="col">Nội dung</th>
                    <th class="" scope="col">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                <tr>
                    <td class="text-center ps-2 pe-4">{{$e->id}}</td>
                    <td class="">{{$e->phone}}</td>
                    <td class="">{{$e->email}}</td>
                    <td class="">{{$e->problem}}</td>
                    <td class="">{{$e->content}}</td>
                    <td class="">{{$e->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection