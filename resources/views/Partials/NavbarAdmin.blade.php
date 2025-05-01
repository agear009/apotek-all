<div class="main-header">
    <div class="main-header-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="{{asset('assets/halaman_sdg/img/webp/sdg.ico')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav
      class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
    >
      <div class="container-fluid">
        <nav
          class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">

        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
          <li
            class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
          >
            <a
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-expanded="false"
              aria-haspopup="true"
            >
              <i class="fa fa-search"></i>
            </a>
            <ul class="dropdown-menu dropdown-search animated fadeIn">
              <form class="navbar-left navbar-form nav-search">
                <div class="input-group">
                  <input type="text" placeholder="Cari ..." class="form-control"/>
                </div>
              </form>
            </ul>
          </li>




          <li class="nav-item topbar-user dropdown hidden-caret">
            <a
              class="dropdown-toggle profile-pic"
              data-bs-toggle="dropdown"
              href="#"
              aria-expanded="false"
            >
              <div class="avatar-sm">
                                    @if(auth()->user()->foto )
                                    <img src="{{ asset('/storage/public/users/' . auth()->user()->foto) }}"
                                                alt="image profile"
                                                class="avatar-img rounded"
                                                height="70" width="70">

                                        @else
                                            <img src="../../assets/halaman_shop/images/tidak_ada_foto.jpg"
                                                alt="default image profile"
                                                class="avatar-img rounded"
                                                height="70" width="70">
                                        @endif
              </div>
              <span class="profile-username">
                <span class="op-7">Hi,</span>
                <span class="fw-bold">{{ auth()->user()->name}}</span>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
              <div class="dropdown-user-scroll scrollbar-outer">
                <li>
                  <div class="user-box">
                    <div class="avatar-lg">
                                        @if(auth()->user()->foto)
                                        <img src="{{ asset('/storage/public/users/' . auth()->user()->foto) }}"
                                            alt="image profile"
                                            class="avatar-img rounded"
                                            height="70" width="70">
                                    @else
                                        <img src="{{ asset('assets/halaman_shop/images/tidak_ada_foto.jpg') }}"
                                            alt="default image profile"
                                            class="avatar-img rounded"
                                            height="70" width="70">
                                    @endif

                    </div>
                    <div class="u-text">
                      <h4>{{ auth()->user()->name}}</h4>
                      <p class="text-muted">{{ auth()->user()->email}}</p>

                      @if (auth()->user()->level === 'admin')
                      <a href="{{ route('profil') }}" class="btn btn-xs btn-secondary btn-sm">Profile</a>

                      @elseif (auth()->user()->level === 'user')

                      @else
                      <a href="Admin/Index_user" class="btn btn-xs btn-secondary btn-sm">Profile</a>
                      @endif
                    </div>
                  </div>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"></a>
                  <a class="dropdown-item" href="#"></a>
                  <a class="dropdown-item" href="#"></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"></a>
                  <div class="dropdown-divider"></div>
                  <form action="/logout" method="POST">
                    @csrf
                    <li class="dropdown-item">  <button type="submit" class="nav-link bi bi-box-arrow-right {{ ($active==="logout")?'active':'' }}"> Logout</button></li>
                </form>
                </li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
