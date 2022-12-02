<div class="order-status component d-flex">
    @if($status==1)
    <span class="text-primary">Đã nhận</span>
    @elseif($status==2)
    <span class="text-warning">Đang giao</span>
    @elseif($status==3)
    <span class="text-success">Đã giao</span>
    @elseif(isset($role) && $role=='staff')
        <label class="me-3">Trạng thái: </label> 
        <select class=" form-select w-50" aria-label="Default select example">
            <option @if($status==1){{'selected'}}@endif value="1">Đã nhận</option>
            <option @if($status==2){{'selected'}}@endif value="2">Đang giao</option>
            <option @if($status==3){{'selected'}}@endif value="3">Đã giao</option>
        </select>
    @endif
</div>