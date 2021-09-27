@extends('Dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    BERIKAN ROLE PADA : {{ $user->name }}    
    <br>
</div>

@include('Dashboard.alert.alert')
@role('super admin|admin')
    <li>
        <a href="{{ route('Daptar_Mahasiswa') }}" class="fw-lighter small">Daptar mahasiswa</a>
    </li>
    <li>
        <a href="{{ route('Daptar_Admin') }}" class="fw-lighter small">Daptar Admin</a> <hr>
    </li>
@endrole
<div class="row">
    <div class="col-md-4">
        <div class="card bg-light">
        <img src="{{ $user->takeImage }}"  class="img-thumbnail mx-auto px-5 py-5" style="object-fit: cover; object-position: center; width:100;">
        <h4 class="text-center">{{ $user->name }}</h4>
        <P class="text-center">{{ $user->nrp }}</P>
            <ul class="list-group list-group-flush">
            <li class="list-group-item fw-bold d-flex justify-content-between">Program <a class="text-primary">{{ $user->program->name }}</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Angkatan <a class="text-primary">{{ $user->angkatan->name }}</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Kurikulum <a class="text-primary">{{ $user->program->Kurikulum->name }}</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Status<a class="text-primary">{{ $user->program->status->name }}</a></li>
            </ul>
    
            {{-- menu edit --}}
            @role(['super admin|admin'])
            <table class="table table hover">
            <th>
                <a href="{{ route('user.ediProgram', $user->name) }}" class="badge bg-primary float-right"><span data-feather="edit-2"></span></a>
            </th>
            </table>
            @endrole
            
            <div class="card-footer">
                <a href="{{ route('changePassword', $user->name) }}" class="btn bg-primary text-white fw-bold mt-2">Ganti Password</a>
                @if (auth()->user()->id == $user->id ) 
                    <a href="{{ route('user.thumbnail', $user->id) }}" class="btn bg-primary text-white fw-bold mt-2">Update Foto</a>
                    <a href="#" class="btn bg-primary text-white fw-bold mt-2">Update Profile</a>
                @endif
            </div>
        </div>    
    </div>
    
    <div class="card col-md-8">
        <form action="{{ route('sendRoles', $user->name) }}" method="post">
            @csrf
            @method('patch')
            <option class="text-secondary">Pilih 1 role untuk {{ $user->name }}</option>
            <select class="text-lighter form-select @error('roles') is-invalid @enderror" name="roles" id="roles">
                <option class="fw-lighter" disabled selected>choose one</option>
                @foreach ($roles as $role)
                    <option  value="{{ $role->id }}" class="text-lowercase">{{ $role->name }}</option>
                @endforeach
                @foreach ($user->roles as $role)
                    <option selected  value="{{ $role->id }}" class="text-lowercase">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('roles')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        
            <div class="form-group">
                <button type="submit" class="btn bg-primary text-light my-1 mt-2">Simpan perubahan</button>
                <a href="{{ route('admin.index') }}" class="btn bg-light border border-white my-1 mt-2">Batalkan</a>
            </div>
        </form>



    </div>
</div>
@endsection