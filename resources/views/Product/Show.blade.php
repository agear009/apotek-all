@extends('Layouts.MainPage')

@section('Container')


  <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
    <div class="container">
      <div class="bg-gray coupon position-relative p-5">
        <div class="bold-text position-absolute">10% OFF</div>
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-7 col-md-12 mb-3">
            <div class="coupon-header">
              <h2 class="display-7">10% OFF Kupon Diskon</h2>
              <p class="m-0">Subscribe us to get 10% OFF on all the purchases</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="btn-wrap">
              <a href="#" class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Email me</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="featured-products" class="product-store">
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase">{{ $KategoriProduksId->name }}</h2>
            <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold"></a>
        </div>

        <div class="product-content padding-small">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                @if($Produk->count() > 0)
                @foreach($NamaCategoridanProduk as $p)
                <div class="col mb-4">
                    <div class="card h-100 shadow-sm border-0 position-relative rounded-3 overflow-hidden">

                      <!-- Gambar produk -->
                      <div class="position-relative">
                        <img src="{{ asset('/storage/public/Produk/'.$p->image) }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;" alt="nama produk">

                        <!-- Badge promo -->
                        @if ($p->promo == 'aktif')
                          <span class="badge bg-danger position-absolute top-0 start-0 m-2">Promo</span>
                        @endif

                        <!-- Tombol aksi -->
                        <div class="position-absolute top-0 end-0 m-2 d-flex flex-column gap-2">
                          <!-- Keranjang -->
                          <button class="btn btn-sm btn-light rounded-circle shadow"  data-bs-toggle="modal" data-bs-target="#beli_produk_{{ $p->id }}" title="Tambah ke Keranjang" onclick="event.stopPropagation();">
                            <svg width="20" height="20"><use xlink:href="#shopping-carriage"></use></svg>
                          </button>
                          <!-- Detail -->
                          <button class="btn btn-sm btn-light rounded-circle shadow" data-bs-toggle="modal" data-bs-target="#detail_produk_{{ $p->id }}" title="Lihat Detail" onclick="event.stopPropagation();">
                            <svg width="20" height="20"><use xlink:href="#quick-view"></use></svg>
                          </button>
                        </div>
                      </div>

                      <!-- Nama dan harga -->
                      <div class="card-body px-3 py-2">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="card-title mb-1">{{ $p->name }}</h5>
                        </a>

                        @if ($p->promo == 'aktif')
                          <div>
                            <span class="text-muted text-decoration-line-through">Rp {{ number_format($p->harga_coret, 0, ',', '.') }}</span><br>
                            <span class="fw-bold text-danger">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                          </div>
                        @else
                          <p class="card-text text-primary fw-semibold mb-0">
                            Rp {{ number_format($p->price, 0, ',', '.') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>




                <!-- MODAL UNIK UNTUK DETAIL SETIAP PRODUK -->
                    <div class="modal fade" id="detail_produk_{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="col-lg-12 col-md-12 me-3">
                                        <div class="image-holder">
                                            <center>
                                                <img src="{{ asset('/storage/public/Produk/'.$p->image) }}" width="50%" height="50%" alt="Shoes" class="product-image img-fluid">
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="summary">
                                            <div class="summary-content fs-6">
                                                <div class="product-header d-flex justify-content-between mt-4">
                                                    <h3 class="display-7">{{ $p->name }}</h3>
                                                    <div class="modal-close-btn">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>

                                                @if ($p->promo == 'aktif')
                                                    <span class="product-price fs-3 text-decoration-line-through text-secondary">Rp. {{ number_format($p->harga_coret, 0, ',', '.') }}</span>
                                                    <span class="product-price fs-3 text-danger">Rp. {{ number_format($p->price, 0, ',', '.') }}</span>
                                                @else
                                                    <span class="product-price fs-3">Rp. {{ number_format($p->price, 0, ',', '.') }}</span>
                                                @endif



                                                <div class="product-details">
                                                    <p class="fs-7">{!! $p->description !!}</p>
                                                </div>

                                                <ul class="select">
                                                    <li><strong>Stok:</strong> {{ $p->stock }}</li>
                                                </ul>

                                                    <!-- Form Variasi Produk dan Add to Cart -->
                                                    <form action="{{ route('keranjang.store') }}" method="POST"  enctype="multipart/form-data" >
                                                        @csrf
                                                    <div class="variations-form shopify-cart">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="quantity d-flex pb-4">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm qty-minus">−</button>
                                                                    <input type="number" id="quantity_{{ $p->id }}" class="form-control text-center mx-2" step="1" min="1" name="jumlah" value="1">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm qty-plus">+</button>
                                                                </div>
                                                                <input type="hidden" class="form-control" id="name" name="name" aria-describedby="Cover" value="{{ $p->name}}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="id_toko" aria-describedby="Cover" value="{{ $p->id_toko}}" required readonly>
                                                                @if (!Auth::check()) {
                                                                    return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
                                                                }
                                                                @else
                                                                <input type="hidden" class="form-control" id="name" name="id_user" aria-describedby="Cover" value="{{ auth()->user()->id_user}}" required readonly>
                                                                @endif
                                                                <input type="hidden" class="form-control" id="name" name="id_produk" aria-describedby="Cover" value="{{ $p->id}}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="id_user" aria-describedby="Cover" value="{{ Auth::id() }}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="dilihatuser" aria-describedby="Cover" value="0" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="dilihattoko" aria-describedby="Cover" value="0" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="tipe_barang" aria-describedby="Cover" value="Alkes" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="price" aria-describedby="Cover" value="{{ $p->price}}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="image" aria-describedby="Cover" value="{{ $p->image}}" required readonly>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-medium btn-black" onclick="console.log('Form submitted')">Tambah ke Keranjang</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                <!-- MODAL UNIK UNTUK BELI SETIAP PRODUK -->
                    <div class="modal fade" id="beli_produk_{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="col-lg-12 col-md-12 me-3">
                                        <div class="image-holder">
                                            <center>
                                                <img src="{{ asset('/storage/public/Produk/'.$p->image) }}" width="50%" height="50%" alt="Shoes" class="product-image img-fluid">
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="summary">
                                            <div class="summary-content fs-6">
                                                <div class="product-header d-flex justify-content-between mt-4">
                                                    <h3 class="display-7">{{ $p->name }}</h3>
                                                    <div class="modal-close-btn">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>

                                                @if ($p->promo == 'aktif')
                                                    <span class="product-price fs-3 text-decoration-line-through text-secondary">Rp. {{ number_format($p->harga_coret, 0, ',', '.') }}</span>
                                                    <span class="product-price fs-3 text-danger">Rp. {{ number_format($p->price, 0, ',', '.') }}</span>
                                                @else
                                                    <span class="product-price fs-3">Rp. {{ number_format($p->price, 0, ',', '.') }}</span>
                                                @endif



                                                <div class="product-details">
                                                    <p class="fs-7">{!! $p->description !!}</p>
                                                </div>

                                                <ul class="select">
                                                    <li><strong>Stok:</strong> {{ $p->stock }}</li>
                                                </ul>

                                                    <!-- Form Variasi Produk dan Add to Cart -->
                                                    <form action="{{ route('keranjang.store') }}" method="POST"  enctype="multipart/form-data" >
                                                        @csrf
                                                    <div class="variations-form shopify-cart">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="quantity d-flex pb-4">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm qty-minus">−</button>
                                                                    <input type="number" id="quantity_{{ $p->id }}" class="form-control text-center mx-2" step="1" min="1" name="jumlah" value="1">
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm qty-plus">+</button>
                                                                </div>
                                                                <input type="hidden" class="form-control" id="name" name="name" aria-describedby="Cover" value="{{ $p->name}}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="id_toko" aria-describedby="Cover" value="{{ $p->id_toko}}" required readonly>
                                                                @if (!Auth::check()) {
                                                                    return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
                                                                }
                                                                @else
                                                                <input type="hidden" class="form-control" id="name" name="id_user" aria-describedby="Cover" value="{{ auth()->user()->id_user}}" required readonly>
                                                                @endif
                                                                <input type="hidden" class="form-control" id="name" name="id_produk" aria-describedby="Cover" value="{{ $p->id}}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="id_user" aria-describedby="Cover" value="{{ Auth::id() }}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="dilihatuser" aria-describedby="Cover" value="0" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="dilihattoko" aria-describedby="Cover" value="0" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="tipe_barang" aria-describedby="Cover" value="Alkes" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="price" aria-describedby="Cover" value="{{ $p->price}}" required readonly>
                                                                <input type="hidden" class="form-control" id="name" name="image" aria-describedby="Cover" value="{{ $p->image}}" required readonly>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-medium btn-black" onclick="console.log('Form submitted')">Beli Sekarang</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->



                    <!-- Script untuk tombol + dan - -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.querySelectorAll(".qty-plus").forEach(button => {
                                button.addEventListener("click", function() {
                                    let input = this.closest(".quantity").querySelector("input[type='number']");
                                    let value = parseInt(input.value) || 1;
                                    input.value = value + 1;
                                });
                            });

                            document.querySelectorAll(".qty-minus").forEach(button => {
                                button.addEventListener("click", function() {
                                    let input = this.closest(".quantity").querySelector("input[type='number']");
                                    let value = parseInt(input.value) || 1;
                                    if (value > 1) {
                                        input.value = value - 1;
                                    }
                                });
                            });
                        });
                    </script>



                 @endforeach
                 @else
                <p>Tidak ada obat dalam kategori ini.</p>
                @endif
            </div>
        </div>
    </div>
</section>


</section>

@endsection
