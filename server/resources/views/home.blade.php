@extends('layouts.user.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h3 class="border-bottom" style="margin-top: 10px"><i class="bi bi-hand-thumbs-up"></i>人気の動画本</h3>
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($order_likes as $order_like)
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="Box">
                            <a href="{{ route('post.show', $order_like) }}" class="text-decoration-none link-secondary">
                                <div class="card h-100">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ str_replace('youtu.be/', 'i.ytimg.com/vi/', $order_like->video) }}/hqdefault.jpg"
                                            alt="{{ $order_like->title }}" class="h-100" style="object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $order_like->title }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- 必要に応じてページネーション -->
            <div class="swiper-pagination"></div>
            <!-- 必要に応じてナビボタン -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <h3 class="border-bottom" style="margin-top: 20px"><i class="bi bi-plus-square"></i>新着動画本一覧</h3>
        {{-- ここから動画一覧 --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($posts as $post)
                <div class="col" style="margin-bottom: 25px">
                    <a href="{{ route('post.show', $post) }}" class="text-decoration-none link-secondary">
                        <div class="card h-100">
                            <div class="ratio ratio-16x9">
                                <img src="{{ str_replace('youtu.be/', 'i.ytimg.com/vi/', $post->video) }}/hqdefault.jpg"
                                    alt="{{ $post->title }}" class="h-100" style="object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>検索結果に一致する動画本はありません。</p>
            @endforelse
        </div>
        <div class="text-center">
            <a href="{{ route('search.index') }}" class="btn btn-outline-secondary mb-5">その他の動画本を検索する</a>
        </div>
    </div>
@endsection
