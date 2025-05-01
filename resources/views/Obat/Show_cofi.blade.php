@extends('Layouts.MainPage')

@section('Container')


  <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
    <div class="container">
      <div class="bg-gray coupon position-relative p-5">
        <div class="bold-text position-absolute">10% OFF</div>
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-7 col-md-12 mb-3">
            <div class="coupon-header">
              <h2 class="display-7">10% OFF Discount Coupons</h2>
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
            <h2 class="section-title text-uppercase">Obat {{ $KategoriObat->name }}</h2>
            <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">Lihat Semua</a>
        </div>

        <div class="product-content padding-small">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                @if($Obat->count() > 0)
                @foreach($Obat as $p)
                <div class="col mb-4">
                    <div class="product-card position-relative">
                        <div class="card-img">
                            <img src="{{ asset('/storage/public/obats/'.$p->image) }}" alt="product-item" class="product-image img-fluid">
                            <div class="cart-concern position-absolute d-flex justify-content-center">
                                <div class="cart-button d-flex gap-2 justify-content-center align-items-center">


                                    <button type="button" title="ini" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#detail_kategori_obat_{{ $p->id }}">
                                        <svg class="shopping-carriage">
                                          <use xlink:href="#shopping-carriage"></use>
                                        </svg>
                                      </button>

                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#detail_kategori_obat_{{ $p->id }}">
                                        <svg class="quick-view">
                                            <use xlink:href="#quick-view"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                            <h3 class="card-title fs-6 fw-normal m-0">
                                <a href="">{{ $p->name }}</a>
                            </h3>
                            <span class="card-price fw-bold">Rp. {{ number_format($p->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>



                <!-- MODAL UNIK UNTUK SETIAP PRODUK -->
                    <div class="modal fade" id="detail_kategori_obat_{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="col-lg-12 col-md-12 me-3">
                                        <div class="image-holder">
                                            <center>
                                                <img src="{{ asset('/storage/public/obats/'.$p->image) }}" width="50%" height="50%" alt="Shoes" class="product-image img-fluid">
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
                                                    <p class="fs-7">{!! $p->deskripsi !!}</p>
                                                    <p class="fs-7">{!! $p->jangan_digunakan_oleh !!}</p>
                                                    <p class="fs-7">{!! $p->aturan_pakai !!}</p>
                                                </div>

                                                <ul class="select">
                                                    <li><strong>Harus Dengan Resep Dokter:</strong> {{ $p->resep }}</li>
                                                    <li><strong>Dosis:</strong> {{ $p->dosis }}</li>
                                                    <li><strong>Bentuk:</strong> {{ $p->bentuk }}</li>
                                                    <li><strong>Kemasan:</strong> {{ $p->kemasan }}</li>
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
                                                                            <input type="hidden" class="form-control" id="name" name="tipe_barang" aria-describedby="Cover" value="Obat" required readonly>
                                                                            <input type="hidden" class="form-control" id="name" name="price" aria-describedby="Cover" value="{{ $p->price}}" required readonly>
                                                                            <input type="hidden" class="form-control" id="name" name="image" aria-describedby="Cover" value="{{ $p->image}}" required readonly>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit" class="btn btn-medium btn-black">Tambah ke Keranjang</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                 <div class="categories d-flex flex-wrap pt-3">
                                                    <strong class="pe-2">Categories:</strong>
                                                    <a href="#" title="categories">Clothing,</a>
                                                    <a href="#" title="categories">Mens Clothes,</a>
                                                    <a href="#" title="categories">Tops & T-Shirts</a>
                                                </div>

                                                <button type="submit" class="btn btn-medium btn-black">Beli Sekarang</button>
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
                            console.log("✅ Script dimuat!");

                            // Hapus event listener lama untuk menghindari event listener ganda
                            document.querySelectorAll(".qty-plus, .qty-minus").forEach(button => {
                                button.replaceWith(button.cloneNode(true));
                            });

                            document.querySelectorAll(".qty-plus").forEach(button => {
                                button.addEventListener("click", function() {
                                    let input = this.closest(".quantity").querySelector("input[type='number']");
                                    let value = parseInt(input.value) || 1;
                                    input.value = value + 1;
                                    console.log(`🔼 Jumlah bertambah: ${input.value}`);
                                });
                            });

                            document.querySelectorAll(".qty-minus").forEach(button => {
                                button.addEventListener("click", function() {
                                    let input = this.closest(".quantity").querySelector("input[type='number']");
                                    let value = parseInt(input.value) || 1;
                                    if (value > 1) {
                                        input.value = value - 1;
                                        console.log(`🔽 Jumlah berkurang: ${input.value}`);
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
