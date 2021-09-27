@extends('Dashboard.layouts.main', ['title' => 'Create Permission | BinaSriwijaya'])

@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('changePermissions', $user->id) }}">change permissions</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('givePermission', $user->id) }}" class="fw-lighter">Give permission</a></li>
    </ol>
 </nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fw-bold fs-3">
    Give Permission for : {{ $user->name }}
</div>



<div class="col-md-6 card-body">
    <div class="badge bg-success text-wrap d-flex align-items-center mt-4 mb-2" style="width: 5rem;">
        <a href="{{ route('admin.index') }}" class="text-light"><span data-feather="arrow-left"></span>Kembali</a>
    </div>
    <form action="{{ route('store.Permission', $user->id) }}" method="post">
        @csrf
        @method('put')
        <select class="form-control select2 @error('permissions') is-invalid @enderror" name="permissions[]" id="permissions" multiple="multiple">
            <option disabled selected>Open this select menu</option>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        @error('permissions')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary my-2">Save</button>
            <a href="{{ route('admin.index') }}" class="btn btn-sm btn-danger my-2 mr-1">Close</a>
        </div>
    </form>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fw-bold fs-3">
    This user has permissions
</div>

<div class="col-md-6">
    <table class="table table-hover">
        <tbody>
            <?php $i=1; ?>
                @forelse ($user->permissions as $permission)
                <tbody>
                    <td col="row">{{ $i++ }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <form action="{{ route('deletePermission', $user->id, $permission->id) }}"  method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-dark border-0" style="text-decoration: none;" onclick="return confirm('are you sure ?')">x</button>
                        </form>
                    </td>
                </tbody>
                @empty                    
                    <div class="alert alert-success my-4">
                        There is not permissions special
                    </div>
                @endforelse
        </tbody>
    </table>
</div>
@endsection