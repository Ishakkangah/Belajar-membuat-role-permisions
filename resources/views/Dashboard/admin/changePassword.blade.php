@extends('Dashboard.layouts.main', ['title' => 'ChangePassword | BinaSrirjaya'])

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Ubah kata sandi
    <br>
</div>

<nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item">
        <a href="/">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('changeRoles', $user->id) }}" class="fw-lighter">Change roles</a>
     </li>
      <li class="breadcrumb-item">
          <a href="{{ route('givePermission', $user->id) }}" class="fw-lighter">permissions</a>
     </li>
    <li class="breadcrumb-item"> 
          <a href="{{ route('changePassword', $user->id) }}" class="fw-lighter">Change password</a>
     </li>
    </ol>
</nav>


<form action="{{ route('storePassword', $user->name) }}" method="post">
    @csrf
    @method('patch')
    {{-- <div class="mb-3">
      <label for="current_password" class="form-label">Current_password</label>
      <input type="current_password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password"
      value="{{ old('current_password', auth()->user()->password) }}">
    </div>
    @error('current_password')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror --}}

    <div class="mb-3">
        <label for="password" class="form-label">Kata sandi baru</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
    </div>
    @error('password')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Tulis ulang kata sandi baru</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
    </div>
    @error('password_confirmation')
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <button type="submit" class="btn bg-primary border-0 text-white border border-secondary">Simpan perubahan</button>
        <a href="{{ route('admin.index') }}" class="btn  bg-white border border-secondary">Batalkan</a>
    </div>

</form>

@endsection