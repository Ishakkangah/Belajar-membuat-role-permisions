@extends('Dashboard.layouts.main', ['title' => 'Jurusan page | BinaSriwijaya']) 

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Tambahkan kurikulum baru
</div>


@include('Dashboard.alert.alert')
<div class="row mt-2">
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
        <div class="card bg-light">
            <form action="{{ route('Store_Tambah_Kurikulum') }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="kurikulum" class="col-sm-2 fw-lighter col-form-label text-end fw-bold">Kurikulum baru</label>
                        <div class="col-sm-8">
                            <input type="number" name="kurikulum" class="form-control @error('kurikulum') is-invalid @enderror" id="kurikulum" value="{{ old('kurikulum') }}" required autofocus>
                            @error('kurikulum')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-danger fw-bold">Tambahkan kurikulum baru</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>    
    </div>
  
</div>
@endsection