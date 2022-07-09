@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <a href="{{ route('posts.create') }}">新規投稿</a>
                        <table class="table">
                            <tr>
                                <th>名前</th>
                                <th>タイトル</th>
                                <th>いいね</th>
                                <th>詳しく見る</th>
                                <th>カテゴリー</th>
                            </tr>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    @foreach ($post->likes as $like)
                                    @endforeach
                                    @if ($likes->LikeCheck(Auth::user()->id, $post->id))
                                        <td><a class="like-toggle liked" href=""
                                                data-post-id="{{ $post->id }}">♡</a>{{ $post->likes_count }}</td>
                                    @else
                                        <td><a class="like-toggle like" href=""
                                                data-post-id="{{ $post->id }}">♡</a>{{ $post->likes_count }}</td>
                                    @endif
                                    <td>[<a href="{{ route('posts.show', $post) }}">詳細</a>]</td>
                                    @foreach ($post->categories as $category)
                                        <td>{{ $category->category }}</td>
                                </tr>
                            @endforeach
                            @empty
                                <td>書き込みはありません。</td>
                                @endforelse
                            </table>
                            <button id="to-pagetop" class="btn-primary"><a>▲ ページの先頭へ</a></button>
                            <a href="{{ asset('test.jpg') }}" data-lightbox="group"><img src="{{ asset('test.jpg') }}"
                                    width="100" class="border"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
