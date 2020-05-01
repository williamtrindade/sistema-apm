@if (session('status-success'))
<div class="alert alert-success" role="alert">
{{ session('status-success') }}
</div>
@endif

@if (session('status-danger'))
<div class="alert alert-danger" role="alert">
{{ session('status-danger') }}
</div>
@endif


@if (session('errors'))
    <div class="alert alert-danger" role="alert">
        @foreach($errors as $error)
            {{$error}}<br>
        @endforeach
    </div>
@endif