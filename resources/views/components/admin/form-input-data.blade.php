<div class="mb-3">
    <label for="" class="form-label">{{$label}}</label>
    @if($type=='checkbox') <br><label class="ms-3" for="">Nam</label> @endif
    <input @if(isset($disabled) && $disabled){{'disabled'}}@endif type={{$type}} name={{$name}} @if($type=='file') class="form-control img-upload" @elseif($type!='checkbox') required class="form-control" id="" value='@if(isset($currentElement)){{$currentElement[$currentValueProp]}}@endif' @else @if(isset($currentElement[$currentValueProp]) && $currentElement[$currentValueProp]) class="ms-2 no-work" style="height: 16px; width: 16px;" checked @endif @endif>
    @include('components.error-mess', ['field'=>$name])
</div>