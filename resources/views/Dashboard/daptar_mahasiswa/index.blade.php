@extends('Dashboard.layouts.main')

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    DAPTAR  {{ $judul }}
</div>

@include('Dashboard.alert.alert')
   
<div class="row">
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
    <div class="col-md-12">
        <div>
            <div class="row d-flex justify-content-between my-1">
                <H5 class="col-md-6 text-secondary mb-0">
                    Total {{ $judul }}: {{ $users->count() }}
                </H5>
                <div class="col-md-6">
                    <label class="col-md-8"></label>
                        <a href="{{ $href }}" class="btn btn-sm btn-primary">{{ $button }}</a>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
              <tr class="fw-bold text-light bg-secondary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($users as $key => $user)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>
                        <a href="{{ route('daptar_mahasiswa_personal', $user->name) }}" class="text-secondary"> {{ $user->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('Daptar_Jurusan', $user->program->name) }}" class="text-secondary">{{ $user->program->name }}</a>
                    </td>
                    @foreach ($user->roles as $role)
                    <td class="badge bg-warning text-dark border border-secondary text-wrap my-auto" style="width: 4rem">{{ $role->name }}</td>
                    @endforeach
                </tr>
                @empty
                    <div class="small alert alert-danger mt-3">
                        Tidak ada mahasiswa yang mengambil jurusan ini
                    </div> 
                @endforelse
            </tbody>
        </table>
        <div class="small">{{ $users->links() }}</div>
    </div>
</div>
@endsection