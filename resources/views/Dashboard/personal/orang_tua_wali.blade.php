@extends('Dashboard.layouts.main', ['title' => 'Orang tua wali | BinaSriwijaya'])

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
          
            @if (auth()->user()->id == $user->id ) 
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
            
            <form action="{{ route('profile.updateOrangTuaWali', $user->id )}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="nama_wali" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Nama Ayah/Wali</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_wali" class="form-control" id="nama_wali" placeholder="#" value="{{ old('nama_wali') ?? $user->orang_tua_wali->nama_ayah_wali }}">
                    @error('nama_wali')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div> 
                 
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="ktp_ayah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        KTP Ayah</label>
                    <div class="col-sm-9">
                        <input type="number" name="ktp_ayah" class="form-control" id="ktp_ayah" placeholder="#" value="{{ old('ktp_ayah') ?? $user->orang_tua_wali->ktp_ayah }}">
                    @error('ktp_ayah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
               
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="perkerjaan_ayah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Perkerjaan Ayah/Wali</label>
                    <div class="col-sm-9">
                        <input type="text" name="perkerjaan_ayah" class="form-control" id="perkerjaan_ayah" placeholder="#" value="{{ old('perkerjaan_ayah') ?? $user->orang_tua_wali->perkerjaan_ayah }}">
                    @error('perkerjaan_ayah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="nim_nrp_ayah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        NIP/NRP Ayah/Wali</label>
                    <div class="col-sm-9">
                        <input type="number" name="nim_nrp_ayah" class="form-control" id="nim_nrp_ayah" placeholder="#" value="{{ old('nim_nrp_ayah') ?? $user->orang_tua_wali->nip_ayah }}">
                    @error('nim_nrp_ayah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="pangkat_ayah" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Pangkat/Gol Ayah/Wali</label>
                    <div class="col-sm-9">
                        <input type="text" name="pangkat_ayah" class="form-control" id="pangkat_ayah" placeholder="#" value="{{ old('pangkat_ayah') ?? $user->orang_tua_wali->pangkat_ayah }}">
                    @error('pangkat_ayah')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="nama_instansi" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Nama Instansi Ayah/Wali</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="#" value="{{ old('nama_instansi') ?? $user->orang_tua_wali->nama_instansi_ayah }}">
                    @error('nama_instansi')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="alamat_instansi" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Alamat Instansi Ayah/Wali</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat_instansi" class="form-control" id="alamat_instansi" placeholder="#" value="{{ old('alamat_instansi') ?? $user->orang_tua_wali->alamat_instansi_ayah }}">
                    @error('alamat_instansi')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="nama_ibu" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Nama Ibu</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="#" value="{{ old('nama_ibu') ?? $user->orang_tua_wali->nama_ibu }}">
                    @error('nama_ibu')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="ktp_ibu" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        KTP Ibu</label>
                    <div class="col-sm-9">
                        <input type="number" name="ktp_ibu" class="form-control" id="ktp_ibu" placeholder="#" value="{{ old('ktp_ibu') ?? $user->orang_tua_wali->ktp_ibu }}">
                    @error('ktp_ibu')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="perkerjaan_ibu" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Perkerjaan Ibu</label>
                    <div class="col-sm-9">
                        <input type="text" name="perkerjaan_ibu" class="form-control" id="perkerjaan_ibu" placeholder="#" value="{{ old('perkerjaan_ibu') ?? $user->orang_tua_wali->perkerjaan_ibu }}">
                    @error('perkerjaan_ibu')
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