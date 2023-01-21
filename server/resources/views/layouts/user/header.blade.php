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
            @guest
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('likes.index') }}"
                        onclick="if(!confirm('ログインが必要です、移動しますか？')) return false;"><i
                            class="bi bi-book"></i>ライブラリ</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('likes.index') }}"><i
                            class="bi bi-book"></i>ライブラリ</a>
                </li>
            @endguest
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @include('layouts.user.parts.guest_dropdown')
            @else
            @include('layouts.user.parts.not_guest_dropdown')
            @endguest
        </ul>
    </div>
</div>