@if (session('status-success'))
<div class="notification is-success">
    <button class="delete"></button>
    {{ session('status-success') }}
</div>
@endif

@if (session('status-danger'))
<div class="notification is-danger">
    <button class="delete"></button>
    {{ session('status-danger') }}
</div>
@endif

