<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION["login"])) {
  echo "<script>alert('Harap login terlebih dahulu'); window.location.href = 'login.php';</script>";
  exit;
}

// Memeriksa apakah ada data yang dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengecek apakah data yang dibutuhkan tersedia
    if (isset($_POST['nama_barang']) && isset($_POST['harga']) && isset($_POST['id_barang']) && isset($_POST['merek']) && isset($_POST['img']) && isset($_POST['kategori']) && isset($_POST['hargaint']) && isset($_POST['jumlah'])) {
        $nama_barang = ($_POST['nama_barang']);
        $harga = $_POST['harga'];
        $id_barang = $_POST['id_barang'];
        $merek = $_POST['merek'];
        $img = $_POST['img'];
        $kategori = $_POST['kategori'];
        $hargaint = $_POST['hargaint'];
        $jumlah = $_POST['jumlah'];
    } else {
        // Data yang diperlukan tidak ada
        echo "Data yang diperlukan tidak tersedia.";
        $nama_barang = 'Barang kosong';
        $harga = 0;
        $id_barang = 'Barang kosong';
        $merek = 'Barang kosong';
        $img = 'path/to/default/image.jpg';
        $kategori = 'Barang kosong';
        $hargaint = 0;
        $jumlah = 0;
    }

    // Menginisialisasi keranjang belanja jika belum ada
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Mengecek apakah barang sudah ada di keranjang
    $itemExists = false;
    foreach ($_SESSION["cart"] as $key => $item) {
        if ($item["id_barang"] === $id_barang) {
            $itemExists = true;
            $_SESSION["cart"][$key]["jumlah"] += 1;
            break;
        }
    }

    // Jika barang belum ada di keranjang, tambahkan sebagai item baru
    if (!$itemExists) {
        $item = array(
            "id_barang" => $id_barang,
            "nama_barang" => $nama_barang,
            "harga" => $harga,
            "merek" => $merek,
            "img" => $img,
            "kategori" => $kategori,
            "hargaint" => $hargaint,
            "jumlah" => $jumlah,
        );
        array_push($_SESSION["cart"], $item);
    }
} else {
    // Tidak ada data yang dikirim melalui POST
    $nama_barang = 'Barang kosong';
    $harga = 0;
    $id_barang = 'Barang kosong';
    $merek = 'Barang kosong';
    $img = 'path/to/default/image.jpg';
    $kategori = 'Barang kosong';
    $hargaint = 0;
    $jumlah = 0;
}

$jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : 0;

?>

<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rambey's computer CART</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/cart.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <!-- navbar -->
  <section id="header">
    <a href="#"><img src="assets/img/logo/rambey-header.jpg" /></a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="about.php">About</a></li>
        <li>
          <a class="active" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        </li>
        <li>
          <a href="login.php"><i class="material-icons" style="font-size:32px">account_circle</i></a>
        </li>
      </ul>
    </div>
  </section>
  <div class="container">
    <div class="left-side">
      <h2>Cart List</h2>
      <?php if (empty($_SESSION["cart"]) && $nama_barang == 'Barang kosong') : ?>
        <img src="assets/img/shop/png-clipart-shopping-cart-supermarket-shopping-cart-furniture-retail-removebg-preview.png" alt="">
        <p>Keranjang kosong. Tidak ada produk yang ditampilkan.</p>
      <?php else : ?>
        <div class="ada">
          <div class="kiri">
            <div class="select-all">
              <input type="checkbox" id="select-all" class="checkbox">
              <label for="select-all">Select All</label>
            </div>

            <div>
              <?php foreach ($_SESSION["cart"] as $key => $item) : ?>
                <div class="product-item">
                  <input type="checkbox" class="checkbox">
                  <img class="product-image" src="<?php echo $item['img']; ?>" alt="Product Image">
                  <div class="product-details">
                    <div class="product-name"><?php echo $item['nama_barang']; ?></div>
                    <div class="product-price"><?php echo $item['harga']; ?></div>
                    <div class="quantity-input">
                      <span class="quantity-text"></span>
                      <button class="quantity-button minus" data-id="<?php echo $item['id_barang']; ?>">-</button>
                      <input type="number" class="jumlah-barang" value="<?php echo $item['jumlah']; ?>" readonly>
                      <button class="quantity-button plus" data-id="<?php echo $item['id_barang']; ?>">+</button>
                    </div>
                  </div>
                  <i class="fas fa-trash-alt trash" data-id="<?php echo $item['id_barang']; ?>"></i>
                </div>

              <?php endforeach; ?>
            </div>
          </div>

          <div class="right-side">
            <div class="promo">
              <button class="promo-button">Use Coupon</button>
            </div>
            <div class="order-summary">
              <h2>Rincian Belanja</h2>
              <div class="rincian">
                <?php foreach ($_SESSION["cart"] as $key => $item) : ?>
                  <div class="harga" id="rincian-<?php echo $item['id_barang']; ?>">
                    <p>Barang : <?php echo $item['nama_barang']; ?></p>
                    <p>Jumlah : <span id="jumlah-<?php echo $item['id_barang']; ?>"><?php echo $item['jumlah']; ?></span></p>
                    <p>Harga : <span  id="harga-<?php echo $item['id_barang']; ?>"><?php echo $item['hargaint'] * $item["jumlah"]; ?></span></p>
                    <hr>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="total-price">
              <label class="tulisan-subtotal">Total : </label>
              <input type="number" readonly id="subtotal" value="<?php echo calculateTotalPrice($_SESSION["cart"]); ?>">
            </div>
            <button class="buy-button">Buy</button>
          </div>
          </div>
        </div>
      <?php endif; ?>

      <?php
      // Fungsi untuk menghitung total harga
      function calculateTotalPrice($cart)
      {
        $total = 0;
        foreach ($cart as $item) {
          $total += $item["hargaint"] * $item["jumlah"];
        }
        return $total;
      }

      function removeItemFromCart($id_barang) {
        if (isset($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $key => $item) {
            if ($item["id_barang"] === $id_barang) {
              unset($_SESSION["cart"][$key]);
              break;
            }
          }
        }
      }
      ?>
      
    </div>
  </div>
  
  <?php if (empty($_SESSION["cart"]) && $nama_barang == 'Barang kosong') : ?>
  <script>
    var container = document.querySelector('.container');
    container.innerHTML = `
      <div class="left-side">
        <h2>Cart List</h2>
        <img src="assets/img/shop/png-clipart-shopping-cart-supermarket-shopping-cart-furniture-retail-removebg-preview.png" alt="">
        <p>Keranjang kosong. Tidak ada produk yang ditampilkan.</p>
      </div>
    `;
  </script>
<?php else : ?>
  <script>
    document.querySelectorAll('.quantity-button').forEach(function(button) {
      button.addEventListener('click', function() {
        var input = this.parentNode.querySelector('.jumlah-barang');
        var input2 = this.parentNode.querySelector('.harga-barang');

        var quantity = parseInt(input.value);

        if (this.classList.contains('minus')) {
          if (quantity === 1) {
            quantity = 1;
          } else {
            quantity -= 1;
          }
        } else if (this.classList.contains('plus')) {
          quantity += 1;
        }

        input.value = quantity;
        var id_barang = this.getAttribute('data-id');
        var jumlah = document.getElementById('jumlah-' + id_barang);
        jumlah.textContent = quantity;
        var harga = document.getElementById('harga-' + id_barang);
        var hargaText = harga.textContent;
        var hargaint = parseInt(hargaText) / parseInt(quantity);
        harga.textContent = hargaint * quantity;
        calculateTotalPrice();
      });
    });

    function calculateTotalPrice() {
      var quantities = document.querySelectorAll('.jumlah-barang');
      var prices = <?php echo json_encode(array_column($_SESSION["cart"], 'hargaint')); ?>;
      var total = 0;
      for (var i = 0; i < quantities.length; i++) {
        var quantity = parseInt(quantities[i].value);
        var price = parseInt(prices[i]);
        total += quantity * price;
        var id_barang = quantities[i].parentNode.querySelector('.plus').getAttribute('data-id');
        var harga = document.getElementById('harga-' + id_barang);
        harga.textContent = price * quantity;
      }
      document.getElementById('subtotal').value = total;
    }
    

    document.querySelectorAll('.trash').forEach(function(trash) {
  trash.addEventListener('click', function() {
    var id_barang = this.getAttribute('data-id');
    var productItem = this.parentNode;
    var rincianItem = document.getElementById('rincian-' + id_barang);

    removeItemFromCart(id_barang, productItem, rincianItem);
    
  });
});

function removeItemFromCart(id_barang, productItem, rincianItem) {
  // Hapus item dari session cart
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Hapus item dari tampilan
      productItem.remove();
      rincianItem.remove();
      
      calculateTotalPrice();
    }
  };
  xhr.open('POST', 'remove_item.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('id_barang=' + encodeURIComponent(id_barang));
}A
  </script>
<?php endif; ?>

  
</body>

</html>
