@extends('layouts.admin.app')

@section('title', $title)

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                @include('include.alert')

                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('post.create') }}" class="btn btn-primary">新規投稿</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>名前</th>
                                <th>タイトル</th>
                                <th>コメント</th>
                                <th>アフィリエイトリンク</th>
                                <th>編集</th>
                                <th>削除</th>
                                <th>本カテゴリー</th>
                                <th>BookTuberカテゴリー</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! nl2br(e($post->comment)) !!}</td>
                                    <td>{{ $post->affiliate ? 'あり':'なし'; }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-primary">編集</a>
                                    </td>
                                    <td>
                                        <form method="post" class="delete" action="{{ route('post.destroy', $post) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('本当に削除しますか？')">削除</button>
                                        </form>
                                    </td>
                                    <td>
                                        @foreach ($post->categories as $category)
                                            <span class="badge bg-primary">{{ $category->category }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($post->book_tuber_categories as $book_tuber_category)
                                            <span
                                                class="badge bg-secondary">{{ $book_tuber_category->book_tuber_category }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">書き込みはありません。</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- paginator --}}
    <div class="d-flex justify-content-center my-3">
        {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
    </div>

@endsection
