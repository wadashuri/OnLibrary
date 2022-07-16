@extends('layouts.app')

@section('title')

@section('content')
    <div class="container">
        <h1>最近追加した動画本</h1>

        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
            </div>
            <!-- 必要に応じてナビボタン -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <!-- 必要に応じてページネーション -->
        <div class="swiper-pagination"></div>
    </div>
@endsection
