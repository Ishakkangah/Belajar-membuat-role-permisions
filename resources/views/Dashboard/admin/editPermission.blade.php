@extends('Dashboard.layouts.main', ['title' => 'Edit Permissions | BinaSriwijaya'])

@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('changePermissions', $user->id) }}">change permissions</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('givePermission', $user->id) }}" class="fw-lighter">Give permission</a></li>
    </ol>
 </nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fw-bold fs-3">
    Edit Permissions : {{ $user->name }}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="badge bg-success text-wrap d-flex align-items-center mt-4 mb-2" style="width: 5rem;">
            <a href="{{ route('admin.index') }}" class="text-light"><span data-feather="arrow-left"></span>Kembali</a>
        </div>
    
        <form action="{{ route('updatePermissions', $user->id) }}" method="post">
            @csrf
            @method('patch')
            <select class="form-select @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions" aria-label="Default select example" multiple>
                @foreach ($user->permissions as $permission)
                    <option selected value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            @error('permissions')
                <div class="text-danger form-text">
                    {{ $message }}
                </div>
            @enderror
            <div class="card-footer">
                <button type="submit" class="btn btn-sm bg-primary mr-1">Save</button>
                <a href="{{ route('admin.index') }}" class="btn btn-sm bg-danger">Close</a>
            </div>
        </form>
    </div>
</div>
@endsection