@extends('Dashboard.layouts.main', ['title' => 'Studen Online | BinaSriwijaya'])

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
    @role('super admin|admin')
        <li>
            <a href="{{ route('Daptar_Mahasiswa') }}" class="fw-lighter small">Daptar mahasiswa</a>
        </li>
        <li>
            <a href="{{ route('Daptar_Admin') }}" class="fw-lighter small">Daptar Admin</a> <hr>
        </li>
    @endrole

    
    <div class="col-md-8">
        <div class="card bg-light">
            <form action="{{ route('user.storeProgram', $user->name ) }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="program" class="col-sm-3 col-form-label text-end font-weight-bolder fs-6">Nama</label>
                        <div class="col-sm-8">
                            <select type="text" name="program" id="program" class="form-control" disabled>
                                    <option> {{ $user->name }}</option>
                            </select>
                        </div>
                    </div> 
                    
                    <div class="mb-3 row">
                        <label for="program" class="col-sm-3 col-form-label text-end font-weight-bolder fs-6">Program</label>
                        <div class="col-sm-8">
                            <select type="text" name="program" id="program" class="form-control">
                                @foreach ($programs as $program)
                                    <option {{ $program->id == $user->program_id ? "selected" : "" }} value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            @error('program')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="angkatan" class="col-sm-3 col-form-label text-end font-weight-bolder fs-6">Angkatan</label>
                        <div class="col-sm-8">
                            <select type="text" name="angkatan" id="angkatan" class="form-control">
                                @foreach ($angkatans as $angkatan)
                                    <option {{ $angkatan->id == $user->angkatan_id ? "selected" : "" }} value="{{ $angkatan->id }}">{{ $angkatan->name }}</option>
                                @endforeach
                            </select>
                            @error('angkatan')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kurikulum" class="col-sm-3 col-form-label text-end font-weight-bolder fs-6">kurikulum</label>
                        <div class="col-sm-8">
                            <select type="text" name="kurikulum" id="kurikulum" class="form-control">
                                @foreach ($kurikulums as $kurikulum)
                                    <option {{ $kurikulum->id == $user->program->kurikulum_id ? "selected" : ""  }}  value="{{ $kurikulum->id }}">{{ $kurikulum->name }}</option>
                                @endforeach
                            </select>
                            @error('kurikulum')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-3 col-form-label text-end font-weight-bolder fs-6">status</label>
                        <div class="col-sm-8">
                            <select type="text" name="status" id="status" class="form-control">
                                @foreach ($statuses as $status)
                                    <option {{ $status->id == $user->program->status_id ? "selected" : "" }}  value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('status')
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
        </div>    
    </div>
  
</div>

@endsection