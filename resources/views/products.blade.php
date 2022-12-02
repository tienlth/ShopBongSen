@extends('layouts.user')
@section('title', 'Sản phẩm')

@section('content')
<div class="products-page">
    @include('components.breadcrumb',[
        'pages'=>[
            ['name'=>'Trang chủ',
                'link'=>route('index')]
        ],
        'currentPage'=>'Sản phẩm'
    ])

    <div class="product-filter-contain container-fluid p-0 my-4">
        <div class="product-filter">
            <div class="mb-4 col-7 pe-2">
                @include('components.admin.search-input-data', [
                    'routeName'=>'products.index',
                    'placeholder'=>'Tìm kiếm sản phẩm'
                ])
            </div>
            @include('components.product-filter')
        </div>
    </div>

    @if(count($products)>0)
    <div class="products-list d-flex">
        @foreach($products as $prd)
            @include("components.product-item", [
                'productLink'=>route('products.show',['product'=>$prd->id]),
                'productImage'=>$prd->main_image,
                'stars'=>$prd->quality,
                'name'=>$prd->name,
                'oldPrice'=>$prd->price,
                'price'=>($prd->price - $prd->price*$prd->sale/100),
                'sold'=>$prd->sold,
                'sale'=>$prd->sale
            ])
        @endforeach
    </div>

    <div class="pagination component d-flex justify-content-center mb-3">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <div class="d-flex justify-content-center">
                    @if(method_exists($products, 'links')){!! $products->links() !!}@endif
                </div>
            </ul>
        </nav>
    </div>
    @else
        <h4 class="text-center my-5" style="color: #ccc">
            Không có kết quả trùng khớp
        </h4>
    @endif

</div>
@endsection




