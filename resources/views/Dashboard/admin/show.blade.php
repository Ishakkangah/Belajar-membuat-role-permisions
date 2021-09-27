@extends('Dashboard.layouts.main', ['title' => 'Detail admin | BinaSriwijaya'])

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

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fw-bold fs-3">
    Show : {{ $user->name }}
</div>


<div class="row col-md-6">
    <table class="table table-striped table-sm">
        <thead>
        <tr class="bg-secondary fs-6">
            <th scope="col">#</th>
            <th scope="col">Desciption<th>
            <th scope="col">Action</th>
        </tr>
        <tr class="bg-light text-secondary">
            <th scope="col">Nama</th>
            <th scope="col">{{ $user->name }}<th>
            <th>
                <form action="{{ route('admin.delete', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('are you sure ?')"><span data-feather="trash-2"></span></button>
                </form>
                <a href="{{ route('admin.edit', $user->id) }}" class="badge bg-primary"><span data-feather="edit-2"></span></a>
            </th>
        </tr>
        <tr class="bg-light text-secondary">
            <th scope="col">Email</th>
            <th scope="col">{{ $user->email }}<th>
        </tr>
        <tr class="bg-light text-secondary">
            <th scope="col">Created_at</th>
            <th scope="col">{{ $user->created_at->diffForHumans() }}<th>
        </tr>
        <tr class="bg-light text-secondary">
            <th scope="col">Updated_at</th>
            <th scope="col">{{ $user->updated_at }}<th>
        </tr>
        </thead>
    </table>
</div>
</div>


    
@endsection