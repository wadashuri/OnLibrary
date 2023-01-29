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
                    <table class="table">
                        <tbody>
                            <th>名前</th>
                            </tr>
                            <tr>
                                <td><input type="name" name="category"></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection
