
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
                <h3 class="fw-bold mb-3">produk</h3>
                <h6 class="op-7 mb-2">Silahkan tambah produk</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">


                <a href="{{ route('produk.create') }}" class="btn btn-primary btn-round">Tambah produk</a>
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
                          <p class="card-category">Order</p>
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
                      <div class="card-title">Masukan Data produk</div>
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
                      <form action="{{ route('produk.update', $produk->id) }}" method="POST"  enctype="multipart/form-data" >
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
                                    <label for="exampleInputname1" class="form-label">Category</label>
                                    <select class="form-control" id="id_category" name="category" aria-describedby="category" required >
                                        <option name="category" value="{{ $produk->category }}">{{ $produk->category }}</option>
                                        @forelse($category as $category)
                                        <option name="category" value="{{ $category->name }}">{{ $category->name }}</option>
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
                                <label for="exampleInputname1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="Cover" value="{{ $produk->name }}" required>
                                <input type="hidden" class="form-control" id="name" name="id_toko" aria-describedby="Cover" value="{{ auth()->user()->id_toko}}" required>

                                </th>
                              </tr>

                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Gambar</label><br>
                                    <img src="{{ asset('/storage/public/Produk/'.$produk->image) }}" width="20%"><br><br>
                                    <label for="imageUpload">Upload Gambar (Max 1MB):</label>
                                <input type="file" id="imageUpload" accept="image/*" name="image" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                                </th>
                              </tr>
                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Deskripsi</label>
                                    <textarea id="myTextarea" name="description">{{ $produk->description }}</textarea>

                                </th>
                              </tr>
                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="name" name="price" aria-describedby=" author name" value="{{ $produk->price }}" required>

                                </th>
                              </tr>

                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Status</label>
                                    <select class="form-control" id="id_category" name="status" aria-describedby="category" required >
                                        <option name="status" value="{{ $produk->status }}">{{ $produk->status }}</option>
                                        <option name="status" value="aktif">Aktif</option>
                                        <option name="status" value="tidak_aktif">Tidak Aktif</option>


                                    </select>

                                </th>
                              </tr>

                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Stok</label>
                                    <input type="text" class="form-control" id="producer" name="stock" aria-describedby="source" value="{{ $produk->stock }}" required>

                                </th>
                              </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Promo</label>
                                <select class="form-control" id="promo" name="promo" aria-describedby="category" required >
                                    <option name="promo" value="{{ $produk->promo }}">{{ $produk->promo }}</option>
                                    <option name="promo" value="aktif">Aktif</option>
                                    <option name="promo" value="tidak_aktif">Tidak Aktif</option>


                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Best Seller</label>
                                <select class="form-control" id="promo" name="best_seller" aria-describedby="category" required >
                                    <option name="best_seller" value="{{ $produk->best_seller }}">{{ $produk->best_seller }}</option>
                                    <option name="best_seller" value="aktif">Aktif</option>
                                    <option name="best_seller" value="tidak_aktif">Tidak Aktif</option>


                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Jumlah Penjualan</label>
                                <input type="text" class="form-control" id="producer" name="jumlah_penjualan" value="{{ $produk->jumlah_penjualan }}"aria-describedby="source" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Jumlah Yang Bisa Dibeli OLeh Konsumen</label>
                                <input type="text" class="form-control" id="producer" name="jumlah_maksimal_beli" aria-describedby="source" value="{{ $produk->jumlah_maksimal_beli }}" required>

                            </th>
                          </tr>


                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Berat Barang (gram)</label>
                                <input type="text" class="form-control" id="producer" name="berat" aria-describedby="source" value="{{ $produk->berat }}"  required>

                            </th>
                          </tr>
                          <tr>
                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Harga Coret</label>
                                    <input type="text" class="form-control" id="producer" name="harga_coret" value="{{ $produk->harga_coret }}" aria-describedby="source" required>

                                </th>
                              </tr>
                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Diproduksi oleh</label>
                                    <input type="text" class="form-control" id="producer" name="produksi" aria-describedby="source" value="{{ $produk->produksi }}"required>

                                </th>
                              </tr>
                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Produsen / Suplayer</label>
                                    <input type="text" class="form-control" id="producer" name="produsen" aria-describedby="source" value="{{ $produk->produsen }}" required>

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
                        const product = {
                            image: 'example.jpg' // Ganti dengan data dinamis dari backend
                        };

                        window.onload = function() {
                            const imagePreview = document.getElementById('imagePreview');
                            if (product.image) {
                                imagePreview.innerHTML = `<img src="storage/produks/${product.image}" width="20%"><br>`;
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
                            if (!fileInput.files[0] && !product.image) {
                                alert('Silakan unggah gambar sebelum mengirimkan formulir.');
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


