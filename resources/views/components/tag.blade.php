<div class="component tag me-2 mt-2">
    <span class="badge p-2 rounded-pill position-relative">
        @if($tagContent=='style'){{$currentElement->style}}
        @elseif($tagContent=='producttype'){{$currentElement->producttype}}
        @endif
    </span>
</div>