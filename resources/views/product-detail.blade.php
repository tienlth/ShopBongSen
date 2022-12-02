@extends('layouts.user')
@section('title', 'Trong xanh')

@section('content')
<div class="product-detail-page mb-4">
    @include('components.breadcrumb',[
        'pages'=>[
            ['name'=>'Trang chủ',
            'link'=>route('index')],
        ],
        'currentPage'=>'Trong xanh'
    ])

    <div class="content">
        <div class="info-container row d-flex justify-content-between">
            <div class="col-5 imgs">
                <div class="row product-main-img mb-4">
                    <a href="/imgs/products/{{$thisProduct->main_image}}"><img src="/imgs/products/{{$thisProduct->main_image}}" height="386" alt="product img"></a>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-4 px-1">
                        <a href="/imgs/products/{{$thisProduct->main_image}}"><div class="product-sub-img" style="background-image: url('/imgs/products/{{$thisProduct->main_image}}')"></div></a>
                    </div>
                    <div class="col-4 px-1">
                        <a href="/imgs/products/{{$thisProduct->main_image}}"><div class="product-sub-img" style="background-image: url('/imgs/products/{{$thisProduct->main_image}}')"></div></a>
                    </div>
                    <div class="col-4 px-1">
                        <a href="/imgs/products/{{$thisProduct->main_image}}"><div class="product-sub-img" style="background-image: url('/imgs/products/{{$thisProduct->main_image}}')"></div></a>
                    </div>
                </div>
            </div>
            <div class="col-6 info pe-4">
                <div class="d-flex align-items-center">
                    <h4 class="name me-3 mb-0" style="color: #696868">{{$thisProduct->name}}</h4>
                    <div class="stars">
                        @for ($i = 0; $i < $thisProduct->quality; $i++)
                        <i class="fa-solid fa-star"></i>
                        @endfor

                        @if($thisProduct->quality<5)
                        @for ($i = 0; $i < 5-$thisProduct->quality; $i++)
                        <i class="fa-regular fa-star"></i>
                        @endfor
                        @endif
                    </div>
                    <div class="ms-3">
                        <div class="component tag me-2 mt-2">
                            <span class="badge p-2 rounded-pill position-relative">
                                {{$thisProduct->type->name}}
                            </span>
                            <span class="badge ms-3 p-2 rounded-pill position-relative">
                                {{$thisProduct->style->name}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-2">
                    <div class="price me-3 price-convert">{{($thisProduct->price - $thisProduct->price*$thisProduct->sale/100)}}</div>
                    <div class="old-price price-convert">{{$thisProduct->price}}</div>
                    <h6 class="ms-5 mb-0 mt-1" style="color: #696868">Đã bán: <span>{{$thisProduct->sold}}</span></h6>
                </div>
                <div class="menu row mt-3">
                    <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check info-btn" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn" for="btnradio1">Thông tin sản phẩm</label>

                        <input type="radio" class="btn-check meaning-btn" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn" for="btnradio2">Ý nghĩa sản phẩm</label>
                      
                        <input type="radio" class="btn-check takingcare-btn" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn" for="btnradio3">Cách chăm sóc</label>
                    </div>
    
                    <div class="menu-content product-info">
                        <div class="info-item">
                            <ul class="info-list col p-0 px-2 mt-3">
                                <li class="row mb-1">
                                    <div class="row pe-0 mb-1">
                                        <div class="col field">Màu sắc</div>
                                        <div class="col value text-end px-0">{{$thisProduct->color}}</div>
                                    </div>
                                    <hr>
                                </li>
                                <li class="row mb-1">
                                    <div class="row pe-0 mb-1">
                                        <div class="col field">Chiều cao</div>
                                        <div class="col value text-end px-0">{{$thisProduct->height}} cm</div>
                                    </div>
                                    <hr>
                                </li>
                                <li class="row mb-1">
                                    <div class="row pe-0 mb-1">
                                        <div class="col field">Chiều rộng</div>
                                        <div class="col value text-end px-0">{{$thisProduct->width}} cm</div>
                                    </div>
                                    <hr>
                                </li>
                                <li class="row mb-1">
                                    <div class="row pe-0 mb-1">
                                        <div class="col field">Hạn sử dụng</div>
                                        <div class="col value text-end px-0">{{$thisProduct->expiry}} ngày</div>
                                    </div>
                                    <hr>
                                </li>
                            </ul>
                
                            <div class="product-include">
                                <h5>Sản phẩm bao gồm</h5>
                                <ul class="ps-2">
                                    @foreach($thisProduct->ingredients as $ingr)
                                    <li class="mb-2">{{$ingr->name}}: <span class="quantity">{{$ingr->pivot->quantity}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="meaning-item">
                            {{$thisProduct->meaning}}
                        </div>
                        
                        <div class="takingcare-item">
                            {{$thisProduct->taking_care_guide}}
                        </div>
                    </div>
    
                    <div class="menu-content product-meaning"></div>
                    <div class="menu-content product-takingcare"></div>
                </div>
            </div>
        </div>
    
        <form action={{route('products.store')}} method="POST">
            @csrf
            <div class="buy-method row p-3">
                <div class="quantity row col me-1">
                    <button type="button" class="col-3 minus d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <input name="product-addcart-quantity" class="col-6 quantity-value value text-center" type="number" value="1">
                    <input style="display: none;" type="text" name="product-addcart-id" value="{{$thisProduct->id}}">
                    <button type="button" class="col-3 flush d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="col add-cart-btn">
                    <div><button type="submit" class="btn w-100 text-white add-cart-btn">Thêm vào giỏ hàng</button></div>
                </div>
                <div class="col contact-btn">
                    <div><a href="tel:+0834603541"><button class="btn w-100 text-white">Liên hệ <i class="ms-3 fa-solid fa-phone"></i> 0834603541</button></a></div>
                </div>
            </div>
        </form>

        <form action={{route('evaluations.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            <input style="display: none" name="products_id" type="text" value='{{$thisProduct->id}}'>
            <div class="evaluation mt-4">
                <h5>Đánh giá</h5>
                <div class="evaluation-form mt-3 mb-4">
                    <div class="stars stars-evaluation">
                        <i id="1" class="fa-solid fa-star"></i>
                        <i id="2" class="fa-regular fa-star"></i>
                        <i id="3" class="fa-regular fa-star"></i>
                        <i id="4" class="fa-regular fa-star"></i>
                        <i id="5" class="fa-regular fa-star"></i>
                    </div>
                    <input name="quality" style="display: none;" type="number" class="star-input" value="1">
                </div>
                <div class="evaluation-input row mb-3">
                    <div class="col-2 pt-3">Màu sắc</div>
                    <div class="col-10">
                        <div class="form-floating">
                            <textarea name="color_evaluation" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Đánh giá màu sắc</label>
                        </div>
                    </div>
                </div>
                <div class="evaluation-input row mb-3">
                    <div class="col-2 pt-3">Kiểu dáng</div>
                    <div class="col-10">
                        <div class="form-floating">
                            <textarea name="style_evaluation" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Đánh giá kiểu dáng</label>
                        </div>
                    </div>
                </div>
                <div class="evaluation-input row mb-3">
                    <div class="col-2 pt-3">Kích thước</div>
                    <div class="col-10">
                        <div class="form-floating">
                            <textarea name="dimension_evaluation" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Đánh giá kích thước</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="comment">
                <div class="evaluation-input mb-3">
                    <h5 class="mb-3">Bình luận</h5>
                    <div class="form-floating">
                        <textarea name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 140px"></textarea>
                        <label for="floatingTextarea2">Bình luận của bạn về sản phẩm</label>
                    </div>
                </div>
            </div>

            <div class="img-upload">
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <label class="form-label mb-0">
                            <h5 class="mb-0">
                                Thêm hình ảnh
                            </h5>
                        </label>
                        <div class="form-check form-switch ms-3 mb-0 d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#upload">
                        </div>
                    </div>
                    <div class="collapse" id="upload">
                        <input multiple="multiple" class="form-control" type="file" name="photo[]" id="">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4 mb-4">
                <button type="submit" class="btn evaluate-btn text-white">Đánh giá</button>
            </div>
        </form>

        <hr>
        <div class="comments mt-4">
            @foreach($evaluations as $e)
            <div class="comment component mt-4">
                <div><span></span><span class="name">{{$e->customer->name}}</span><span class="date ms-3"><span>{{$e->created_at}}</span></span></div>
                <div class="stars mt-2">
                    @for($i = 0; $i < $e->quality; $i++)
                    <i class="fa-solid fa-star"></i>
                    @endfor
                    
                    @if($e->quality<5)
                    @for($i = 0; $i < 5-$e->quality; $i++)
                    <i class="fa-regular fa-star"></i>
                    @endfor
                    @endif
                </div>
                <div class="ms-3 mt-3">
                    <div class="comment-imgs d-flex">
                        @if(isset($e->imageofevaluations))
                        @foreach($e->imageofevaluations as $img)
                        <div class="comment-img" style="background-image: url('/imgs/imageofevaluations/{{$img->url}}')"></div>
                        @endforeach
                        @endif
                    </div>
                    <div class="comment-content row mt-3">
                        <ul class="col-4 d-flex comment-evaluation">
                            <li><span>Màu sắc: </span><span class="color ms-1">{{$e->color_evaluation}}</span></li>
                            <li><span>Kiểu dáng: </span><span class="style ms-1">{{$e->style_evaluation}}</span></li>
                            <li><span>Kích thước: </span><span class="dimension ms-1">{{$e->dimension_evaluation}}</span></li>
                        </ul>
                        <div class="col-1">
                            <div class="bar"></div>
                        </div>
                        <div class="col-6 comment-content ms-2">
                            {{$e->content}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $('.product-info .meaning-item').hide();
    $('.product-info .takingcare-item').hide();

    $('.menu .info-btn').on('click',(evt)=>{
        $('.product-info .info-item').show();
        $('.product-info .meaning-item').hide();
        $('.product-info .takingcare-item').hide();
    })

    $('.menu .meaning-btn').on('click',(evt)=>{
        $('.product-info .info-item').hide();
        $('.product-info .meaning-item').show();
        $('.product-info .takingcare-item').hide();
    })

    $('.menu .takingcare-btn').on('click',(evt)=>{
        $('.product-info .info-item').hide();
        $('.product-info .meaning-item').hide();
        $('.product-info .takingcare-item').show();
    })

    $('.minus').on('click',(evt)=>{
        if($('.quantity-value').val()>1) $('.quantity-value').val($('.quantity-value').val()-1)
    })

    $('.flush').on('click',(evt)=>{
        $('.quantity-value').val($('.quantity-value').val()-0+1)
    })

    $('.stars.stars-evaluation i').on('click',(evt)=>{
        $('input.star-input').val(evt.currentTarget.id);
        
        $('.stars.stars-evaluation i').each((i,e)=>{
            $(e).removeClass('fa-solid'); 
            $(e).addClass('fa-regular');
        })

        $(evt.currentTarget).prevUntil().each((i,e)=>{
            $(e).removeClass('fa-regular');
            $(e).addClass('fa-solid'); 
        })
            
        $(evt.currentTarget).removeClass('fa-regular');
        $(evt.currentTarget).addClass('fa-solid'); 
    })
        
</script>
@endpush




