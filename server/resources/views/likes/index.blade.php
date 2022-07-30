@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <p>{{ $title }} </p>
        <div class="row row-cols-2 row-cols-md-3">
            @forelse($likes as $like)
                <div class="col" style="margin-top: 10px">
                    <div class="card h-100">
                        <div class="ratio ratio-16x9">
                            {!! $like->video !!}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $like->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">作者：{{ $like->author }}</h6>
                            <a href="{{ route('likes.show', $like) }}" class="btn btn-primary">詳細</a>
                            <div>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="margin-top:10px">
                                    削除
                                </button>
                                <!-- モーダルの設定 -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">ライブラリから削除しますか？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><small style="color: red">※一度削除した動画本は再度追加することができます</small></p>
                                                <form method="post" class="delete" action="{{ route('likes.destroy', $like->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-danger" value="削除">
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>動画本がありません
                    <a href="{{ route('home') }}" class="btn btn-primary">動画本を探す</a>
                </p>
            @endforelse
        </div>
    </div>
@endsection
