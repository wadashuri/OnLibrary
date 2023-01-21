@foreach ($posts as $post)
    <div class="col" style="margin-bottom: 25px">
        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none link-secondary">
            <div class="card h-100">
                <div class="ratio ratio-16x9">
                    <img src="{{ str_replace('youtu.be/', 'i.ytimg.com/vi/', $post->video) }}/hqdefault.jpg"
                        alt="{{ $post->title }}" style="object-fit: cover;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">作者：{{ $post->author }}</h6>
                    @foreach ($post->categories as $category)
                        <p class="card-text">カテゴリー：{{ $category->category }}</p>
                    @endforeach
                </div>
            </div>
        </a>
    </div>
@endforeach
