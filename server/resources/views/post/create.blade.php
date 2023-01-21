@extends('layouts.admin.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <h3>本カテゴリー</h3>
                            <select name="category" class="content_inquiry_category">
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}" @if (old('category') == $value->id) selected @endif>
                                        {{ $value->category }}</option>
                                @endforeach
                            </select>
                            <h3>BookTuberカテゴリー</h3>
                            <select name="booktuber" class="booktuber">
                                @foreach ($book_tuber_categories as $value)
                                <option value="{{ $value->id }}" @if (old('booktuber') == $value->id) selected @endif>
                                    {{ $value->book_tuber_category }}</option>
                                    @endforeach
                            </select>
                            <div>
                                <ul>
                                    <li>
                                        YouTube動画リンク:<br>
                                        <textarea name="video" rows="8" cols="40"></textarea>
                                    </li>
                                    <li>
                                        タイトル:
                                        <input type="text" name="title">
                                    </li>
                                    <li>
                                        作者:
                                        <input type="text" name="author">
                                    </li>
                                    <li>
                                        コメント:<br>
                                        <textarea name="comment" rows="8" cols="40"></textarea>
                                    </li>
                                    <li>
                                        アフィリエイトリンク:
                                        <input type="text" name="affiliate">
                                    </li>
                                </ul>
                            </div>

                            <input type="submit" value="投稿">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
