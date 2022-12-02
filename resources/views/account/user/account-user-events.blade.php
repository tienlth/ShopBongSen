@extends('layouts.account')
@section('title', 'Danh sách sự kiện')

@section('content')
<div class="account-user-receivers-page">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="m-0">Danh sách sự kiện</h5>
    </div>
    <hr style="margin: 24px -32px">
    <div class="receiver-list">
        @for($i=0; $i<3; $i++)
        @include('components.user-events-frame',[
            'name'=>'Nguyễn Văn A',
            'relation'=>'Bạn bè',
            'events'=>[
                [
                    'type'=>1,
                    'date'=>'2022-12-25',
                    'note'=>'Noel'
                ]
            ]

        ])
        @endfor
    </div>
</div>
@endsection




