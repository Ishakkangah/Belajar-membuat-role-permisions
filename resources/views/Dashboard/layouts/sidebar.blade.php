<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-0">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        @role('super admin')
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
            <span data-feather="user-check"></span>
            Super Admin
          </a>
        </li>
        @endrole
        <li class="nav-item">
          <div class="breadcrumb-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->is('profile') ? 'active' : '' }}" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;" href="/profile">
              <span data-feather="users"></span>
              Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/profile">Personal</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">
            <span data-feather="edit"></span>
            Akademic
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">
            <span data-feather="briefcase"></span>
            Keuangan
          </a>
        </li>
        <li class="nav-item">
             <a class="nav-link px-3" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <span data-feather="log-out"></span>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
      </ul>

    
    </div>
  </nav>
