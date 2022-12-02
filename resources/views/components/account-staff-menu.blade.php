<?php
    $path=url()->full();
?>

<div class="menu-user component p-0">
    <ul class="list-group p-0">
        <li class=@if(strpos($path, '/account-staff-info')){{"active"}}@endif><a href={{route('account-staff-info.index')}}>Thông tin tài khoản</a></li>
        <li class=@if(strpos($path, '/account-staff-turnover')){{"active"}}@endif><a href={{route('account-staff-turnover.index')}}>Thống kê doanh thu</a></li>
        <li class=@if(strpos($path, '/account-staff-orders')){{"active"}}@endif><a href={{route('account-staff-orders.index')}}>Thống kê đơn hàng</a></li>
        <hr>
        <li class=@if($path==route('account.changepassword')){{"active"}}@endif><a href={{route('account.changepassword')}}>Đổi mật khẩu</a></li>
        <li><form action={{route('logout')}} method="POST">@csrf<button type="submit" class="w-100 text-start">Đăng xuất</button></form></li>
      </ul>
</div>