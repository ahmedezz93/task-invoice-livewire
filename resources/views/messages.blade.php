@if (session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif (session()->has('error'))
<div class="alert alert-warning">
    {{ session('error') }}
</div>

@endif
