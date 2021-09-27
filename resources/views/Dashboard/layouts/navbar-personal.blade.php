
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container justify-content-center">
      <div class="d-flex nav-link justify-content-between small" id="navbarNav">
          <div class="nav-item">
            <a class="nav-link text-dark {{ request()->is('profile') ? "active" : "" }}"href="/profile">Personal</a>
          </div>
          <div class="nav-item">
            <a class="nav-link text-dark" href="/profile/{{ $user->name }}/orangtuaWali">Orang Tua/Wali</a>
          </div>
          <div class="nav-item">
            <a class="nav-link text-dark" href="{{ route('profile.asalSekolah', $user->name) }}">Asal Sekolah</a>
          </div>
          <div class="nav-item">
            <a class="nav-link text-dark" href="{{ route('profile.alamat', $user->name) }}">Alamat</a>
          </div>
          <div class="nav-item">
            <a class="nav-link text-dark" href="{{ route('profile.mahasiswaAsing', $user->name ) }}">Mahasiswa Asing</a>
          </div>
      </div>
    </div>
</nav>