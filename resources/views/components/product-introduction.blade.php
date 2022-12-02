<div class="product-intro @if($reverse){{"reverse"}}@endif row text-white" >
    <div class="col-4 text-center d-flex align-items-center"><img src="/imgs/products/{{$img}}" width="280" height="200" alt="product"></div>
    <div class="col-8 info" 
        style="background-image: url('/imgs/introduction/bg-@if($reverse){{"2"}}@else{{"1"}}@endif.png')">
        <div class="mb-2"><span class="name me-4">{{$name}}</span>Đã bán: <span style="color: #FFE600" class="sold">{{$sold}}</span></div>
        <div class="mb-2"><span style="color: #FF0000" class="price price-convert me-4">{{$price}}</span><span style="color: #838383" class="old-price price-convert">{{$oldPrice}}</span></div>
        <div class="stars mb-4" style="color: #FFE600">
            @for ($i = 0; $i < $stars; $i++)
            <i class="fa-solid fa-star"></i>
            @endfor
           
            @if($stars<5)
            @for ($i = 0; $i < 5-$stars; $i++)
            <i class="fa-regular fa-star"></i>
            @endfor
            @endif
        </div>
        <div class="meaning">
            {{$meaning}}
        </div>
    </div>
</div>