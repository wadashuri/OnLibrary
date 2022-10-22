<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($posts as $post)
        <div class="col" style="margin-bottom: 25px">
            <div class="card h-100">
                <div class="ratio ratio-16x9">
                    <iframe width="260" height="115"
                        src="{{ str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $post->video) }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">作者：{{ $post->author }}</h6>
                    @foreach ($post->categories as $category)
                        <p class="card-text">カテゴリー：{{ $category->category }}</p>
                    @endforeach
                </div>
                <div class="card-footer">
                    <small class="text-muted"><a href="{{ route('posts.show', $post) }}"
                            class="btn btn-primary">詳細</a></small>
                </div>
            </div>
        </div>
    @endforeach
</div>