<div class="event component row mb-3">
    <div class="col-11">
        <div class="row mb-3">
            <div class="col row">
                <label for="" class="col-sm-2 pe-0 col-form-label">Sự kiện:</label>
                <div class="col-sm-6">
                    <select class="form-select" aria-label="Default select example">
                        <option>--Sự kiện--</option>
                        <option @if($event['type']==1){{'selected'}}@endif value="1">Sinh nhật</option>
                        <option @if($event['type']==2){{'selected'}}@endif value="2">Kỉ niệm ...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col row">
                <label for="" class="col-sm-2 pe-0 col-form-label">Thời gian:</label>
                <div class="col-sm-6">
                    @include('components.datepicker',['date'=>$event['date']])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col row">
                <div class="col-sm">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$event['note']}}</textarea>
                        <label for="floatingTextarea2">Ghi chú</label>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-1">
        @include('components.function-btn', [
            'borderColor' => '#FF0000',
            'content' => 'Xóa',
            'color' => '#FF0000'
        ])
    </div>
</div>