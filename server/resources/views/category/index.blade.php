@extends('layouts.admin.app')

@section('title', $title)

@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                @include('include.alert')

                <div class="card mt-4">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('category.create') }}" class="btn btn-primary">新規投稿</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-2">ID</th>
                                        <th class="col-6">名前</th>
                                        <th class="col-4">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $value)
                                        <tr>
                                            <th scope="row">{{ $value->id }}</th>
                                            <td>{{ $value->category }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $value) }}" class="btn btn-primary btn-sm">編集</a>
                                                <form method="post" class="delete d-inline" action="{{ route('category.destroy', $value) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="削除" class="btn btn-danger btn-sm">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- paginator --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $categories->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection