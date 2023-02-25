@extends('layouts.admin.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <h3 class="card-title mb-0">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="category">本カテゴリー</label>
                                <select name="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="booktuber">BookTuberカテゴリー</label>
                                <select name="booktuber" class="form-control">
                                    @foreach ($book_tuber_categories as $booktuber)
                                        <option value="{{ $booktuber->id }}"
                                            {{ old('booktuber') == $booktuber->id ? 'selected' : '' }}>
                                            {{ $booktuber->book_tuber_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="video">YouTube動画リンク</label>
                                <input type="text" name="video" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="author">作者</label>
                                <input type="text" name="author" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="comment">コメント</label>
                                <textarea name="comment" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="affiliate">アフィリエイトリンク</label>
                                <input type="text" name="affiliate" class="form-control">
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-block w-100">投稿</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
