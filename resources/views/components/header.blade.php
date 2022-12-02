<?php
    $path=url()->full();
    $role = Request::get('role');
?>
<header class='user-header @if(isset($_SESSION['header']) && $_SESSION['header']=='transparent'){{'header-transparent'}}@endif'>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="{{route('index')}}"><img src="/imgs/share/logo.png" width="100" height="60" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav links">
                    <li class="nav-item">
                        <a class="nav-link @if($path==route('index')){{'active'}}@endif" href="{{route('index')}}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($path==route('introduction.index')){{'active'}}@endif" href="{{route('introduction.index')}}">Giới thiệu</a>
                    </li>
                    <li class="nav-item menu">
                        <a class="nav-link @if(strpos($path, '/products')){{'active'}}@endif" href="{{route('products.index')}}">Sản phẩm</a>
                        <div class="submenu">
                            <ul>
                                @foreach($producttypes as $type)
                                    <li><a class="submenu-item" href={{route('products.index',['type-filter'=>$type->id])}}>{{$type->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($path==route('contact.index')){{'active'}}@endif" href="{{route('contact.index')}}">Liên hệ</a>
                    </li>
                    
                </ul>
            </div>

            <div class="collapse" id="search">
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Search">
                  </form>
            </div>

            <ul class="navbar-nav icons">
                @if(Auth::id() && $role=='user' || !Auth::id())
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#search" role="button" aria-expanded="false" aria-controls="search"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                @endif

                <li class="nav-item username-links position-relative d-flex align-items-center">
                    @auth
                    <a class="nav-link ps-0 username" href={{route('account')}}>{{Auth::user()->username}}
                        <span style="color: #0667a0"> @if($role=='staff'){{'(Nhân viên)'}}@elseif($role=='admin'){{'(Admin)'}}@endif</span>
                    </a>
                    @else
                    <a class="nav-link ps-0"><i class="fa-regular fa-user"></i></a>
                    @endauth

                    <div class="position-absolute collapse" id="account_function">
                        <ul class="list-group">
                            @auth
                            <li class="list-group-item p-0"><form action={{route('logout')}} method="POST">@csrf<button type="submit" class="w-100 text-start">Đăng xuất</button></form></li>
                            @else
                            <li class="list-group-item p-0"><a class="w-100 d-block" href="{{ route('register') }}">Đăng ký</a></li>
                            <li class="list-group-item p-0"><a class="w-100 d-block" href="{{ route('login') }}">Đăng nhập</a></li>
                            @endauth
                        </ul>
                    </div>
                </li>

                @if(Auth::id() && $role=='user' || !Auth::id())
                <li class="nav-item">
                    <a class="nav-link" href={{route('cart.index')}}><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
                @endif

                <li class="nav-item">
                    @if(Auth::id() && $role=='admin')
                    <a class="nav-link" href={{route('dashboard-home.index')}}><button type="button" class="btn btn-outline-success">Trang quản trị</button></a>
                    @else
                    <a class="nav-link" href="#"><i class="fa-regular fa-bell"></i></a>
                    @endif
                </li>

            </ul>
        </div>
    </nav>
</header>
