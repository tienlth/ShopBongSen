<div class="breadcrumb-custom mx-0 component">
    <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($pages as $page)
            <li class="breadcrumb-item"><a href={{$page['link']}}>{{$page['name']}}</a></li>
            @endforeach
            @if(isset($productLocate))
            <li class="breadcrumb-item"><a href={{route('products.index')}}>Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$productLocate}}</li>
            @else
            @if(isset($thisProduct))
            <li class="breadcrumb-item"><a href={{route('products.index')}}>Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$thisProduct->name}}</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">{{$currentPage}}</li>
            @endif
            @endif
        </ol>
    </nav>
</div>