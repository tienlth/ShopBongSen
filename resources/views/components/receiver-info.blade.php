<div class="receiver-info component row pb-0 mb-3">
    <div class="col-11">
        <div class="row">
            <div class="col">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 pe-0 col-form-label">Họ tên:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" value="{{$name}}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 pe-0 col-form-label">Quan hệ:</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="Default select example">
                            <option>--Quan hệ--</option>
                            <option @if($relation==1) {{'selected'}}@endif value="1">Bạn bè</option>
                            <option @if($relation==2) {{'selected'}}@endif value="2">Người thân</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 pe-0 col-form-label">Điện thoại:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" value="{{$phone}}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 pe-0 col-form-label">Ngày sinh:</label>
                    <div class="col-sm-9">
                        @include('components.datepicker',['date'=>$birth])
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3 d-flex">
                    <label for="" class="pe-0 col-form-label" style="min-width: 97px;">Địa chỉ:</label>
                    <input type="text" class="form-control" id="" value="{{$address}}">
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