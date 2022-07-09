@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <a href="{{ route('posts.index') }}">戻る</a>
                        <ul>
                            <li>{{ $post->comment }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
