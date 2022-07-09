@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <p>{{ $title }} </p>
                        @forelse($likes as $like)
                            <p>{{ $like->user->name }}{{ $like->comment }}</p>
                            <form method="post" class="delete" action="{{ route('likes.destroy', $like->id) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="削除">
                            </form>
                        @empty
                            <td>いいねはありません。</td>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
