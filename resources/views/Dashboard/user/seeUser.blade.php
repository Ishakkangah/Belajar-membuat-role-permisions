@extends('Dashboard.layouts.main', ['title' => 'see Admin | BinaSriwijaya'])

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom fs-3">
    Profile saya
</div>

<a href="{{ route('user.index') }}" class="badge badge-sm bg-success text-wrap" style="width: 5rem"><span data-feather="arrow-left"></span>  Kembali</a>
<div class="row mt-2">
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <img src="/img/naysila.jpg"  class="img-thumbnail mx-auto px-5 py-5" style="object-fit: cover; object-position: center; width:100;">
        <h4 class="text-center">ISHAK ANGAH</h4>
        <P class="text-center">191007</P>
          <ul class="list-group list-group-flush">
            <li class="list-group-item fw-bold d-flex justify-content-between">Program <a class="text-primary">Managerment informatika</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Angkatan <a class="text-primary">2018</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Kurikulum <a class="text-primary">2011</a></li>
            <li class="list-group-item fw-bold d-flex justify-content-between">Status<a class="text-primary">A</a></li>
          </ul>
          <div class="card-footer">
            <a href="" class="btn bg-primary text-white fw-bold mt-2">Ganti Password</a>
            <a href="" class="btn bg-primary text-white fw-bold mt-2">Update Foto</a>
            <a href="" class="btn bg-primary text-white fw-bold mt-2">Update Profile</a>
          </div>
      </div>    
    </div>
</div>

@endsection