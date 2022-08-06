@extends('layouts.app')

@section('title', $title)

@section('content')
    <h3 style="margin-top: 10px">動画本一覧</h3>
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
@endsection
