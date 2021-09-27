@extends('Dashboard.layouts.main', ['title' => 'Detail admin | BinaSriwijaya'])

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    DAPTAR KURIKULUM
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
        <a href="{{ route('Daptar_Semua_Jurusan') }}" class="fw-lighter small">Daptar Jurusan</a>
    </li>
    <li>
        <a href="{{ route('Daptar_Kurikulum') }}" class="fw-lighter small">Daptar Kurikulum</a> <hr>
    </li>
@endrole

    <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('Tambah_Kurikulums') }}" class="btn btn-sm btn-primary">Tambah Kurikulum</a>
            </div>
        <table class="table table-hover mt-1">
            <thead>
              <tr class="fw-bold text-light bg-secondary">
                <th scope="col">#</th>
                <th scope="col">Kurikulums</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table table-sm">
                @foreach ($kurikulums as $key => $kurikulum)
                <tr class="text-secondary">
                    <th>{{ ++$key }}</th>
                    <td>
                        <a href="#" class="text-dark"> Tahun : <span class="fw-bolder text-primary">{{ $kurikulum->name }}
                        @foreach ($kurikulum->programs as $programs)
                            <a href="#" class="badge bg-warning border border-secondary text-dark">{{ $programs->name }}</a>
                        @endforeach
                        </span></a>
                    </td>
                    <th>
                        <form  action="{{ route('Delete_Kurikulum', $kurikulum->name) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm bg-danger" onclick="return confirm('Pastikan dengan yakin jika anda ingin menghapus kurikulum {{ $kurikulum->name }} . sebab jika anda menghapus ini akan terjadi sesuatu pada data anda!')">delete</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection








