<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($posts as $post)
        <div class="col" style="margin-bottom: 25px">
            <a href="{{ route('posts.show', $post) }}" class="text-decoration-none link-secondary">
                <div class="card h-100">
                    <div class="ratio ratio-16x9">
                        <img src="{{ str_replace('youtu.be/', 'i.ytimg.com/vi/', $post->video) }}/hq720.jpg"
                            alt="{{ $post->title }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
