@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <p>{{ $title }} </p>
        @forelse($likes as $like)
            <p>{{ $like->user->name }}さんのライブラリ</p>
            <div class="card" style="width: 18rem;">
                {!! $like->video !!}
                <div class="card-body">
                    <h5 class="card-title">{{ $like->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">作者：{{ $like->author }}</h6>
                    <p class="card-text">
                    <form method="post" class="delete" action="{{ route('likes.destroy', $like->id) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除">
                    </form>
                    </p>
                    <a href="{{ route('posts.show', $like) }}" class="btn btn-primary">詳細</a>
                </div>
            </div>
        @empty
            <td>いいねはありません。</td>
        @endforelse
    </div>
@endsection
