@extends('layouts.admin.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              @include('include.alert')
                <div class="card border-secondary">
                    <div class="card-header text-white bg-dark">{{ $title }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.update', $post) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="video-link">YouTube動画リンク</label>
                                <input type="text" id="video-link" class="form-control" name="video"
                                    value="{{ $post->video }}" required>
                            </div>
                            <div class="form-group">
                                <label for="post-title">タイトル</label>
                                <input type="text" id="post-title" class="form-control" name="title"
                                    value="{{ $post->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="author">作者</label>
                                <input type="text" id="author" class="form-control" name="author"
                                    value="{{ $post->author }}" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">コメント</label>
                                <textarea id="comment" class="form-control" name="comment" rows="8" required>{{ $post->comment }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="affiliate-link">アフィリエイトリンク</label>
                                <input type="text" id="affiliate-link" class="form-control" name="affiliate"
                                    value="{{ $post->affiliate }}">
                            </div>
                            <div class="form-group">
                                <label for="category">本カテゴリー</label>
                                <select id="category" name="category_id" class="form-control">
                                    <option value="">選択してください</option>
                                    @foreach ($categories as $value)
                                        <option value="{{ $value->id }}"
                                            @if ($post->category_id == $value->id) selected @endif>{{ $value->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="booktuber-category">BookTuberカテゴリー</label>
                                <select id="booktuber-category" name="booktuber_category_id" class="form-control">
                                    <option value="">選択してください</option>
                                    @foreach ($book_tuber_categories as $value)
                                        <option value="{{ $value->id }}"
                                            @if ($post->booktuber_category_id == $value->id) selected @endif>
                                            {{ $value->book_tuber_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary w-100">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
