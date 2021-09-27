
@if (session('status'))
<div class="text-form text-secondary small alert alert-success">
    {{ session('status') }}
</div>
@endif

@if (session('error'))
<div class="text-form small alert alert-danger">
    {{ session('error') }}
</div>
@endif