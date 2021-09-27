@extends('Dashboard.layouts.main', ['title' => 'Alamat | BinaSriwijaya'])

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Profil saya
    <br>
    <div>
        @foreach ($user->roles as $roles)
        <p>Role : {{  $roles->name }}</p>
        @endforeach
    </div>    
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
            <a href="{{ route('Daptar_Semua_Jurusan') }}" class="fw-lighter small">Daptar Jurusan</a> <hr>
        </li>
    @endrole
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
          
        @if (auth()->user()->id == $user->id)
        <div class="card-footer">
            <a href="{{ route('user.gantiPassword', $user->name) }}" class="btn bg-primary text-white fw-bold mt-2">Ganti Password</a>
            <a href="{{ route('user.thumbnail', $user->id) }}" class="btn bg-primary text-white fw-bold mt-2">Update Foto</a>
            <a href="#" class="btn bg-primary text-white fw-bold mt-2">Update Profile</a>
        </div>
        @endif  
      </div>    
    </div>
    
    
    <div class="col-md-8">
        <div class="card">
            {{-- profile personal --}}
            @include('Dashboard.layouts.navbar-personal')
            
            <form action="{{ route('profile.alamat', $user->name) }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="alamat" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Alamat Rumah</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat_rumah" class="form-control" id="alamat_rumah" placeholder="#" value="{{ old('alamat_rumah') ?? $user->alamat->alamat_rumah }}">
                    @error('alamat_rumah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div> 
                 
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="kota" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Kota</label>
                    <div class="col-sm-9">
                        <input type="text" name="kota" class="form-control" id="kota" placeholder="#" value="{{ old('kota') ?? $user->alamat->kota }}">
                    @error('kota')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="provinsi" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Propinsi</label>
                    <div class="col-sm-9">
                        <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="#" value="{{ old('provinsi') ?? $user->alamat->provinsi }}">
                    @error('provinsi')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="kode_pos" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Kode Pos</label>
                    <div class="col-sm-9">
                        <input type="number" name="kode_pos" class="form-control" id="kode_pos" placeholder="#" value="{{ old('kode_pos') ?? $user->alamat->kode_pos }}">
                    @error('kode_pos')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="telepon_rumah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Telepon Rumah</label>
                    <div class="col-sm-9">
                        <input type="number" name="telepon_rumah" class="form-control" id="telepon_rumah" placeholder="#" value="{{ old('alamat_rumah') ?? $user->alamat->telepon_rumah }}">
                    @error('telepon_rumah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                @if (auth()->user()->id == $user->id)
                <div class="mb-3 row mt-3 align-items-center">
                    <label class="col-sm-3"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-danger text-light fw-bold">Update!</button>
                    </div>
                </div>
                @endif 
            </form>
        </div>    
    </div>
  
</div>

@endsection