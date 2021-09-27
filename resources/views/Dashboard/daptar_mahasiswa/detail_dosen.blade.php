@extends('Dashboard.layouts.main', ['title' => 'Dosen page | BinaSriwijaya']) 

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Dosen {{ $dosen_wali->name }}
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
</div>

@include('Dashboard.alert.alert')
<div class="row mt-2">
    <div class="col-md-4">
      <div class="card bg-light">
        <img src="/img/default.jpg"  class="img-thumbnail mx-auto px-5 py-5" style="object-fit: cover; object-position: center; width:100;">
        <h4 class="text-center">{{ $dosen_wali->name }}</h4>
        <P class="text-center">Kosong</P>
          <ul class="list-group list-group-flush">
            <li class="list-group-item fw-bold d-flex justify-content-between">Program <a class="text-primary">Kosong</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Angkatan <a class="text-primary">Kosong</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Kurikulum <a class="text-primary">Kosong</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Status<a class="text-primary"></a>Kosong</li>
          </ul>

            {{-- menu edit --}}
            @role(['super admin|admin'])
            <table class="table table hover">
                <th>
                <a href="#" class="badge bg-primary float-right mx-1"><span data-feather="edit-2"></span>edit</a>
                <form action="#" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="badge bg-danger border-0 float-right" onclick="return confirm('Yakin ?')"><span data-feather="trash-2">delete</span></button>
                </form>
                </th>
            </table>
            @endrole
          
        <div class="card-footer">
            <a href="#" class="btn bg-primary text-white fw-bold mt-2">Ganti Password</a>
            <a href="#" class="btn bg-primary text-white fw-bold mt-2">Update Foto</a>
            <a href="#" class="btn bg-primary text-white fw-bold mt-2">Update Profile</a>
        </div>
      </div>    
    </div>
    
    
    <div class="col-md-8">
        <div class="card bg-light">
            {{-- profile personal --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container justify-content-center">
                  <div class="d-flex nav-link justify-content-between small" id="navbarNav">
                      <div class="nav-item">
                        <a class="nav-link text-dark"href="#">Personal</a>
                      </div>
                      <div class="nav-item">
                        <a class="nav-link text-dark" href="#">Orang Tua/Wali</a>
                      </div>
                      <div class="nav-item">
                        <a class="nav-link text-dark" href="#">Asal Sekolah</a>
                      </div>
                      <div class="nav-item">
                        <a class="nav-link text-dark" href="#">Alamat</a>
                      </div>
                      <div class="nav-item">
                        <a class="nav-link text-dark" href="#">Mahasiswa Asing</a>
                      </div>
                  </div>
                </div>
            </nav>


            <form action="#" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Tanggal lahir</label>
                        <div class="col-sm-8">
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Tempat lahir</label>
                        <div class="col-sm-8">
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ old('tempat_lahir')  }}">
                            @error('tempat_lahir')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="golongan_darah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Golongan Darah</label>
                        <div class="col-sm-8">
                        <select type="text" name="golongan_darah" class="form-control" id="golongan_darah">
                            <Option disabled selected>Choose one</Option>
                            <option value="#">asa</option>
                        </select>
                        @error('golongan_darah')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Jenis Kelamin</label>
                        <div class="col-sm-8">
                        <select type="text" name="jenis_kelamin" class="form-control col-md-4" id="jenis_kelamin">
                            <Option disabled selected>Choose one</Option>
                            <option value="">Jenis kelamin</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="agama" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Agama</label>
                        <div class="col-sm-8">
                        <select type="text" name="agama" class="form-control col-md-4" id="agama" value="{{ old('agama')}}">
                            <Option disabled selected>Choose one</Option>
                            <option value="#">agama</option>
                        </select>
                        @error('agama')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status_menikah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Status Menikah</label>
                        <div class="col-sm-8">
                        <select type="text" name="status_menikah" class="form-control col-md-4" id="status_menikah">
                            <option disabled selected>Choose one</option>
                            <option  value="#">Menikah</option>
                        </select>
                        @error('status_menikah')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">No.Hp</label>
                        <div class="col-sm-8">
                            <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp')  }}">
                            @error('no_hp')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ktp" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">KTP</label>
                        <div class="col-sm-8">
                            <input type="number" name="ktp" class="form-control" id="ktp" value="{{ old('ktp')  }}">
                            @error('ktp')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-danger fw-bold">Update!</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>    
    </div>
  
</div>
@endsection