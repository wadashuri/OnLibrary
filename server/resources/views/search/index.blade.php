@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card" style="margin-bottom: 10px">
        <div class="card-body">
            <form class="d-flex" method="GET" action="{{ route('search.index') }}">
                <a href="{{ route('home') }}"><button class="btn btn-outline-secondary" type="button">＜</button></a>
                <input class="form-control me-2" type="search" name="search" placeholder="検索キーワードを入力"
                    value="@if (isset($search)) {{ $search }} @endif">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
        <div class="card-footer">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                絞り込み検索
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">絞り込み検索</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="GET" action="{{ route('search.index') }}" class="text-decoration-none link-secondary">
                                    <div class="form-group">
                                        <label class="control-label">カテゴリー</label>
                                        @foreach ($categories as $value)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="category[]" value="{{ $value->id }}"
                                                    {{ in_array(strval($value->id), $category) ? 'checked' : '[]' }}>
                                                <label class="custom-control-label"
                                                    for="custom-check-1">{{ $value->category }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">BookTuber</label>
                                        @foreach ($book_tuber_categories as $value)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="book_tuber_category[]"
                                                    value="{{ $value->id }}"
                                                    {{ in_array(strval($value->id), $book_tuber_category) ? 'checked' : '[]' }}>
                                                <label class="custom-control-label"
                                                    for="custom-check-1">{{ $value->book_tuber_category }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">閉じる</button>
                                        <input type="submit" class="btn btn-primary" value="検索">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='list' data-url="searchAjaxAddPost" data-search="{{ $search }}"
        data-category_string="{{ $category_string }}" data-book_tuber_category_string="{{ $book_tuber_category_string }}">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($posts as $post)
                <div class="col" style="margin-bottom: 25px">
                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none link-secondary">
                        <div class="card h-100">
                            <div class="ratio ratio-16x9">
                                <img src="{{ str_replace('youtu.be/', 'i.ytimg.com/vi/', $post->video) }}/hq720.jpg"
                                    alt="{{ $post->title }}">
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
            @empty
                <p>検索結果に一致する動画本はありません。</p>
            @endforelse
        </div>
    </div>
@endsection
