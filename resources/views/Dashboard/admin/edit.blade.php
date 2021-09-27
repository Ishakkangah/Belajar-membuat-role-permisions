@extends('Dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="fw-bolder">Admin Edit, {{ $user->name }}</h1>
</div>

<form action="{{ route('admin.store', $user->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="name" class="form-label">New name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ old('name') ?? $user->name }}">
        @error('name')
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') ?? $user->email }}">
        @error('email')
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-sm btn-primary mx-1">Save</button>  
        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-danger">Close</a>  
      </div>
</form>
    
@endsection