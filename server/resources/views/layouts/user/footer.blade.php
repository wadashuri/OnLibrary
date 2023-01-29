<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link p-1 py-3 {{ Request::routeIs('home') ? 'active' : '' }}  link-secondary"
            href="{{ route('home') }}"><i class="bi bi-house-door" style="color: gray;"></i>ホーム</a>
    </li>
    <li class="nav-item">
        <a class="nav-link p-1 py-3 link-secondary {{ Request::routeIs('search.index') ? 'active' : '' }}"
            href="{{ route('search.index') }}"><i class="bi bi-search" style="color: gray;"></i>検索</a>
    </li>
    <li class="nav-item">
        @guest
            <a class="nav-link p-1 py-3 link-secondary {{ Request::routeIs('likes.index') ? 'active' : '' }}"
                onclick="if(!confirm('ログインが必要です、移動しますか？')) return false;"
                href="{{ route('likes.index') }}"><i class="bi bi-book" style="color: gray;"></i>ライブラリ</a>
        @else
            <a class="nav-link p-1 py-3 link-secondary {{ Request::routeIs('likes.index') ? 'active' : '' }}"
                href="{{ route('likes.index') }}"><i class="bi bi-book" style="color: gray;"></i>ライブラリ</a>
        @endguest
    </li>
    <li class="nav-item dropdown">
        @guest
        <a class="nav-link p-1 py-3 dropdown-toggle link-secondary" data-bs-toggle="dropdown"
            href="#" role="button" aria-expanded="false">
            <i class="bi bi-door-open" style="color: gray;"></i>
            会員登録
        </a>
        @else
        <a class="nav-link p-1 py-3 dropdown-toggle link-secondary" data-bs-toggle="dropdown"
            href="#" role="button" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
            {{ Auth::user()->name }}
        </a>
        @endguest
        <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item" href="{{ route('register') }}"><i
                        class="bi bi-door-open"></i>{{ __('Register') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('login') }}"><i
                        class="bi bi-box-arrow-in-right"></i>{{ __('Login') }}</a></li>
            @endguest
            <li>
                @can('isAdmin')
                <a class="dropdown-item" href="{{ route('posts.index') }}">
                <i class="bi bi-gear"></i>
                管理者画面
            </a>
        @endcan
            </li>
            <li><a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                    href="{{ url('/service/privacy-policy/') }}"><i class="bi bi-card-text"></i>
                    プライバシーポリシー</a></li>
            <li><a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                    href="{{ url('/service/お問い合わせ/') }}"><i class="bi bi-chat"></i>
                    お問合わせ</a></li>
            <li><a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
                    href="{{ url('/service/onlibraryの使い方/') }}"><i class="bi bi-filter-square"></i>
                    OnLibraryとは</a></li>
            <hr class="dropdown-divider">
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    {{ __('Logout') }}
                </a>
            </li>
        </ul>
    </li>
</ul>