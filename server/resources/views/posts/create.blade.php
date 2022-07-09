@extends('layouts.admin')

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
                            <select name="category" class="content_inquiry_category">
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}" @if (old('category') == $value->id) selected @endif>
                                        {{ $value->category }}</option>
                                @endforeach
                            </select>
                            <div>
                                <label>
                                    タイトル:
                                    <input type="text" name="title">
                                </label>
                                <label>
                                    コメント:
                                    <textarea name="comment" rows="8" cols="40"></textarea>
                                </label>
                            </div>

                            <input type="submit" value="投稿">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
