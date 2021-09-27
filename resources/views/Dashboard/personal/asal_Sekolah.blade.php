@extends('Dashboard.layouts.main', ['title' => 'Asal Sekolah | BinaSriwijaya'])

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
            @if($user->program->name)
                <li class="list-group-item fw-bold d-flex justify-content-between">Program <a class="text-primary">{{ $user->program->name }}</a></li>
            @endif
            @if($user->angkatan)
                <li class="list-group-item fw-bold d-flex justify-content-between">Angkatan <a class="text-primary">{{ $user->angkatan->name }}</a></li>
            @endif
            @if($user->program->kurikulum)
                <li class="list-group-item fw-bold d-flex justify-content-between">Kurikulum <a class="text-primary">{{ $user->program->Kurikulum->name }}</a></li>
            @endif
            @if($user->program->status)
                <li class="list-group-item fw-bold d-flex justify-content-between">Status<a class="text-primary">{{ $user->program->status->name }}</a></li>
            @endif
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
            
            <form action="{{ route('profile.storeSekolah', $user->name ) }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="asal_sekolah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Sekolah Asal</label>
                    <div class="col-sm-9">
                        <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="#" value="{{ old('asal_sekolah') ?? $user->asal_sekolah->asal_sekolah }}">
                    @error('asal_sekolah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div> 

                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="alamat_sekolah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Alamat sekolah asal</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat_sekolah" class="form-control" id="alamat_sekolah" placeholder="#" value="{{ old('asal_sekolah') ?? $user->asal_sekolah->alamat_sekolah }}">
                    @error('alamat_sekolah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                 
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="negara" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Negara</label>
                    <div class="col-sm-9">
                        <input type="text" name="negara" class="form-control" id="negara" placeholder="#" value="{{ old('asal_sekolah') ?? $user->asal_sekolah->negara }}">
                    @error('negara')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="jurusan" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Jurusan</label>
                    <div class="col-sm-9">
                        <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="#" value="{{ old('asal_sekolah') ?? $user->asal_sekolah->jurusan }}">
                    @error('jurusan')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="nomor_ijazah_sma" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Nomor Ijazah SMA</label>
                    <div class="col-sm-9">
                        <input type="text" name="nomor_ijazah_sma" class="form-control" id="nomor_ijazah_sma" placeholder="#" value="{{ old('asal_sekolah') ?? $user->asal_sekolah->nomor_ijazah_sma }}">
                    @error('nomor_ijazah_sma')
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