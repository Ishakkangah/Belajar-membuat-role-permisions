@extends('Dashboard.layouts.main', ['title' => 'Mahasiswa Asing | BinaSriwijaya'])

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
            
            <form action="{{ route('profile.store_MahasiswaAsing', $user->name ) }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="paspor_tipe" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Paspor Tipe</label>
                    <div class="col-sm-9">
                        <input type="text" name="paspor_tipe" class="form-control" id="paspor_tipe" placeholder="paspor tipe" value="{{ old('paspor_tipe') ?? $user->mahasiswa_asing->paspor_tipe }}">
                    @error('paspor_tipe')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div> 
                 
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="paspor_kode" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Paspor Kode</label>
                    <div class="col-sm-9">
                        <input type="text" name="paspor_kode" class="form-control" id="paspor_kode" placeholder="paspor kode" value="{{ old('paspor_kode') ?? $user->mahasiswa_asing->paspor_kode }}">
                    @error('paspor_kode')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="paspor_nomor" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Paspor Nomor</label>
                    <div class="col-sm-9">
                        <input type="number" name="paspor_nomor" class="form-control" id="paspor_nomor" placeholder="paspor nomor" value="{{ old('paspor_nomor') ?? $user->mahasiswa_asing->paspor_nomor }}">
                    @error('paspor_nomor')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="visa_tipe" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Visa Tipe</label>
                    <div class="col-sm-9">
                        <input type="text" name="visa_tipe" class="form-control" id="visa_tipe" placeholder="visa tipe" value="{{ old('visa_tipe') ?? $user->mahasiswa_asing->visa_tipe }}">
                    @error('visa_tipe')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="visa_index" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Visa Indeks</label>
                    <div class="col-sm-9">
                        <input type="text" name="visa_indeks" class="form-control" id="visa_indeks" placeholder="visa_indeks" value="{{ old('visa_indeks') ?? $user->mahasiswa_asing->visa_indeks }}">
                    @error('visa_indeks')
                        <div class="text-danger form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                
                <div class="mb-3 row mt-3 align-items-center">
                    <label for="expired_date" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">
                        Expired Date</label>
                    <div class="col-sm-9">
                        <input type="date" name="expired_date" class="form-control" id="expired_date" placeholder="visa tipe" value="{{ old('expired_date') ?? $user->mahasiswa_asing->expired_date }}">
                    @error('expired_date')
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