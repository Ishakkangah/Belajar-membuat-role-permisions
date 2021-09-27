@extends('Dashboard.layouts.main', ['title' => 'Studen Online | BinaSriwijaya'])

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
  Unggah foto
  <br>
  <div>
      @foreach ($user->roles as $roles)
      <p>Role : {{  $roles->name }}</p>
      @endforeach
  </div>    
</div>

<div class="row mt-2">
  @role('super admin|admin')
  <li>
      <a href="{{ route('Daptar_Mahasiswa') }}" class="fw-lighter small">Daptar mahasiswa</a>
  </li>
  <li>
      <a href="{{ route('Daptar_Dosen') }}" class="fw-lighter small">Daptar Dosen</a>
  </li>
  <li>
      <a href="{{ route('Daptar_Admin') }}" class="fw-lighter small">Daptar Admin</a> <hr>
  </li>
  @endrole

@include('Dashboard.alert.alert')
<div class="row mt-4">
    <div class="col-md-3">
      <div class="card bg-light">
        <img src="{{ $user->takeImage }}" style="object-fit: cover; object-position: center; width:100;">
        <h4 class="text-center"></h4>
          <div class="card-footer">
                <form action="{{ route('store.thumbnail', $user->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('patch')

                  <input type="file" name="thumbnail" id="thumbnail" class="card form-control">
                  @error('thumbnail')
                      <div class="small text-form text-danger">
                        {{ $message }}
                      </div>
                  @enderror
                  <button type="submit" class="btn bg-primary text-white fw-bold mt-2">Update Foto</button>
                </form>
          </div>
      </div>    
    </div>

    
    <div class="col-md-8">
      <div class="card bg-light">
          {{-- profile personal --}}
          @include('Dashboard.layouts.navbar-personal')


          <form action="{{ route('profile.store', $user->id) }}" method="post">
              @csrf
              @method('patch')
              <div class="card-body">
                  <div class="mb-3 row">
                      <label for="Dosen_wali" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Dosen wali</label>
                      <div class="col-sm-8">
                      <select type="text" name="dosen_wali" id="dosen_wali" class="form-control" disabled>
                          <option disabled selected>Only admin can choose one!</option>
                          @foreach($dosen_walis as $dosen_wali)
                          <option  {{ $dosen_wali->id == $user->dosen_wali_id ? "selected" : "" }} value="{{ $dosen_wali->id }}">{{ $dosen_wali->name }}</option>
                          @endforeach
                      </select>
                      @error('dosen_wali')
                          <div class="text-danger form-text">{{ $message }}</div>
                      @enderror
                      </div>
                  </div> 
                 
                  <div class="mb-3 row">
                      <label for="tanggal_lahir" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Tanggal lahir</label>
                      <div class="col-sm-8">
                          <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $user->tanggal_lahir }}">
                          @error('tanggal_lahir')
                              <div class="text-danger form-text">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>
                 
                  <div class="mb-3 row">
                      <label for="tempat_lahir" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Tempat lahir</label>
                      <div class="col-sm-8">
                          <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ old('tempat_lahir') ?? $user->tempat_lahir }}">
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
                          @foreach ($golongan_darahs as $golongan_darah)
                          <option {{ $golongan_darah->id == $user->golongan_darah_id ? "selected" : "" }}  value="{{ $golongan_darah->id }}">{{ $golongan_darah->name }}</option>
                          @endforeach
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
                          @foreach ($jenis_kelamins as $kelamin)
                          <option {{ $kelamin->id ==  $user->jenis_kelamin_id ? "selected" : "" }} value="{{ $kelamin->id }}">{{ $kelamin->jenis_kelamin }}</option>
                          @endforeach
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
                          @foreach ($agamas as $agama)
                          <option {{ $agama->id == $user->agama_id ? "selected" : "" }} value="{{ $agama->id }}">{{ $agama->name }}</option>
                          @endforeach
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
                          @foreach ($status_menikahs as $menikah)
                          <option disabled selected>Choose one</option>
                          <option {{ $menikah->id == $user->status_menikah_id ? "selected" : "" }} value="{{ $menikah->id }}">{{ $menikah->name }}</option>
                          @endforeach
                      </select>
                      @error('status_menikah')
                          <div class="text-danger form-text">{{ $message }}</div>
                      @enderror
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="no_hp" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">No.Hp</label>
                      <div class="col-sm-8">
                          <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp') ?? $user->no_hp }}">
                          @error('no_hp')
                              <div class="text-danger form-text">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="email" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">Email</label>
                      <div class="col-sm-8">
                          <input type="email" name="email" class="form-control" id="email" value="{{ old('email') ?? $user->email }}">
                          @error('email')
                              <div class="text-danger form-text">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="ktp" class="col-sm-3 fw-lighter col-form-label text-end fw-bold">KTP</label>
                      <div class="col-sm-8">
                          <input type="number" name="ktp" class="form-control" id="ktp" value="{{ old('ktp') ?? $user->ktp }}">
                          @error('ktp')
                              <div class="text-danger form-text">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-8">
                          @if (auth()->user()->id == $user->id)
                          <button type="submit" class="btn btn-danger fw-bold">Update!</button>
                          @endif  
                      </div>
                  </div>
              </div>
          </form>
      </div>    
  </div>
</div>

@endsection