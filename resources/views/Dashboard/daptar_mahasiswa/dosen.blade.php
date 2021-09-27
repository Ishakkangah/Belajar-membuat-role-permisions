@extends('Dashboard.layouts.main', ['title' => 'Detail admin | BinaSriwijaya'])

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    DAPTAR {{ $judul }}
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
                Total {{ $judul }} : {{ $dosen_walis->count() }}
            </H5>
            <div class="col-md-6">
                <label class="col-md-9"></label>
                    <a href="{{ route('Tambah_Dosen') }}" class="btn btn-sm btn-primary">Tambah dosen</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
              <tr class="fw-bold text-light bg-secondary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="table table-sm">
                @foreach ($dosen_walis as $key => $dosen_wali)
                <tr class="text-secondary">
                    <th scope="row">{{ ++$key }}</th>
                    <td>
                        <a href="{{ route('daptar_mahasiswa_personal', $dosen_wali->name) }}" class="text-secondary"> {{ $dosen_wali->name }}</a>
                    </td>
                    <td class="badge bg-warning text-dark border border-secondary text-wrap mt-1" style="width: 4rem;">
                        Dosen
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="small">{{ $dosen_walis->links() }}</div>
    </div>
</div>
@endsection








