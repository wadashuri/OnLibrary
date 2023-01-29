@extends('layouts.admin.app')

@section('title', $title)

@section('content')
@include('include.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <a href="{{ route('post.create') }}">新規投稿</a>
                        <table class="table">
                            <tr>
                                <th>名前</th>
                                <th>タイトル</th>
                                <th>コメント</th>
                                <th>編集を加える</th>
                                <th>削除する</th>
                                <th>本カテゴリー</th>
                                <th>BookTuberカテゴリー</th>
                            </tr>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! nl2br(e($post->comment)) !!}</td>
                                    <td>[<a href="{{ route('post.edit', $post) }}">編集</a>]</td>
                                    <td>
                                        <form method="post" class="delete" action="{{ route('post.destroy', $post) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="削除">
                                        </form>
                                    </td>
                                    @foreach ($post->categories as $category)
                                        <td>{{ $category->category }}</td>
                                    @endforeach
                                    @foreach ($post->book_tuber_categories as $book_tuber_category)
                                        <td>{{ $book_tuber_category->book_tuber_category }}</td>
                                    @endforeach
                                </tr>
                            @empty
                            書き込みはありません。
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- paginator --}}
    {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
@endsection
