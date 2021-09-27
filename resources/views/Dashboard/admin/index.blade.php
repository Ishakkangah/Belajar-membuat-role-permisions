@extends('Dashboard.layouts.main', ['title' => 'Admin page | BinaSriwijaya'])

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Daptar {{ $judul }} 
    <br>
</div>


@include('Dashboard.alert.alert')

@role('super admin|admin')
    <li>
        <a href="{{ route('Daptar_Mahasiswa') }}" class="fw-lighter small">Daptar mahasiswa</a>
    </li>
    <li>
        <a href="{{ route('Daptar_Dosen') }}" class="fw-lighter small">Daptar Dosen</a>
    </li>
    <li>
        <a href="{{ route('Daptar_Admin') }}" class="fw-lighter small">Daptar Admin</a>
    </li>
    <li>
        <a href="{{ route('Daptar_Semua_Jurusan') }}" class="fw-lighter small">Daptar Jurusan</a> <hr>
    </li>
@endrole




<table class="table table-hover table-sm">
    <thead>
    <tr class="bg-secondary text-light">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr class="text-secondary">
        <th>{{ $loop->iteration }}</th>
        <td>
            <a href="{{ route('daptar_mahasiswa_personal', $user->name) }}" class="text-secondary">{{ $user->name }}</a>
        </td>
        <td>
             <a href="{{ route('Daptar_Jurusan', $user->program->name) }}" class="text-secondary">{{ $user->program->name }}</a>
        </td>
        <td class="text-light">
            @foreach ($user->roles as $roles)
            <p class="badge bg-warning text-dark border border-secondary my-auto">{{  $roles->name }}</p>
            @endforeach
        </td>
        <td>
            <!-- Button trigger modal -->
            <a href="{{ route('admin.show', $user->id) }}" class="badge bg-success"><span data-feather="eye"></span>see</a>
            <a href="{{ route('createRoles', $user->name) }}" class="badge bg-primary"><span data-feather="file-plus"></span>create</a>
            @role('super admin')
            <a class="d-inline">
                <form action="{{ route('delete_Roles', $user->name) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    @foreach ($user->roles as $role)
                    <button type="submit" class="badge bg-danger border-0 align-content-center" onclick="return confirm('Apakah anda yakin ingin menghapus role {{ $user->name }} ? ')"><span data-feather="trash-2"></span> delete</button>
                    @endforeach
                </form>
            </a>
            @endrole
        </td>
    </tr>
    @endforeach 
    </tbody>
</table>

<div class="small">
    {{ $users->links() }}
</div>

    

    
@endsection