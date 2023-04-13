<!-- Header -->
<header class="navbar navbar-expand-lg navbar-shadow navbar-end mb-3 bg-primary border-bottom border-secondary border-5">
    <div class="container">
      <div class="navbar-nav-wrap">
        <div class="navbar-brand-wrapper">
          <!-- Logo -->
          <a class="navbar-brand" href="{{ route('dashboard') }}" aria-label="Front">
            <img class="navbar-brand-logo bg-white p-2 rounded-2" src="{{ Vite::asset('resources/img/deleeuw-logo.png') }}" alt="Logo">
          </a>
          <!-- End Logo -->
        </div>
  
        <!-- Toggle -->
        <button type="button" class="navbar-toggler ms-auto" data-bs-toggle="collapse" data-bs-target="#navbarNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarNavMenu">
          <span class="navbar-toggler-default">
            <i class="fas fa-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <!-- End Toggle -->
  
        <nav class="navbar-nav-wrap-col collapse navbar-collapse" id="navbarNavMenu">
          <!-- Navbar -->
          <ul class="navbar-nav bg-primary">
            <li class="nav-item">
              <a @class(['nav-link', 'active' => request()->routeIs('dashboard')]) href="{{route('dashboard')}}" >Dashboard</a>
            </li>
            {{-- @can('opdrachten.*') --}}
            <li class="nav-item">
                <a @class(['nav-link', 'active' => request()->routeIs('opdracht.list')]) class="nav-link" href="{{route('opdracht.list')}}">Opdrachten</a>
            </li>
            {{-- @endcan --}}
            <li class="nav-item">
              <a @class(['nav-link', 'active' => request()->routeIs('gebruiker.lijst')]) class="nav-link" href="{{route('gebruiker.lijst')}}">Gebruikers</a>
            </li>
            <li class="nav-item">
                <a @class(['nav-link', 'active' => request()->routeIs('calendar')]) class="nav-link" href="{{route('calendar')}}">Agenda</a>
            </li>
            <li class="nav-item">
              <a @class(['nav-link', 'active' => request()->routeIs('klantenpaneel.gegevens')]) class="nav-link" href="{{route('klantenpaneel.gegevens')}}">Mijn gegevens</a>
          </li>
            <li class="nav-item">
                <!-- Account -->
                <div class="dropdown">
                    <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                        <div class="avatar avatar-sm avatar-circle">
                            {{-- <img class="avatar-img" src="../assets/img/160x160/img6.jpg" alt="Image Description"> --}}
                            <i class="avatar-img fas fa-user" style="width: 20px; margin-left: 9px;"></i>
                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                  </div>
                </a>
  
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                  <div class="dropdown-item-text">
                    <div class="d-flex align-items-center">
                      <div class="flex-grow-1">
                        <h5 class="mb-0">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</h5>
                        <p class="card-text text-body">{{ auth()->user()->email }}</p>
                      </div>
                    </div>
                  </div>
  
                  <div class="dropdown-divider"></div>
  
                  {{-- <a class="dropdown-item" href="#">Mijn account</a> --}}
                  {{-- <div class="dropdown-divider"></div> --}}
  
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a 
                        class="dropdown-item"
                        href="{{route('logout')}}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Uitloggen
                    </a>
                </form>
                </div>
              </div>
              <!-- End Account -->
            </li>
          </ul>

          <!-- End Navbar -->
        </nav>
      </div>
    </div>
  </header>
  <!-- End Header -->