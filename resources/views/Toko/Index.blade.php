@extends('Layouts.MainAdmin')

@section('Container')

    <div class="wrapper">

      <div class="main-panel">
        @include('Partials.NavbarAdmin')

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Toko</h3>
                <h6 class="op-7 mb-2"></h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">


                <a href="{{ route('toko.create') }}" class="btn btn-primary btn-round">Tambah Toko</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Produk</p>

                          <h4 class="card-title">{{ $produkcount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Postingan</p>
                          <h4 class="card-title">{{ $postcount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">toko</p>
                          <h4 class="card-title">{{ $ordercount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Keranjang</p>
                          <h4 class="card-title">{{ $keranjangcount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

                </div>
                <div class="row">

              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">

                        <form class="navbar-left navbar-form nav-search" action="{{ route('toko.index') }}" role="search" method="get">
                            <div class="input-group">
                              <input name="search" type="search" value="{{ request('search') }}" placeholder="Cari ..." class="form-control"/>
                              <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                              </button>
                            </div>
                        </form>

                      </div>
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/toko">Tampilkan Semua</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Pemilik Apotek</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col" class="text-end">Menu</th>


                          </tr>
                        </thead>
                    </tbody>
                </table>

                        @forelse($tokoall as $toko)
                        <table class="table align-items-center mb-0">
                        <tbody>

                          <tr>
                            <th scope="row">
                              <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                <i class="fa fa-check"></i>
                              </button>
                              {{ $no++ }}
                            </th>
                            <th scope="col" width="20%">{{ $toko->name }}</th>
                            <th scope="col" width="">{{ $toko->nama_direktur }}</th>
                            <th scope="col" width="">{{ $toko->kabupaten }}</th>
                            <th scope="col" width="">{{ $toko->provinsi }}</th>

                            <td class="text-end">

                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('toko.destroy', $toko->id) }}" method="POST">
                                    <a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-sm btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <span class="badge badge-success">Edit</span></a>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn"> <span class="badge badge-success">Hapus</span></button>
                                </form>


                            </td>
                          </tr>
                        </tbody>
                      </table>
                      @empty
                      <div class="alert alert-danger">
                          Data tidak ditemukan.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforelse
@endsection


