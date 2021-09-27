@extends('Dashboard.layouts.main', ['title' => 'Detail admin | BinaSriwijaya'])

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    DAPTAR JURUSAN
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
        <div class="row d-flex justify-content-between my-1">
            <H5 class="col-md-6 text-secondary mb-0">
                Total 
            </H5>
            <div class="col-md-6">
                <label class="col-md-9"></label>
                    <a href="{{ route('Tambah_Jurusan') }}" class="btn btn-sm btn-primary">Tambah Jurusan</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
              <tr class="fw-bold text-light bg-secondary">
                <th scope="col">#</th>
                <th scope="col">Nama jurusan</th>
                <th scope="col">Mahasiswa</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table table-sm">
                @foreach ($programs as $key => $program)
                <tr class="text-secondary">
                    <th style="width: 1rem">{{ ++$key }}</th>
                    <td>
                        <a href="{{ route('Daptar_Jurusan', $program->name) }}" class="text-dark">{{ $program->name }}</a>
                    </td>
                    <td><span class="text fw-bold">{{ $program->users->count(); }} </span> Orang</td>
                    <th>
                        @if (!$program->users->count())
                        <form  action="{{ route('Delete_Jurusan', $program->name) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus jurusan ini ?')">delete</button>
                        </form>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="small">{{ $programs->links() }}</div>
    </div>
</div>
@endsection








