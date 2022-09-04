@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', $categories) }}">
                    @csrf
                    @method('patch')
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">カテゴリー名</th>
                                <td><input type="text" name="category" value="{{ $categories->category }}"></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection