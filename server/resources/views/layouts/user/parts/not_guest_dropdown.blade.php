<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="bi bi-person-fill"></i>
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        @can('isAdmin')
        <a class="dropdown-item" href="{{ route('post.index') }}">
            <i class="bi bi-gear"></i>
            管理者画面
        </a>
        @endcan
        <a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
            href="https://sinceritylab.com/privacy-policy/" target="_blank"
            rel="noopener noreferrer">
            <i class="bi bi-card-text"></i>
            プライバシーポリシー
        </a>
        <a class="dropdown-item" onclick="if(!confirm('外部サイトへ移動します、よろしいですか？')) return false;"
            href="https://sinceritylab.com/%e3%81%8a%e5%95%8f%e3%81%84%e5%90%88%e3%82%8f%e3%81%9b/" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-chat"></i>
            お問合わせ
        </a>
        <hr class="dropdown-divider">
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