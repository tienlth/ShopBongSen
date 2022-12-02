<div class="user-event-frame component mb-4 p-0 ">
    <div class="d-flex align-items-center justify-content-between py-3 px-4" style="background-color: #f2f2ff">
        <h5 class="m-0" style="color: #FB8A8A">{{$name}}<span style="color: #8F97D1;">({{$relation}})</span></h5>
        <div class="">
            @include('components.function-btn', [
                'link' => route('account.user.add.event'),
                'borderColor' => '#64AAFF',
                'content' => '+ Thêm sự kiện',
                'color' => '#64AAFF'
                ])
        </div>
    </div>
    <hr style="margin: 16px 0px;" class="mt-0">
    <div class="event-list px-4 pb-2">
        @foreach($events as $event)
        @include('components.event', ['event'=>$event])
        @endforeach
    </div>
</div>