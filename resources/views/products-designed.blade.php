@extends('layouts.user')
@section('title', 'Sản phẩm đã thiết kế')

@section('content')
<div class="products-designed-page">
    @include('components.breadcrumb',[
        'pages'=>[
            ['name'=>'Trang chủ',
                'link'=>route('home')],
            ['name'=>'Sản phẩm',
            'link'=>route('products')]
        ],
        'currentPage'=>'Sản phẩm đã thiết kế'
    ])

    <div class="products-designed-list">
        <div class="title d-flex justify-content-end align-items-center">
            @include('components.function-btn', [
                'link' => route('products.design.form'),
                'borderColor' => '#FF3468',
                'content' => '+ Thiết kế sản phẩm',
                'color' => '#FF3468'
            ])
        </div>

        <div class="list mt-3 mb-4 d-flex">
            @for($i=0; $i<6; $i++)
            @include("components.product-item", [
                'productLink'=>route('product.designed.detail'),
                'productImage'=>'product2.png',
                'stars'=>3,
                'name'=>'Trong xanh',
                'price'=>'600.000đ',
            ])
            @endfor
        </div>
    </div>

    
</div>
@endsection




