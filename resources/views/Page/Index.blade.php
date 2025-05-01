@extends('Layouts.MainPage')

@section('Container')

<section id="intro" class="position-relative mt-4">
    <div class="container-lg">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
              <img src="../../assets/halaman_shop/images/card-image1.jpg" alt="shoes" class="img-fluid jarallax-img">
              <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                <h2 class="card-title display-3 light">produk1</h2>
                <a href="index.html"
                  class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row g-4">
              <div class="col-lg-12 mb-4">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="../../assets/halaman_shop/images/card-image2.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Sports Wear</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="../../assets/halaman_shop/images/card-image3.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Fashion Shoes</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
              <img src="../../assets/halaman_shop/images/card-image4.jpg" alt="shoes" class="img-fluid jarallax-img">
              <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                <h2 class="card-title display-3 light">Stylish shoes for men</h2>
                <a href="index.html"
                  class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row g-4">
              <div class="col-lg-12 mb-4">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="../../assets/halaman_shop/images/card-image5.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Men Shoes</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="../../assets/halaman_shop/images/card-image6.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Women Shoes</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
    <div class="container">
      <div class="bg-gray coupon position-relative p-5">
        <div class="bold-text position-absolute">APOTEK ONLINE</div>
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-7 col-md-12 mb-3">
            <div class="coupon-header">
              <h2 class="display-7">Ayo Segera Bergabung dengan kemitraan kami</h2>
              <p class="m-0">semudah itu membuka Apotek Online segera bergabung</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="btn-wrap">
              <a href="#" class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Hubungi Kami</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="obat" class="product-store">
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase">Kategori Obat</h2>
            <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold"></a>
        </div>

        <div class="product-content padding-small">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                @foreach($kategoriobats as $p)
                <div class="col">
                    <div class="card h-100 hover-card border border-secondary-subtle">
                        <!-- Gambar dan tombol modal -->
                        <div class="position-relative overflow-hidden rounded-top">
                            <a href="{{ route('obats.show', $p->id) }}">
                                <img src="{{ asset('/storage/public/kategoriobats/'.$p->image) }}" alt="{{ $p->name }}"
                                     class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                            </a>

                            <!-- Tombol kaca pembesar -->
                            <button type="button"
                                    class="btn btn-sm btn-light rounded-circle shadow position-absolute top-0 end-0 m-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detail_kategori_obat_{{ $p->id }}"
                                    onclick="event.stopPropagation();">
                                <svg width="20" height="20" fill="currentColor">
                                    <use xlink:href="#quick-view"></use>
                                </svg>
                            </button>
                        </div>

                        <!-- Nama dan deskripsi -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <a href="{{ route('obats.show', $p->id) }}" class="text-decoration-none text-dark">
                                <h5 class="card-title mb-2 text-truncate"
                                    style="font-weight: 500; letter-spacing: 0.3px;">{{ $p->name }}</h5>
                            </a>
                            <p class="card-text text-muted">{!! $p->deskripsi !!}</p>
                        </div>
                    </div>
                </div>

                <!-- MODAL UNIK UNTUK SETIAP PRODUK -->
                <div class="modal fade" id="detail_kategori_obat_{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="col-lg-12 col-md-12 me-3">
                                    <a href="{{ route('obats.show', $p->id) }}">
                                        <div class="image-holder">
                                            <img src="{{ asset('/storage/public/kategoriobats/'.$p->image) }}" alt="{{ $p->name }}"
                                                 class="product-image img-fluid">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="summary">
                                        <div class="summary-content fs-6">
                                            <div class="product-header d-flex justify-content-between mt-4">
                                                <h3 class="display-7">{{ $p->name }}</h3>
                                                <div class="modal-close-btn">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="product-details">
                                                <p class="fs-7">{!! $p->deskripsi !!}</p>
                                            </div>
                                            <form action="{{ route('obats.show', $p->id) }}" method="GET">

                                            <button type="submit"
                                                    class="btn btn-medium btn-black hvr-sweep-to-right" >Lihat</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                @endforeach
            </div>

        </div>
    </div>
</section>



  <section id="collection-products" class="py-2 my-2 py-md-5 my-md-5">
    <div class="container-md">
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="collection-card card border-0 d-flex flex-row align-items-end jarallax-keep-img">
            <img src="../../assets/halaman_shop/images/collection-item1.jpg" alt="product-item" class="border-rounded-10 img-fluid jarallax-img">
            <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
              <h3 class="card-title display-3">
                <a href="#">Minimal Collection</a>
              </h3>
              <a href="index.html" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="collection-card card border-0 d-flex flex-row jarallax-keep-img">
            <img src="../../assets/halaman_shop/images/collection-item2.jpg" alt="product-item" class="border-rounded-10 img-fluid jarallax-img">
            <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
              <h3 class="card-title display-3">
                <a href="#">Sneakers Collection</a>
              </h3>
              <a href="index.html" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="alkes" class="product-store py-2 my-2 py-md-5 my-md-5 pt-0">
    <div class="container-md">
      <div class="display-header d-flex align-items-center justify-content-between">
        <h2 class="section-title text-uppercase">Alat Kesehatan</h2>
        <div class="btn-right">
          <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">Semua Produk</a>
        </div>
      </div>
      <div class="product-content padding-small">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
            @foreach($kategorialkess as $alkes)
            <div class="col">
                <div class="card h-100 hover-card border border-secondary-subtle position-relative">
                    <!-- Gambar dan tombol aksi -->
                    <div class="position-relative overflow-hidden rounded-top">
                        <a href="{{ route('products.show', $alkes->id) }}">
                            <img src="{{ asset('/storage/public/kategoriproduks/'.$alkes->image) }}" alt="{{ $alkes->name }}"
                                 class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        </a>

                        <!-- Tombol-tombol mengambang -->
                        <div class="cart-concern position-absolute top-0 end-0 m-2 d-flex gap-2">
                            <!-- Tombol keranjang -->


                            <!-- Tombol detail -->
                            <button type="button" title="Lihat Detail"
                                    class="btn btn-sm btn-light rounded-circle shadow"
                                    data-bs-toggle="modal" data-bs-target="#detail_kategori_produk_{{ $alkes->id }}"
                                    onclick="event.stopPropagation();">
                                <svg width="20" height="20" fill="currentColor">
                                    <use xlink:href="#quick-view"></use>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Nama dan harga -->
                    <div class="card-body d-flex flex-column justify-content-between">
                        <a href="{{ route('products.show', $alkes->id) }}" class="text-decoration-none text-dark">
                            <h5 class="card-title mb-2 text-truncate"
                                style="font-weight: 500; letter-spacing: 0.3px;">{{ $alkes->name }}</h5>
                        </a>
                        <span class="card-price fw-semibold text-muted"> {!! $alkes->deskripsi !!}</span>
                    </div>
                </div>
            </div>
                 <!-- MODAL UNIK UNTUK SETIAP PRODUK -->
                <div class="modal fade" id="detail_kategori_produk_{{ $alkes->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="col-lg-12 col-md-12 me-3">
                                    <a href="{{ route('obats.show', $alkes->id) }}">
                                        <div class="image-holder">
                                            <img src="{{ asset('/storage/public/kategoriproduks/'.$alkes->image) }}" alt="{{ $p->name }}"
                                                 class="product-image img-fluid">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="summary">
                                        <div class="summary-content fs-6">
                                            <div class="product-header d-flex justify-content-between mt-4">
                                                <h3 class="display-7">{{ $alkes->name }}</h3>
                                                <div class="modal-close-btn">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="product-details">
                                                <p class="fs-7">{!! $alkes->deskripsi !!}</p>
                                            </div>
                                            <form action="{{ route('produk.show', $alkes->id) }}" method="GET">

                                            <button type="submit"
                                                    class="btn btn-medium btn-black hvr-sweep-to-right" >Lihat</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            @endforeach
        </div>


     </div>



    </div>

  </section>

@endsection
