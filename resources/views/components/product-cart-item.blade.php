<div class="product-cart-item row my-2">
    <div class="col-2 img" style="background-image: url({{$imgLink}})"></div>
    <div class="col-10 ps-4">
        <div class="row mb-1"><b class="px-0">{{$name}}</b></div>
        <div class="row">
            <div class="col ps-0">
                <div class="mb-1">Đơn giá</div>
                <div class="price-convert">{{$price}}</div>
            </div>
            <div class="col px-4">
                <div style="margin-left: -12px" class="mb-2">Số lượng</div>
                @if(!isset($ordered))
                    <div class="quantity row col me-1">
                        <button type="button" class="col-3 minus d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <input class="col-6 value text-center quantity-value" name="product_quantity[]" type="number" value={{$quantity}}>
                        <button type="button" class="col-3 flush d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                @else
                <span>{{$quantity}}</span>
                @endif
            </div>
            <div class="col ms-4">
                <div class="mb-1">Tổng</div>
                <div class="price-convert">{{$total}}</div>
            </div>
            @if(!isset($ordered))
            <div id={{$prd['id']}} class="col-1 delete-btn mb-4 d-flex justify-content-center align-items-center">
                @include('components.function-btn', [
                        'borderColor' => '#FF3D3D',
                        'content' => 'Xóa',
                        'color' => '#FF3D3D'
                ])
            </div>
            @endif
        </div>
    </div>
</div>