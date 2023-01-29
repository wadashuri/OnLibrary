@extends('layouts.user.app')

@section('title', $title)

@section('content')
    <div class="container">
        @include('include.alert')
        <h3 class="border-bottom"><i class="bi bi-book"></i>{{ $title }} </h3>
        <div id="list" data-url="likeAjaxAddPost">
            <div class="row row-cols-2 row-cols-md-3">
                @include('like.include.parts.foreach', ['likes' => $likes])
            </div>
        </div>
    </div>
@endsection
