@extends('Dashboard.layouts.main', ['title' => 'Studen Online | BinaSriwijaya'])

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Ubah kata sandi
</div>

@include('Dashboard.alert.alert')

<div class="col-md-6">
    <form action="{{ route('user.storeGantiPassword', $user->name) }}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
        <div class="mb-3 mt-3">
            <label for="current_password" class="col-form-label">Kata sandi saat ini</label>
            <input type="password" name="current_password" class="form-control" id="current_password">
            @error('current_password')
                <div class="text-danger form-text">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="col-form-label">Kata sandi baru</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
                <div class="text-danger form-text">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="password_confirmation" class="col-form-label">Tulis ulang kata sandi baru</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            @error('password_confirmation')
                <div class="text-danger form-text">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-primary text-light border border-secondary">Simpan perubahan</button>
            <button type="submit" class="btn btn-light text-dark border border-secondary">Batalkan</button>
        </div>
        </div>  
    </form>
</div>

@endsection