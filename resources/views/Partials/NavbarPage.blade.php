<nav id="navScroll" class="navbar navbar-white bg-white fixed-top px-vw-15" tabindex="0">
    <div class="container">
    <nav id="navScroll" class="navbar navbar-expand-lg">
      <div class="container-lg">
        <a class="navbar-brand" href="index.html">
          <img src="../../assets/halaman_shop/images/main-logo.png" class="logo" alt="logo">
        </a>
        <button class="navbar-toggler d-flex d-lg-none order-3 border-0 p-1 ms-2" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="navbar-icon">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar">
          <div class="offcanvas-header px-4 pb-0">
            <a class="navbar-brand ps-3" href="index.html">
              <img src="../../assets/halaman_shop/images/main-logo.png" class="logo" alt="logo">
            </a>
            <button type="button" class="btn-close btn-close-black p-5" data-bs-dismiss="offcanvas" aria-label="Close"
              data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body">
            <ul id="navbar" class="navbar-nav fw-bold justify-content-end align-items-center flex-grow-1">

              <li class="nav-item">
                <a class="nav-link me-5" href="/">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="/#alkes">Alat Kesehatan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="/#obat">Obat</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link me-5 active dropdown-toggle border-0" href="#" data-bs-toggle="dropdown"
                  aria-expanded="false">Artikel</a>
                <ul class="dropdown-menu fw-bold">
                  <li>
                    <a href="index.html" class="dropdown-item">About Us </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Shop </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Blog </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Single Product </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Single Post </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Styles </a>
                  </li>
                  <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="dropdown-item">cart</a>
                  </li>
                  <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modallogin" class="dropdown-item">Login</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="index.html">Apotek Mitra</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="#">Map</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="user-items ps-0 ps-md-5">
          <ul class="d-flex justify-content-end list-unstyled align-item-center m-0">
            <li class="pe-3">

            @if (!auth()->check())

              <a href="login" title="login" data-bs-toggle="modal" data-bs-target="#modallogin" class="border-0">
                <svg class="user" width="24" height="24">
                  <use xlink:href="#user"></use>
                </svg>
              </a>

              @else

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a
                                class="dropdown-toggle profile-pic"
                                data-bs-toggle="dropdown"
                                href="#"
                                aria-expanded="false"
                                >

                                <span class="profile-username">
                                    <span class="op-7">Halo,</span>
                                    <span class="fw-bold">{{ auth()->user()->name}}</span>
                                </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">

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
                                        <div class="u-text">
                                        <h4>{{ auth()->user()->name}}</h4>
                                        <p class="text-muted">{{ auth()->user()->email}}</p>

                                        @if (auth()->user()->level === 'admin')
                                        <a href="{{ route('profil') }}" class="btn btn-xs btn-secondary btn-sm">Profile</a>

                                        @elseif (auth()->user()->level === 'user')

                                        @else
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-xs btn-secondary btn-sm">Profile</a>
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


              @endif
            </li>
            <li class="pe-3">
              <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="border-0">
                <svg class="shopping-cart" title="Keranjang" width="24" height="24">
                  <use xlink:href="#shopping-cart"></use>
                </svg>
              </a>
            </li>
            <li>
              <a href="#" title="Title" class="search-item border-0" data-bs-toggle="collapse" data-bs-target="#search-box" aria-label="Toggle navigation">
                <svg class="search" width="24" height="24">
                  <use xlink:href="#search"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    </div>
  </nav>
