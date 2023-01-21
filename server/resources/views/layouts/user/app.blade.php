<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-none d-md-block">
            @include('layouts.user.header')
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="fixed-bottom bg-white d-md-none">
            @include('layouts.user.footer')
        </footer>
    </div>
</body>

</html>
