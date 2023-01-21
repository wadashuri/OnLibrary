<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            @include('layouts.admin.header')
        </header>
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        @include('layouts.admin.sidebar')
                    </nav>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
