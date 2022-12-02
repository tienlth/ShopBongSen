<div class="account-staff-funtion-filter component">
    <div class="mb-3">
        @include('components.admin.search-input-data', [
            'routeName'=>$routeName,
            'placeholder'=>'Tìm kiếm đơn hàng'
        ])
    </div>
    <div class="row mb-3" style="margin-right: -40px;">
        @include('components.admin.date-filter', ['routeName'=>$routeName])
    </div>
    <hr style="margin-left: -32px; margin-right: -32px;">
</div>