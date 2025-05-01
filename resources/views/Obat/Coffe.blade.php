<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotek Senja</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="../../assets/halaman_barang/css/style.css">

<!-- Alpain.js-->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- App.js-->
   <script src="../../assets/halaman_barang/src/app.js" async></script>

   <!--midtrans @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
  src="https://app.stg.midtrans.com/snap/snap.js"
  data-client-key="SB-Mid-client-uGzjfXHMQHlggdf5"></script>
</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar" x-data>
    <a href="#" class="navbar-logo">Apotek<span>Online</span>.</a>

    <div class="navbar-nav">
        <a href="{{ route('home') }}">Beranda</a>
      <a href="#about">Tentang Kami</a>
      <a href="#menu">Menu</a>
      <a href="#products">Produk</a>
      <a href="#contact">Kontak</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="#" id="shopping-cart-button">
        <i data-feather="shopping-cart"></i>
        <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
      </a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->

    <!-- Shopping Cart start -->
    <div class="shopping-cart">

      <template x-for="(item, index) in $store.cart.items" x-key="index">
      <div class="cart-item">
        <img :src="`../../assets/halaman_barang/img/products/${item.img}`" :alt="item.name">
        <div class="item-detail">
          <h3 x-text="item.name"></h3>
          <div class="item-price">
            <span x-text="rupiah(item.price)"></span>&times;
            <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
            <span x-text="item.quantity"></span>
            <button id="add" @click="$store.cart.add(item)">&plus;</button>&equals;
            <span x-text="rupiah(item.total)"></span>
          </div>
        </div>

      </div>
      </template>
      <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem;">cart is empty</h4>
      <h4 x-show="$store.cart.items.length"><span x-text="rupiah($store.cart.total)"></h4>

      <div class="form-container" x-show="$store.cart.items.length">
        <form action="" id="checkoutForm">
          <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)" >
          <input type="hidden" name="total" x-model="$store.cart.total" >
          <h5>Customer Detail</h5>
            <label for="name">
              <span>Name</span>
              <input type="text" name="name" id="name">
            </label>
            <label for="email">
              <span>Phone</span>
              <input type="number" name="phone" id="phone" autocomplete="off">
            </label>
            <label for="phone">
              <span>Email</span>
              <input type="email" name="email" id="email">
            </label>
            <button class="checkout-button disabled" type="submit" id="checkout-button" value="checkout">Checkout</button>
        </form>
      </div>
    </div>
    <!-- Shopping Cart end -->

  </nav>
  <!-- Navbar end --

  <!-- Products Section start -->
  <section class="products" id="products" x-data="products">
    <h2><span>Produk Unggulan</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde eum, ab fuga possimus iste.</p>
    @if($Obat->count() > 0)
    @foreach($Obat as $p)
                <div class="row">

                <template x-for="(item, index) in items" x-key="index">
                <div class="product-card">
                    <div class="product-icons">
                    <a href="#" @click.prevent="$store.cart.add(item)">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="../../assets/halaman_barang/img/feather-sprite.svg#shopping-cart" />
                    </svg></a>
                    <a href="#" class="item-detail-button"> <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="../../assets/halaman_barang/img/feather-sprite.svg#eye" />
                    </svg></a>
                    </div>
                    <div class="product-image">
                    <img :src="`../../assets/halaman_barang/img/products/${item.img}`" :alt="item.name">
                    </div>
                    <div class="product-content">
                    <h3 x-text="item.name"></h3>
                    <div class="product-stars">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <use href="../../assets/halaman_barang/img/feather-sprite.svg#star" />
                        </svg>
                    </div>
                    <div class="product-price"><span x-text="rupiah(item.price)"></span></div>
                    </div>
                </div>
                </template>


                </div>
         @endforeach
         @else
            <p>Tidak ada obat dalam kategori ini.</p>
         @endif
  </section>
  <!-- Products Section end -->


  <!-- Footer start -->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
      <a href="{{ route('home') }}">Beranda</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Kontak</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">sandhikagalih</a>. | &copy; 2023.</p>
    </div>
  </footer>
  <!-- Footer end -->

  <!-- Modal Box Item Detail start -->
  <div class="modal" id="item-detail-modal">
    <div class="modal-container">
      <a href="#" class="close-icon"><i data-feather="x"></i></a>
      <div class="modal-content">
        <img src="../../assets/halaman_barang/img/products/1.jpg" alt="Product 1">
        <div class="product-content">
          <h3>Product 1</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, tenetur cupiditate facilis obcaecati
            ullam maiores minima quos perspiciatis similique itaque, esse rerum eius repellendus voluptatibus!</p>
          <div class="product-stars">
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star"></i>
          </div>
          <div class="product-price">IDR 30K <span>IDR 55K</span></div>
          <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Box Item Detail end -->

  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>

  <!-- My Javascript -->
  <script src="../../assets/halaman_barang/js/script.js"></script>
</body>

</html>
