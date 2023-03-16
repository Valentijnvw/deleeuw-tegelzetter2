{{-- <style>
    .nav-link.active {
      /* color: #814E00 !important; */
    }
  
    body {
      /* background-color: #FCEAC7 !important; */
    }
  
    #header {
      background-color: #A1313B;
    }
    .navbar-brand {
      background-color: #fff;
      padding: 5px;
      border-radius: 10px;
    }
  
    .nav-link, .dropdown-item-icon {
      color: #fff !important;
    }
  </style> --}}

<nav class="js-mega-menu navbar-nav-wrap">
    <!-- Logo -->

    <a class="navbar-brand" href="/" aria-label="Front">
      <img class="navbar-brand-logo" src="../../img/deleeuw/deleeuwtegelzetterbv_V3-300x195.png" alt="Logo" data-hs-theme-appearance="default">
    </a>

    <!-- End Logo -->

    <!-- Secondary Content -->
    <div class="navbar-nav-wrap-secondary-content">
      <!-- Navbar -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- Account -->
          <div class="dropdown">
            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
              <div class="avatar avatar-sm avatar-circle">
                <!-- <img class="avatar-img" src="../assets/img/160x160/img6.jpg" alt="Image Description"> -->
                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
              </div>
            </a>

            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
              <div class="dropdown-item-text">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm avatar-circle">
                    <!-- <img class="avatar-img" src="../assets/img/160x160/img6.jpg" alt="Image Description"> -->
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0">Username</h5>
                    <p class="card-text text-body">Email</p>
                  </div>
                </div>
              </div>

              <div class="dropdown-divider"></div>

              <!-- Dropdown -->
              <div class="dropdown">
                <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown1" data-bs-toggle="dropdown" aria-expanded="false">Set status</a>

                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown1">
                  <a class="dropdown-item" href="#">
                    <span class="legend-indicator bg-success me-1"></span> Available
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="legend-indicator bg-danger me-1"></span> Busy
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="legend-indicator bg-warning me-1"></span> Away
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"> Reset status
                  </a>
                </div>
              </div>
              <!-- End Dropdown -->

              <a class="dropdown-item" :href="route('profile.edit')">Profile &amp; account</a>
              <a class="dropdown-item" href="#">Settings</a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <div class="avatar avatar-sm avatar-dark avatar-circle">
                      <span class="avatar-initials">HS</span>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-2">
                    <h5 class="mb-0">Htmlstream <span class="badge bg-primary rounded-pill text-uppercase ms-1">PRO</span></h5>
                    <span class="card-text">hs.example.com</span>
                  </div>
                </div>
              </a>

              <div class="dropdown-divider"></div>

              <!-- Dropdown -->
              <div class="dropdown">
                <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="javascript:;" id="navSubmenuPagesAccountDropdown2" data-bs-toggle="dropdown" aria-expanded="false">Customization</a>

                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown2">
                  <a class="dropdown-item" href="#">
                    Invite people
                  </a>
                  <a class="dropdown-item" href="#">
                    Analytics
                    <i class="bi-box-arrow-in-up-right"></i>
                  </a>
                  <a class="dropdown-item" href="#">
                    Customize Front
                    <i class="bi-box-arrow-in-up-right"></i>
                  </a>
                </div>
              </div>
              <!-- End Dropdown -->

              <a class="dropdown-item" href="#">Manage team</a>

              <div class="dropdown-divider"></div>

              <Link class="dropdown-item" :href="route('logout')" as="button" method="post">Uitloggen</Link>
            </div>
          </div>
          <!-- End Account -->
        </li>
      </ul>
      <!-- End Navbar -->
    </div>
    <!-- End Secondary Content -->

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContainerNavDropdown" aria-controls="navbarContainerNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-default">
        <i class="bi-list"></i>
      </span>
      <span class="navbar-toggler-toggled">
        <i class="bi-x"></i>
      </span>
    </button>
    <!-- End Toggler -->

    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="navbarContainerNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" class="active" href="#">
            <i class="dropdown-item-icon"></i> Hoi123
          </a>
        </li>

      </ul>

    </div>
    <!-- End Collapse -->
  </nav>