@extends('Dashboard.layouts.main', ['title' => 'Change Roles | BinaSriwijaya'])

@section('container')
<nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item">
        <a href="/">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('changeRoles', $user->id) }}" class="fw-lighter">Change roles</a>
     </li>
      <li class="breadcrumb-item">
          <a href="{{ route('givePermission', $user->id) }}" class="fw-lighter">permissions</a>
     </li>
    <li class="breadcrumb-item"> 
          <a href="{{ route('changePassword', $user->id) }}" class="fw-lighter">Change password</a>
     </li>
    </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom-0 fw-bold fs-3">
    Change Role {{ $user->name }}
</div>

<div class="badge bg-success d-flex align-items-center mb-1" style="width: 5rem;">
    <a href="{{ route('admin.index') }}" class="text-light"><span data-feather="arrow-left"></span> Kembali</a>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('storeRoles', $user->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="roles" class="form-label">Old roles</label>
                <select class="form-select" id="roles" name="roles" aria-label="Default select example">
                    @foreach ($roles as $role)
                    <option {{ $user->roles()->find($role->name) ? "selected" : "" }} value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm bg-primary my-2">Save</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-sm bg-danger ml-1">Close</a>
                </div>
            </div>
        </form>    
    </div>
</div>
   
@endsection