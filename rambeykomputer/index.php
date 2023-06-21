<?php
session_start();
// Periksa apakah keranjang belanja ada atau belum
if (isset($_SESSION["cart"])) {
  // Loop melalui setiap barang dalam keranjang belanja
  foreach ($_SESSION["cart"] as $barang) {
      $nama_barang = $barang["nama_barang"];
      $harga_barang = $barang["harga"];
      $jumlah_barang = $barang["jumlah"];

    
  }
} 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rambey Komputer</title>
    <script>
      // detect IE8 and above, and edge
      if (document.documentMode || /Edge/.test(navigator.userAgent)) {
        alert("Please use Chrome or Firefox for best browsing experience!");
      }
    </script>

    <!-- load CSS -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" /> -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="slick/slick.css" />
    <link rel="stylesheet" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" /> -->
  </head>

  <body>
    <!-- loader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>

    <!-- navbar -->
    <section id="header">
      <a href="#"><img src="assets/img/logo/rambey-header.jpg" /></a>
      <div>
        <ul id="navbar">
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
          </li>
          <li>
            <a href="login.php"><i class="material-icons" style="font-size:32px">account_circle</i></a>
          </li>
        </ul>
      </div>
    </section>

    <!-- login -->
    <!-- <div class="wrapper">
      <div class="form-box login">
        <h2>login</h2>
        <form action="#">
          <div class="input-box">
            <span class="icon"></span>
            <input type="email" required>
            <label for="#">Email</label>
          </div>   
          <div class="input-box">
            <span class="icon"></span>
            <input type="password" required>
            <label for="#">password</label>
          </div>   
        </form>
      </div>
    </div> -->
    <!-- hero section -->
    <section id="hero">
      <h4>Get-your-build-PC</h4>
      <h2>Super value deals</h2>
      <h1>On all product</h1>
      <p>Save more with coupons & up to 30% off</p>
      <button>Shop now</button>
    </section>
    <!-- Services -->
    <section id="feature" class="section-p1">
      <h1>Our Services</h1>
      <div class="fe-box">
        <img src="assets/img/features/f1.png" width="200px" alt="" />
        <h6>Free Shipping</h6>
      </div>
      <div class="fe-box">
        <img src="assets/img/features/f2.png" width="200px" alt="" />
        <h6>Online Order</h6>
      </div>
      <div class="fe-box">
        <img src="assets/img/features/f3.png" width="200px" alt="" />
        <h6>Save Money</h6>
      </div>
      <div class="fe-box">
        <img src="assets/img/features/f4.png" width="200px" alt="" />
        <h6>Promotions</h6>
      </div>
      <div class="fe-box">
        <img src="assets/img/features/f5.png" width="200px" alt="" />
        <h6>Happy Sell</h6>
      </div>
      <div class="fe-box">
        <img src="assets/img/features/f6.png" width="200px" alt="" />
        <h6>24/7 Support</h6>
      </div>
      <h1></h1>
    </section>

    <!-- product -->
    <section id="product1" class="section-p1">
      <h2>Featured Products</h2>
      <p>Many People Buy This Products</p>
      
      <div class="pro-container">
      <?php
        include "../koneksi.php";
        $data = mysqli_query($koneksi, "SELECT * FROM barang limit 7");
        while ($hasil = mysqli_fetch_array($data)) {
          ?>
            <div class="pro">
            <img src=<?php echo $hasil['img'] ; ?> alt="" />
            <div class="des">
              <span><?php echo $hasil['merek'] ;?></span>
              <h5><?php echo $hasil['nama_barang'] ;?></h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4><?php echo $hasil['harga'] ;?></h4>
            </div>
            <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
          <?php
        }
      ?>
    </section>

    <!-- banner discount -->
    <section id="banner">
      <h4>Repair Services</h4>
      <h2>Up to <span>30% off</span></h2>
      <button class="white">Explore more</button>
    </section>

    <!-- discount -->
    <section id="product1" class="section-p1">
      <h2>Discount Products</h2>
      <p>Get your PC with the best price</p>
      <div class="pro-container">
        <?php
          $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori = 'monitor'");
          while ($hasil = mysqli_fetch_array($data)){
            ?>
            <div class="pro">
            <img src=<?php echo $hasil['img'] ;?> alt="" />
            <div class="des">
              <span><?php echo $hasil['merek'] ;?></span>
              <h5><?php echo $hasil['nama_barang'] ;?></h5>
              <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <h4><?php echo $hasil['harga'] ;?></h4>
            </div>
            <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
          <?php
          }
        ?>
      </div>
    </section>

    <!-- banner product
    <section id="sm-banner" class="section-p1">
      <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>buy 2 get 1 free</h2>
        <span>get the best price to build pc</span>
        <button class="white">Learn More</button>
      </div>
      <div class="banner-box">
        <h4>crazy deals</h4>
        <h2>buy 2 get 1 free</h2>
        <span>get the best price to build pc</span>
        <button class="white">Learn More</button>
      </div>
    </section> -->

    <!-- brand -->
    <section id="brand-box">
      <h4>Shop by Brands</h4>
      <div class="brands">
        <img src="brands/001-AMD.png" />

        <img src="brands/002-intel.png" />
        <img src="brands/004-prime gaming.png" />
        <img src="brands/005-galax.png" />
        <img src="brands/asrock.png" />
        <img src="brands/evga.png" />
        <img src="brands/hof[galax].png" />
        <img src="brands/lg.png" />
        <img src="brands/logitech.png" />
        <img src="brands/msi.png" />
        <img src="brands/nvidia[galax].png" />
        <img src="brands/razer.png" />
        <img src="brands/rog[asus].png" />
        <img src="brands/zotac.png" />
      </div>
    </section>

    <!-- footer -->
    <br>
    <br>
    <br>

    <section class="footer_one">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
            <div class="div">
              <h4>Bantuan</h4>
              <ul class="list-unstyled">
                <li><a href="#" target="#">Cara Berbelanja</a></li>
                <li><a href="#" target="#">Cara Pembayaran</a></li>
                <li><a href="#" target="#">Status Pemesanan</a></li>
                <li><a href="#" target="#">Layanan Pengiriman</a></li>
                <li><a href="#" target="#">Pengembalian Produk </a></li>
                <li><a href="#" target="#">Hubungi Kami</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
            <div class="div">
              <h4>Customer Care</h4>
              <p>
                Klaim dan Garansi product, silahkan hubungi:
                <br />
                RMA Rambeykomputer Website
                <br />
                Buka Senin-Sabtu, 10:00-18:00 WIB
                <br />
                0857 1234 5678
                <br />
                Mangga Dua Mall Lt.7 No. 31-32 Jakarta Pusat 10730
              </p>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
            <div class="div">
              <h4>Tentang Kami</h4>
              <ul class="list-unstyled">
                <li><a href="#" target="#">Tentang Kami</a></li>
                <li><a href="#" target="#">Kebijakan Privasi</a></li>
                <li><a href="#" target="#">Syarat dan Ketentuan</a></li>
                <li><a href="#" target="#">Artikel</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
            <div class="div">
              <h4>Toko Kami</h4>
              <p>Rambey's Komputer</p>
              <p>Mangga Dua Mall Lt.3 No. 31-32 Jakarta Pusat 10730</p>
              <p>+6221-1234 5678</p>
              <p>rambeykomputer@gmail.com</p>
            </div>
          </div>
          <h4>Shop by Brands</h4>
          <div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
            <div class="div kurir">
              <h4>Metode Pengiriman</h4>
              <img src="kurir/anteraja.svg" />
              <img src="kurir/gojek.svg" />
              <img src="kurir/grab.svg" />
              <img src="kurir/jne.svg" />
              <img src="kurir/mex.svg" />
              <img src="kurir/shopee.svg" />

            </div>

          </div>
        </div>
      </div>
    </section>
  </body>
</html>
