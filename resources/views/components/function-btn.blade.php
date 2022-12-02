<a class="function-btn component" @if(isset($link)){{'href='}}{{$link}}@endif>
    <button type="button" @if(isset($disabled)){{'disabled'}}@endif class="btn" style="border-color: {{$borderColor}}; color: {{$color}}; @if(isset($bgc))background: {{$bgc}}@endif;">
        <div class="function-btn-content">@if(isset($icon))<i class='{{$icon}} me-2'></i>@endif{{$content}}</div>
    </button>
</a>