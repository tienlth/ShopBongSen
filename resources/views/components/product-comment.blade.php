<div class="comment component mt-4">
    <div><span></span><span class="name">{{$name}}</span><span class="date ms-3">(<span>{{$date}}</span>)</span></div>
    <div class="stars mt-2">
        @for($i = 0; $i < $stars; $i++)
        <i class="fa-solid fa-star"></i>
        @endfor
        
        @if($stars<5)
        @for($i = 0; $i < 5-$stars; $i++)
        <i class="fa-regular fa-star"></i>
        @endfor
        @endif
    </div>
    <div class="ms-3 mt-3">
        <div class="comment-imgs d-flex">
            @if(isset($imgLinks))
            @foreach($imgLinks as $link)
            <div class="comment-img" style="background-image: url('/imgs/products/{{$link}}')"></div>
            @endforeach
            @endif
        </div>
        <div class="comment-content row mt-3">
            <ul class="col-4 d-flex comment-evaluation">
                <li><span>Màu sắc: </span><span class="color ms-1">{{$colorComment}}</span></li>
                <li><span>Kiểu dáng: </span><span class="style ms-1">{{$styleComment}}</span></li>
                <li><span>Kích thước: </span><span class="dimension ms-1">{{$dimensionComment}}</span></li>
            </ul>
            <div class="col-1">
                <div class="bar"></div>
            </div>
            <div class="col-6 comment-content ms-2">
                {{$comment}}
            </div>
        </div>
    </div>
</div>