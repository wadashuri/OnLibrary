<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link link-dark" href="{{ route('post.index') }}">
            <span class="text-secondary"></span>
            投稿一覧
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link link-dark" href="{{ route('category.index') }}">
            <span class="text-secondary"></span>
            カテゴリー一覧
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link link-dark" href=""
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            <span class="text-secondary"></span>
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    </nav>
</ul>
