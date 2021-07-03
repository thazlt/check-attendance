@if (session('messages'))
    @foreach (session('messages') as $message)
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endforeach
@endif
@if (session('errors'))
    @foreach (session('errors') as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
    @endforeach
@endif
