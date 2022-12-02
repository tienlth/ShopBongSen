@extends('layouts.account')
@section('title', 'Danh sách người nhận')

@section('content')
<div class="account-user-receivers-page">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="m-0">Danh sách người nhận</h5>
        <div class="">
            @include('components.function-btn', [
                'link' => route('account.user.add.receiver'),
                'borderColor' => '#64AAFF',
                'content' => '+ Thêm người nhận',
                'color' => '#64AAFF'
                ])
        </div>
    </div>
    <hr style="margin: 24px -32px">
    <div class="receiver-list">
        @for($i=0; $i<10; $i++)
        @include('components.receiver-info',[
            'name'=>'Nguyễn Văn A',
            'phone'=>'0123223334',
            'address'=>'3/2, Cần Thơ',
            'relation'=>1,
            'birth'=>'1999-02-23'
        ])
        @endfor
    </div>
</div>
@endsection




