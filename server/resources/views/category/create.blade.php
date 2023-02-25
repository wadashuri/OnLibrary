@extends('layouts.admin.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                <h1>{{ $title }}</h1>
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">名前</label>
                        <input type="text" name="category" class="form-control" id="category_name">
                    </div>
                    <button type="submit" class="btn btn-primary">投稿</button>
                </form>
            </div>
        </div>
    </div>
@endsection
