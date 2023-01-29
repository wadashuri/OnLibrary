@foreach ($likes as $like)
    <div class="col" style="margin-bottom: 25px">
        <a href="{{ route('post.show', $like) }}" class="text-decoration-none link-secondary">
            <div class="card h-100">
                <div class="ratio ratio-16x9">
                    <img src="{{ str_replace('youtu.be/', 'i.ytimg.com/vi/', $like->video) }}/hqdefault.jpg"
                        alt="{{ $like->title }}" style="object-fit: cover;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $like->title }}</h5>
                </div>
                <div class="card-footer">
                    <div>
                        {!! Form::open(['route' => ['like.destroy', $like], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="bi bi-trash3"></i>削除', [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-outline-danger',
                            'onclick' => "if(!confirm('削除をしてもよろしいですか？ ※後からもう一度追加できます')) return false;",
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
