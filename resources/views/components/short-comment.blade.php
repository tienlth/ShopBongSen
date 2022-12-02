<div class="short-commnet component mb-3">
    <div class="row">
        <div class="col">
            <div><span></span><span class="name"><b>{{$name}}</b></span><span class="date ms-3">(<span>{{$date}}</span>)</span></div>
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
            <div class="comment-content mt-3">
                {{$comment}}
            </div>
        </div>
        <div class="col d-flex justify-content-end align-items-center me-3"><a href={{route('account.staff.evaluation', ['id'=>$id])}} style="text-decoration: underline; color: #3f4fdd;">Xem chi tiết</a></div>
    </div>
</div>