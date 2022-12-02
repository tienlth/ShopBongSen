<div class="product-item-container component">
    <div class="card product-item component">
        <a href={{$productLink}}>
            <div class="p-2"><img src="/imgs/products/{{$productImage}}" class="card-img-top" alt="product-item">
            </div>
            <div class="card-body">
                <div class="position-relative d-flex justify-content-end">
                    @if(isset($sale))
                    <div class="sale"><span class="position-absolute text-white">Giảm {{$sale}}%</span></div>
                    @endif

                    @if(isset($sold))
                    <div class="sold"><span style="color: #545454">Đã bán: </span><span style="color: #FF6C87" class="value">{{$sold}}</span></div>
                    @endif
                </div>
                <div class="stars">
                    @for ($i = 0; $i < $stars; $i++)
                    <i class="fa-solid fa-star"></i>
                    @endfor
                
                    @if($stars<5)
                    @for ($i = 0; $i < 5-$stars; $i++)
                    <i class="fa-regular fa-star"></i>
                    @endfor
                    @endif
                </div>
                <p class="name mb-1" style="color: #545454">{{$name}}</p>
                @if(isset($oldPrice))
                <p class="old-price price-convert mb-0" style="color: #545454">{{$oldPrice}}</p>
                @endif
                <p class="price price-convert mb-0" style="color: #EB44A5">{{$price}}</p>
            </div>
        </a>
    </div>
</div>