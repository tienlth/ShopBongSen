@extends('layouts.dashboard')
@section('title', 'Thống kê doanh thu')

@section('content')
<div class="dashboard-inventory-page">
    <h5>Thống kê doanh thu</h5>
    
    <div class="row bg-white mx-0 my-4 d-flex justify-content-center">
        @include('components.admin.date-filter', ['routeName'=>'dashboard-turnovers.index'])
    </div>

    <h5>Thống kê doanh thu</h5>
    <div class="row my-4">
        @include('components.admin.chart', [
                'id'=>'chart2',
                'type'=>'line',
                'labels'=>'testchart',
                'datasets'=>[
                    [
                        'label'=>'Giá trị đơn hàng',
                        'backgroundColor'=>'#0093E5',
                        'borderColor'=>'#0093E5',
                        'data'=>'testchart'
                    ]
                ]
            ])
    </div>

    <div class="table-contain">
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr class="table-dark">
                    <th class="pe-5" scope="col">Mã</th>
                    <th class="ps-5 text-start" scope="col">Người đặt</th>
                    <th class="text-start" scope="col">Thời gian đặt</th>
                    <th class="text-center" scope="col">Tổng giá trị</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $e)
                <tr>
                    <td class="pe-5">{{$e->id}}</td>
                    <td class="ps-5 text-start">{{$e->customer_name}}</td>
                    <td class="text-start">{{$e->created_at}}</td>
                    <td class="text-center">{{$e->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection