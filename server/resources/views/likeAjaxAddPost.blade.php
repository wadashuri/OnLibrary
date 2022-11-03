<div class="row row-cols-2 row-cols-md-3">
    @foreach($likes as $like)
        <div class="col" style="margin-bottom: 25px">
            <div class="card h-100">
                <div class="ratio ratio-16x9">
                    <iframe width="260" height="115"
                        src="{{ str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $like->video) }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $like->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">作者：{{ $like->author }}</h6>
                </div>
                <div class="card-footer">
                    <div>
                        <a href="{{ route('posts.show', $like) }}" class="btn btn-primary">詳細</a>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                            data-target="#exampleModal" style="margin-top:10px">
                            削除
                        </button>
                        <!-- モーダルの設定 -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="color: red" class="modal-title" id="exampleModalLabel">ライブラリから削除しますか？</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="閉じる">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><small style="color: red">※一度削除した動画本は再度追加することができます</small></p>
                                        <form method="post" class="delete"
                                            action="{{ route('likes.destroy', $like->id) }}">
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
    @endforeach
</div>