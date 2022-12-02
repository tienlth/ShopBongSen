<?php
    $role = Request::get('role');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <div>
            @include('components.header')
            <main>
                @include('components.home-message')
                @include('components.breadcrumb',[
                    'pages'=>[
                        ['name'=>'Trang chủ',
                            'link'=>route('index')]
                    ],
                    'currentPage'=>'Tài khoản'
                ])
                
                <div class="row mb-4" style="margin: 0 40px">
                    <div class="col-2 px-0">
                        @if($role=='user')
                        @include('components.account-user-menu')
                        @elseif($role=='staff')
                        @include('components.account-staff-menu')
                        @endif
                    </div>
                    <div class="col-10 px-4">
                        <div class="account-function">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
            @include('components.footer')
        </div>

        <script src="https://kit.fontawesome.com/574a825c20.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        @stack('script')
    </body>
</html>
