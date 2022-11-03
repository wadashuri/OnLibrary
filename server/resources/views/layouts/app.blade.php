<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- scripts-->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>

    <!-- BootstrapのJavascript読み込み -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HRK5SDJKJ1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HRK5SDJKJ1');
    </script>
</head>

<body>
    <div id="app">
        @if (empty(strstr(url()->current(), 'search')))
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('home') }}"><i
                                        class="bi bi-house-door"></i>ホーム</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('search.index') }}"><i
                                        class="bi bi-search"></i>検索</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('likes.index') }}"><i
                                        class="bi bi-book"></i>ライブラリ</a>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="bi bi-door-open"></i>{{ __('Register') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('register') }}"><i
                                                class="bi bi-door-open"></i>{{ __('Register') }}</a>
                                        <a class="dropdown-item" href="{{ route('login') }}"><i
                                                class="bi bi-box-arrow-in-right"></i>{{ __('Login') }}</a>
                                        <a class="dropdown-item"
                                            onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                                            href="{{ url('/service/privacy-policy/') }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="bi bi-card-text"></i>
                                            プライバシーポリシー
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                                            href="{{ url('/service/お問い合わせ/') }}" target="_blank" rel="noopener noreferrer">
                                            <i class="bi bi-chat-right-text"></i>
                                            お問合わせ
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                                            href="{{ url('/service/onlibraryの使い方/') }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="bi bi-filter-square"></i>
                                            OnLibraryとは
                                        </a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="bi bi-person-fill"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        {{-- あとで実装 --}}
                                        {{-- <a class="dropdown-item" href="{{ route('categories.index') }}">
                                        マイページ
                                    </a> --}}
                                        <a class="dropdown-item"
                                            onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                                            href="{{ url('/service/privacy-policy/') }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="bi bi-card-text"></i>
                                            プライバシーポリシー
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                                            href="{{ url('/service/お問い合わせ/') }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="bi bi-chat"></i>
                                            お問合わせ
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                                            href="{{ url('/service/onlibraryの使い方/') }}" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="bi bi-filter-square"></i>
                                            OnLibraryとは
                                        </a>
                                        @can('isAdmin', Auth::user())
                                            <a class="dropdown-item" href="{{ route('posts.index') }}">
                                                <i class="bi bi-gear"></i>
                                                管理者画面
                                            </a>
                                        @endcan
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-left"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="fixed-bottom bg-white">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link link-secondary" href="{{ route('home') }}"><i
                            class="bi bi-house-door"></i>ホーム</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary" href="{{ route('search.index') }}"><i
                            class="bi bi-search"></i>検索</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary" href="{{ route('likes.index') }}"><i
                            class="bi bi-book"></i>ライブラリ</a>
                </li>
            </ul>
        </footer>
    </div>
</body>

</html>
