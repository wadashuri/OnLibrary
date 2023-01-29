@extends('layouts.user.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="card-body m-2">
            <form class="d-flex" method="GET" action="{{ route('search.index') }}">
                <input class="form-control me-2" type="search" name="search" placeholder="検索キーワードを入力"
                    value="@if (isset($search)) {{ $search }} @endif">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary mt-2" type="submit" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                絞り込み検索
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">絞り込み検索</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="GET" action="{{ route('search.index') }}"
                                class="text-decoration-none link-secondary">
                                <div class="form-group">
                                    <label class="control-label">カテゴリー</label>
                                    @foreach ($categories as $value)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="category[]" value="{{ $value->id }}"
                                                {{ in_array(strval($value->id), $category) ? 'checked' : '[]' }}>
                                            <label class="custom-control-label"
                                                for="custom-check-1">{{ $value->category }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label class="control-label">BookTuber</label>
                                    @foreach ($book_tuber_categories as $value)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="book_tuber_category[]" value="{{ $value->id }}"
                                                {{ in_array(strval($value->id), $book_tuber_category) ? 'checked' : '[]' }}>
                                            <label class="custom-control-label"
                                                for="custom-check-1">{{ $value->book_tuber_category }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                    <input type="submit" class="btn btn-primary" value="検索">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id='list' data-url="searchAjaxAddPost" data-search="{{ $search }}"
            data-category_string="{{ $category_string }}"
            data-book_tuber_category_string="{{ $book_tuber_category_string }}">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @include('search.include.parts.foreach', ['posts' => $posts])
            </div>
        </div>
    </div>
@endsection
