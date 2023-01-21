<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @include('layouts.guest.header')
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>