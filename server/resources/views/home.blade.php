@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h3>人気の動画本</h3>
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($order_likes as $order_like)
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="Box">
                            <div class="card-group">
                                <div class="ratio ratio-16x9">
                                    {!! $order_like->video !!}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $order_like->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">作者：{{ $order_like->author }}</h6>
                                    @foreach ($order_like->categories as $category)
                                        <p class="card-text">カテゴリー：{{ $category->category }}</p>
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><a href="{{ route('posts.show', $order_like->id) }}"
                                            class="btn btn-primary">詳細</a></small>
                                </div>
                            </div>
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

        <h3 style="margin-top: 10px">新着動画本一覧</h3>
        {{-- ここから動画一覧 --}}
        <div id='list'>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse($posts as $post)
                    <div class="col" style="margin-bottom: 25px">
                        <div class="card h-100">
                            <div class="ratio ratio-16x9">
                                {!! $post->video !!}
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
                @empty
                    <p>検索結果に一致する動画本はありません。</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
