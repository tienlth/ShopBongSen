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
            @include('components.admin.dashboard-header')
            <main>
                <div class="row p-0 m-0">
                    <div class="col-2 p-0">
                        @include('components.admin.dashboard-menu')
                    </div>
                    <div class="col-10 p-0" style="background-color: #F1F9FE;">
                        <div class="p-4" style="min-height: 100vh;">
                            @include('components.alert', ['status'=>'success'])
                            @include('components.alert', ['status'=>'warning'])
                            @include('components.alert', ['status'=>'error'])
                            @yield('content')
                        </div>
                        @include('components.admin.dashboard-footer')
                    </div>
                </div>
            </main>
        </div>

        <script src="https://kit.fontawesome.com/574a825c20.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @stack('script')
        @vite(['resources/js/data-crud.js'])
    </body>
</html>
