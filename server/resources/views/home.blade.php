@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('ログインに成功しました') }}
                        <!-- スライダーのコンテナ -->
                        <div class="swiper">
                            <!-- 必要に応じたwrapper -->
                            <div class="swiper-wrapper">
                                <!-- スライド -->
                                <div class="swiper-slide">Slide 1</div>
                                <div class="swiper-slide">Slide 2</div>
                                <div class="swiper-slide">Slide 3</div>
                            </div>
                            <!-- 必要に応じてページネーション -->
                            <div class="swiper-pagination"></div>
                            <!-- 必要に応じてナビボタン -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
