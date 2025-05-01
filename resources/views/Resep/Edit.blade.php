
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
                <h3 class="fw-bold mb-3">Resep</h3>
                <h6 class="op-7 mb-2">Silahkan tambah resep</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">


                <a href="{{ route('resep.create') }}" class="btn btn-primary btn-round">Tambah resep</a>
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
                          <p class="card-category">Visitors</p>
                          <h4 class="card-title">1,294</h4>
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
                          <p class="card-category">Subscribers</p>
                          <h4 class="card-title">1303</h4>
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
                          <p class="card-category">Sales</p>
                          <h4 class="card-title">$ 1,345</h4>
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
                          <p class="card-category">resep</p>
                          <h4 class="card-title">576</h4>
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
                      <div class="card-title">Masukan Data resep</div>
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
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                              >Something else here</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">


                      <!-- Projects table -->
                      <form action="{{ route('resep.update', $resep->id) }}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <table class="table align-items-center mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col" class="text-end"></th>


                            </tr>
                          </thead>

                          <tbody>
                              <tr>
                                  <th scope="row" colspan="6">
                                      <label for="exampleInputname1" class="form-label">Nomor Resep : {{ $resep->nomor_resep }}</label>
                                      <input type="hidden" class="form-control" id="name" name="nomor_resep" value="{{ $resep->nomor_resep }}" aria-describedby="name Category" required readonly>

                                  </th>
                                </tr>
                            <tr>
                              <th scope="row" colspan="6">
                                  <label for="exampleInputname1" class="form-label">Dokter :

                                    @forelse ($nama_dokter as $image)
                                    {{ $image->nama_dokter }}
                                    @empty
                                    <div class="alert alert-danger">
                                        Data tidak ditemukan.
                                    </div>
                                    @endforelse

                                  </label>

                                    <input type="hidden" class="form-control" id="name" name="id_dokter" value="{{ $resep->id_dokter}}" aria-describedby="name Category" required readonly>


                              </th>
                            </tr>



                            <tr>
                              <th scope="row" colspan="6">
                              <label for="exampleInputname1" class="form-label">Pasien</label>
                              <select class="form-control" id="id_category" name="id_pasien" aria-describedby="category" required >
                                  @forelse($user as $user)
                                  <option name="id_pasien" value="{{ $user->id }}">{{ $user->name }} | {{ $user->nohp }} | {{ $user->alamat }} | {{ $user->kabupatenkota }} | {{ $user->provinsi }}</option>
                                  @empty
                                  <div class="alert alert-danger">
                                      Data tidak ditemukan.
                                  </div>
                                  @endforelse

                              </select>

                              </th>
                            </tr>

                            <tr>
                              <th scope="row" colspan="6">
                                <img src="{{ asset('storage/public/reseps/' . $resep->image) }}" width="20%"><br>

                              <label for="imageUpload">Upload Resep (Max 1MB):</label>
                              <input type="file" id="imageUpload" accept="image/*" name="image" onchange="validateFile()">
                              <p id="errorMessage" style="color: red;"></p>
                              </th>
                            </tr>
                            <tr>
                              <th scope="row" colspan="6">
                                  <label for="exampleInputname1" class="form-label">Diagnosa dan Keterangan</label>
                                  <textarea id="myTextarea" name="diagnosa">{{ $resep->diagnosa }}</textarea>

                              </th>
                            </tr>
                            <tr>
                              <th scope="row" colspan="6">
                                  <label for="exampleInputname1" class="form-label">Status</label>
                                  <select class="form-control" id="id_category" name="status" aria-describedby="category" required >
                                    <option name="status" value="Menunggu_Diagnosa">Menunggu</option>
                                    <option name="status" value="Dibatalkan">Dibatalkan</option>
                                    <option name="status" value="Selesai">Selesai</option>


                                  </select>

                              </th>
                            </tr>

                            <tr>
                              <th scope="row" colspan="6">
                                  <button type="submit" class="btn btn-primary">Submit</button>

                              </th>
                            </tr>


                          </tbody>
                        </table>

                      </form>

                    <script>
                        // Simulasi variabel user dari backend
                        const image = {
                            image: 'example.jpg' // Ganti dengan data dinamis dari backend
                        };

                        window.onload = function() {
                            const imagePreview = document.getElementById('imagePreview');
                            if (resep.image) {
                                imagePreview.innerHTML = `<img src="storage/resep/${resep.image}" width="20%"><br>`;
                            }
                        }

                        function validateFile() {
                            const fileInput = document.getElementById('imageUpload');
                            const errorMessage = document.getElementById('errorMessage');
                            const file = fileInput.files[0];

                            if (file) {
                                if (file.size > 1024 * 1024) { // 1MB limit
                                    errorMessage.textContent = 'Ukuran file terlalu besar! Maksimum 1MB.';
                                    fileInput.value = ""; // Reset input
                                } else {
                                    errorMessage.textContent = '';
                                }
                            }
                        }

                        function validateForm() {
                            const fileInput = document.getElementById('imageUpload');
                            if (!fileInput.files[0] && !resep.image) {
                                alert('Silakan unggah gambar sebelum mengirimkan resep.');
                                return false;
                            }
                            return true;
                        }
                    </script>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


