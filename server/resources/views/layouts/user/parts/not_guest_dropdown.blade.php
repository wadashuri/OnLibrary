<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="bi bi-person-fill"></i>
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
            href="{{ url('/service/privacy-policy/') }}" target="_blank"
            rel="noopener noreferrer">
            <i class="bi bi-card-text"></i>
            プライバシーポリシー
        </a>
        <a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
            href="{{ url('/service/お問い合わせ/') }}" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-chat"></i>
            お問合わせ
        </a>
        <a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
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