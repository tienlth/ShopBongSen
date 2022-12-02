<form action={{route($routeName)}} class="row my-3 d-flex ps-3 align-items-center">
    <div class="col-1"><i class="fa-solid fa-filter"></i> Lọc</div>
    <div class="col-4 row">
        <span class="col-2 d-flex align-items-center">Từ</span>
        <div class="col-10">
            @if(isset(\Request::query()['from']))
            @include('components.datepicker',['required'=>true, 'name'=>'from', 'date'=>\Request::query()['from']])
            @else
            @include('components.datepicker',['required'=>true, 'name'=>'from'])
            @endif
        </div>
    </div>
    <div class="col-4 row">
        <span class="col-2 d-flex align-items-center">Đến</span>
        <div class="col-10">
            @if(isset(\Request::query()['to']))
            @include('components.datepicker',['required'=>true, 'name'=>'to', 'date'=>\Request::query()['to']])
            @else
            @include('components.datepicker',['required'=>true, 'name'=>'to'])
            @endif
        </div>
    </div>
    <div class="col-1 "></div>
    <div class="col-2 ps-4"><button style="min-width: 160px" type="submit" class="btn btn-success">Áp dụng</button></div>
</form>