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
                                <label>
                                    タイトル:
                                    <input type="text" name="title" value=" {{$post->title}}">
                                </label>
                                <label>
                                    コメント:
                                    <input type="text" name="comment" value="{{ $post->comment }}">
                                </label>
                            </div>
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
