
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
                      <form action="{{ route('obat.update', $Obat->id) }}" method="POST"  enctype="multipart/form-data" >
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
                                    <option name="category" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @forelse($KategoriObat as $category)
                                    <option name="category" value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="Cover" value="{{ $Obat->name }}" required>
                            <input type="hidden" class="form-control" id="name" name="id_toko" aria-describedby="Cover" value="{{ $Obat->id_toko }}" required readonly>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <img src="{{ asset('/storage/public/obats/'.$Obat->image) }}" width="20%">
                                <label for="imageUpload">Upload Gambar (Max 1MB):</label>
                                <input type="file" id="imageUpload" accept="image/*" name="image" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Dosis</label>
                                <input type="text" class="form-control" id="name" name="dosis" aria-describedby="name Category" value="{{ $Obat->dosis }}" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Aturan Pakai</label>
                                <textarea id="myTextarea" name="aturan_pakai">{{ $Obat->aturan_pakai }}</textarea>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Komposisi</label>
                                <textarea id="myTextarea" name="komposisi">{{ $Obat->komposisi }}</textarea>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Deskripsi</label>
                                <textarea id="myTextarea" name="deskripsi">{{ $Obat->deskripsi }}</textarea>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Jangan Digunakan Oleh</label>
                                <textarea id="myTextarea" name="jangan_digunakan_oleh">{{ $Obat->jangan_digunakan_oleh }}</textarea>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Efek Samping</label>
                                <textarea id="myTextarea" name="efek_samping">{{ $Obat->efek_samping }}</textarea>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Bentuk Obat</label>
                                <select class="form-control" id="promo" name="bentuk" aria-describedby="category" required >
                                    <option name="bentuk" value="{{ $Obat->bentuk }}">{{ $Obat->bentuk }}</option>
                                    <option name="bentuk" value="Tablet">tablet</option>
                                    <option name="bentuk" value="Cair">Cair</option>
                                    <option name="bentuk" value="Puyer">Puyer</option>


                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Harus Dengan Resep</label>
                                <select class="form-control" id="promo" name="resep" aria-describedby="category" required >
                                    <option name="resep" value="{{ $Obat->resep }}">{{ $Obat->resep }}</option>
                                    <option name="resep" value="Ya">Ya</option>
                                    <option name="resep" value="Tidak">Tidak</option>
                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Jenis Obat</label>
                                <select class="form-control" id="promo" name="jenis_obat" aria-describedby="category" required >
                                    <option name="jenis_obat" value="{{ $Obat->jenis_obat }}">{{ $Obat->jenis_obat }}</option>
                                    <option name="jenis_obat" value="hijau">Hijau</option>
                                    <option name="jenis_obat" value="biru">Biru</option>
                                    <option name="jenis_obat" value="merah">Merah</option>
                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Kemasan</label>
                                <select class="form-control" id="promo" name="kemasan" aria-describedby="category" required >
                                    <option name="kemasan" value="{{ $Obat->kemasan }}">{{ $Obat->kemasan }}</option>
                                    <option name="kemasan" value="Blister Pack">Blister Pack</option>
                                    <option name="kemasan" value="Strip Pack">Strip Pack</option>
                                    <option name="kemasan" value="Botol">Botol</option>
                                    <option name="kemasan" value="Tube">Tube</option>
                                    <option name="kemasan" value="Sachet">Sachet</option>
                                    <option name="kemasan" value="Ampul">Ampul</option>
                                    <option name="kemasan" value="Vial">Vial</option>
                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Harga Jual</label>
                                <input type="text" class="form-control" id="rupiah" name="price" aria-describedby=" author name" value="{{ $Obat->price }}" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Harga Beli</label>
                                <input type="text" class="form-control" id="rupiah" name="harga_beli" value="{{ $Obat->harga_beli }}"aria-describedby=" author name" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Produksi</label>
                                <input type="text" class="form-control" id="name" name="produksi" aria-describedby=" author name" value="{{ $Obat->produksi }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Produsen</label>
                                <input type="text" class="form-control" id="name" name="produsen" aria-describedby=" author name" value="{{ $Obat->produsen }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Status</label>
                                <select class="form-control" id="id_category" name="status" aria-describedby="category" required >
                                    <option name="status" value="{{ $Obat->status }}">{{ $Obat->status }}</option>
                                    <option name="status" value="aktif">Aktif</option>
                                    <option name="status" value="tidak_aktif">Tidak Aktif</option>


                                </select>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="producer" name="stock" aria-describedby="source" value="{{ $Obat->stock }}" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Promo</label>
                                <select class="form-control" id="promo" name="promo" aria-describedby="category" required >
                                    <option name="promo" value="{{ $Obat->promo }}">{{ $Obat->promo }}</option>
                                    <option name="promo" value="aktif">Aktif</option>
                                    <option name="promo" value="tidak_aktif">Tidak Aktif</option>


                                </select>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Merek</label>
                                <input type="text" class="form-control" id="producer" name="merek" aria-describedby="source" value="{{ $Obat->merek }}" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Best Seller</label>
                                <select class="form-control" id="promo" name="best_seller" aria-describedby="category" required >
                                    <option name="best_seller" value="{{ $Obat->best_seller }}">{{ $Obat->best_seller }}</option>
                                    <option name="best_seller" value="aktif">Aktif</option>
                                    <option name="best_seller" value="tidak_aktif">Tidak Aktif</option>


                                </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Jumlah Penjualan</label>
                                <input type="text" class="form-control" id="producer" name="jumlah_penjualan" aria-describedby="source" value="{{ $Obat->jumlah_penjualan }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Jumlah Yang Bisa Dibeli OLeh Konsumen</label>
                                <input type="text" class="form-control" id="producer" name="jumlah_maksimal_beli" aria-describedby="source" value="{{ $Obat->jumlah_maksimal_beli }}" required>

                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Berat Barang (gram)</label>
                                <input type="text" class="form-control" id="producer" name="berat" aria-describedby="source" value="{{ $Obat->berat }}"  required>

                            </th>
                          </tr>
                          <tr>
                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Harga Coret</label>
                                    <input type="text" class="form-control" id="rupiah" name="harga_coret" aria-describedby="source" value="{{ $Obat->harga_coret }}" required>

                                </th>
                              </tr>
                            <th scope="row" colspan="6">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </th>
                          </tr>


                        </tbody>
                      </table>

                    </form>

                    <script>
                        // Simulasi variabel user dari backend
                        const obat = {
                            image: 'example.jpg' // Ganti dengan data dinamis dari backend
                        };

                        window.onload = function() {
                            const imagePreview = document.getElementById('imagePreview');
                            if (obat.image) {
                                imagePreview.innerHTML = `<img src="storage/obats/${obat.image}" width="20%"><br>`;
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
                            if (!fileInput.files[0] && !obat.image) {
                                alert('Silakan unggah gambar sebelum mengirimkan formulir.');
                                return false;
                            }
                            return true;
                        }
                    </script>

                    <script type="text/javascript">

                        var rupiah = document.getElementById('rupiah');
                        rupiah.addEventListener('keyup', function(e){
                            // tambahkan 'Rp.' pada saat form di ketik
                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                            rupiah.value = formatRupiah(this.value, 'Rp. ');
                        });

                        /* Fungsi formatRupiah */
                        function formatRupiah(angka, prefix){
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split   		= number_string.split(','),
                            sisa     		= split[0].length % 3,
                            rupiah     		= split[0].substr(0, sisa),
                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if(ribuan){
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
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


