@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ホーム') }}</div>

                    <h5 class="card-title">新着動画本</h5>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- スライダーのコンテナ -->
                        <div class="swiper">
                            <!-- 必要に応じたwrapper -->
                            <div class="swiper-wrapper">
                                <!-- スライド -->
                                <div class="swiper-slide">Slide 1</div>
                                <div class="swiper-slide">Slide 2</div>
                                <div class="swiper-slide">Slide 3</div>
                            </div>
                            <!-- 必要に応じてページネーション -->
                            <div class="swiper-pagination"></div>
                            <!-- 必要に応じてナビボタン -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <h3>動画本一覧</h3>
                {{-- ここから動画一覧 --}}
                @forelse($posts as $post)
                    <div class="card" style="width: 262px;">
                        {!! $post->video !!}
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">作者：{{ $post->author }}</h6>
                            @foreach ($post->likes as $like)
                            @endforeach
                            @if ($likes->LikeCheck(Auth::user()->id, $post->id))
                                <p class="card-text">ライブラリへ追加：<a class="like-toggle liked" href=""
                                        data-post-id="{{ $post->id }}">♡</a>{{ $post->likes_count }}</p>
                            @else
                                <p class="card-text">ライブラリへ追加：<a class="like-toggle like" href=""
                                        data-post-id="{{ $post->id }}">♡</a>{{ $post->likes_count }}</p>
                            @endif
                            @foreach ($post->categories as $category)
                                <p class="card-text">カテゴリー：{{ $category->category }}</p>
                            @endforeach
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                @empty
                    <td>書き込みはありません。</td>
                @endforelse
            </div>
        </div>
    </div>
@endsection
