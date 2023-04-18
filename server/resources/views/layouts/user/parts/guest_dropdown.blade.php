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
    </div>
</li>