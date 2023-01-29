@extends('layouts.admin.app')

@section('title', $title)

@section('content')

    @include('include.alert')

    <div class="container">
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                <a href="{{ route('category.create') }}">新規投稿</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($categories as $value)
                            <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->category }}</td>
                                <td><a href="{{ route('category.edit', $value) }}">編集</a>/
                                    <form method="post" class="delete" action="{{ route('category.destroy', $value) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="削除">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- paginator --}}
    {{ $categories->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
@endsection
