@extends('Dashboard.layouts.main', ['title' => 'Jurusan page | BinaSriwijaya']) 

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Tambahkan jurusan baru
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
            <form action="{{ route('Store_Tambah_Jurusan') }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 fw-lighter col-form-label text-end fw-bold">Nama jurusan</label>
                        <div class="col-sm-8">
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{ old('jurusan') }}" required>
                            @error('jurusan')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kurikulum" class="col-sm-2 fw-lighter col-form-label text-end fw-bold">Kurikulum</label>
                        <div class="col-sm-8">
                            <select name="kurikulum" class="form-control @error('kurikulum') is-invalid @enderror" id="kurikulum" value="{{ old('kurikulum') }}" required>
                            <option disabled selected>Pilih tahun kurikulum</option>
                            @foreach ($kurikulums as $kurikulum)
                                <option value="{{ $kurikulum->id }}">{{ $kurikulum->name }}</option>
                            @endforeach
                            </select>
                            @error('kurikulum')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 fw-lighter col-form-label text-end fw-bold">Status</label>
                        <div class="col-sm-8">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="{{ old('status') }}" required>
                            <option disabled selected>Pilih status jurusan</option>
                            @foreach ($status as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                            </select>
                            @error('status')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                   
                   
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-danger fw-bold">Tambahkan jurusan baru</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>    
    </div>
  
</div>
@endsection