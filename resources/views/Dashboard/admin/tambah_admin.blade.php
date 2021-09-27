@extends('Dashboard.layouts.main', ['title' => 'Dosen page | BinaSriwijaya']) 

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Tambahkan admin baru
</div>


@include('Dashboard.alert.alert')
<div class="row mt-2">
    <div class="col">
        <div class="card bg-light">
            <form action="{{ route('store_Tambah_Admin') }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 fw-lighter col-form-label text-end fw-bold">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="nidn" class="col-sm-2 fw-lighter col-form-label text-end fw-bold">Nidn</label>
                        <div class="col-sm-8">
                            <input type="number" name="nidn" class="form-control" id="nidn" value="{{ old('nidn')  }}" required>
                            @error('nidn')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                   
                                            
                    <div class="form-group row">
                        <label for="jurusan" class="col-md-2 col-form-label text-md-right fw-bold">Jurusan</label>

                        <div class="col-md-8">
                            <select id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" required autocomplete="jurusan">
                                <option disabled selected>Choose one!</option>    
                            @foreach ($program_id as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                            </select>
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="angkatan" class="col-md-2 col-form-label text-md-right fw-bold">Angkatan</label>

                        <div class="col-md-8">
                            <select id="angkatan" type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan') }}" required autocomplete="angkatan">
                                <option disabled selected>Choose one!</option>
                                @foreach ($angkatan_id as $angkatan)
                                <option value="{{ $angkatan->id }}">{{ $angkatan->name }}</option>
                                @endforeach    
                            </select>
                            @error('angkatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 fw-lighter col-form-label text-end fw-bold" required>Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email')  }}">
                            @error('email')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 fw-lighter col-form-label text-end fw-bold" requred>Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password" value="{{ old('password')  }}">
                            @error('password')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-danger fw-bold">Tambahkan admin baru</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>    
    </div>
  
</div>
@endsection