@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post) }}">
                            @csrf
                            @method('patch')
                            <div>
                                <ul>
                                    <li>
                                        YouTube動画リンク:<br>
                                        <textarea name="video" rows="8" cols="40">{{ $post->video }}</textarea>
                                    </li>
                                    <li>
                                        タイトル:
                                        <input type="text" name="title" value=" {{$post->title}}">
                                    </li>
                                    <li>
                                        作者:
                                        <input type="text" name="author" value=" {{$post->author}}">
                                    </li>
                                    <li>
                                        コメント:<br>
                                        <textarea name="comment" rows="8" cols="40">{{ $post->comment }}</textarea>
                                    </li>
                                    <li>
                                        アフィリエイトリンク:
                                        <input type="text" name="affiliate" value=" {{$post->affiliate}}">
                                    </li>
                                </ul>
                            <select name="category_id" class="content_inquiry_category">
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}" @if (old('category') == $value->id) selected @endif>
                                        {{ $value->category }}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="更新">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
