<?php
    $role = Request::get('role');
?>
<header class="admin-header">
    <nav class="navbar navbar-expand-lg row ">
        <div class="col">
            <a class="navbar-brand logo" href="{{route('index')}}"><img src="/imgs/share/logo.png" width="70" height="45"
                height="60" alt="">
            </a>
        </div>

        <div class="nav-item col-2">
            <a href={{route('dashboard-home.index')}}><h6 class="mb-0">Trang quản trị</h6></a>
        </div>

        <div class="search col-6">
            <form class="d-flex" role="search">
                <input class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="ms-3 me-4 search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="nav-item username-links position-relative d-flex align-items-center col">
            <a class="nav-link ps-0 username" href="#">{{Auth::user()->username}}</a>
            <div class="position-absolute collapse" id="account_function">
                <ul class="list-group mt-2">
                    <li class="list-group-item p-0">
                        <form action={{route('logout')}} method="POST">@csrf<button type="submit"
                                class="w-100 text-start">Đăng xuất</button>
                        </form>
                    </li>
                    {{-- <li class="list-group-item p-0"><a class="w-100 d-block" href="{{ route('') }}"><button class="text-start p-0">Đổi mật khẩu</button></a></li> --}}
                </ul>
            </div>
        </div>

        <div class="col d-flex">
            <a class="nav-link mx-3" href="#"><i class="fa-solid fa-gear"></i></a>
            <a class="nav-link mx-3" href="#"><i class="fa-regular fa-bell"></i></a>
        </div>
    </nav>
</header>