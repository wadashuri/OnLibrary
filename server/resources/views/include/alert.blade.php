    {{-- if alert--}}
    @if (session('alert'))
        <div class="alert alert-{{session('alert.type')}} alert-dismissible fade show mt-3 mb-0" role="alert" id="liveAlert">
            <div>{!! nl2br(e(session('alert.message'))) !!}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @error('file')
    <div class="alert alert-danger alert-dismissible fade show mt-3 mb-0" role="alert" id="liveAlert">
        <div>{{ $message }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror