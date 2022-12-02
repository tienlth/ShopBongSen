<div class="flower-used-item d-flex justify-content-between row component">
    <div class="col-5 row">
        <label class="col col-form-label" for="">Loại hoa</label>
        <select class="col form-select w-100">
            <option selected>-- Loại hoa --</option>
            <option value="1">Hoa cẩm chướng</option>
            <option value="2">Hoa hồng</option>
        </select>
    </div>
    <div class="col-5 row">
        <label class="col col-form-label" for="">Số lượng</label>
        <div class="col">
            <input type="number" class="form-control" id="">
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