@extends('layouts.admin.app')

@section('title', $title)

@section('content')
    
    <div class="container">
        @include('include.alert')
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('category.update', $categories) }}">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="category" class="form-label">カテゴリー名</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $categories->category }}">
                    </div>
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>

@endsection
