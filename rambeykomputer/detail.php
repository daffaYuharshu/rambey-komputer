<!DOCTYPE html>
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
// Memeriksa apakah parameter gambar ada dalam URL
if (isset($_GET['img'])) {
    $img = $_GET['img'];
} else {
    // Jika parameter gambar tidak ada, atur nilai default
    $img = 'path/to/default/image.jpg';
}

// Jika Anda juga memerlukan variabel lainnya dari shop.php, Anda dapat mengambilnya di sini
if (isset($_GET['nama_barang'])) {
    $nama_barang = htmlspecialchars($_GET['nama_barang']);
} else {
    $nama_barang = 'Nama Produk Default';
}

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];
} else {
    $id_barang = 'ID Produk Default';
}

if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];
} else {
    $kategori = 'Kategori Default';
}

if (isset($_GET['harga'])) {
    $harga = $_GET['harga'];
} else {
    $harga = 'Harga Default';
}

if (isset($_GET['merek'])) {
    $merek = $_GET['merek'];
} else {
    $merek = 'Merek Default';
}
if (isset($_GET['hargaint'])) {
    $hargaint = $_GET['hargaint'];
} else {
    $merek = 'Hargaint Default';
}

?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rambey's computer</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
	<link rel="stylesheet" href="slick/slick.css" />
	<link rel="stylesheet" href="slick/slick-theme.css" />
	<link rel="stylesheet" href="assets/css/detail1.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- <link rel="stylesheet" href="test.css"> -->
</head>
<body>
	<!-- loader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    
	<div class="content">
		<!-- navbar -->
	<section id="header">
      <a href="#"><img src="assets/img/logo/rambey-header.jpg" /></a>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a class="active" href="shop.php">Shop</a></li>
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
	
	<a href="shop.php" class="back"><<< Kembali</a>
	
	<section class="main">
		
		<div class="gambar-produk">
            <img class="solid" src= <?php echo $img; ?> alt="VGA">
            
        </div>

		<div class="terjual">
			
			<div class="detail">
				<div class="head">
					<h3><?php echo $nama_barang; ?></h3>
					<h6><?php echo $merek; ?></h6>
				</div>
				<div class="bottom">
					<h5>Id : <?php echo $id_barang; ?> </h5>
					<h5>Kategori : <?php echo $kategori; ?></h5>
					<h5>Harga : <?php echo $harga; ?></h5>
				</div>
			</div>
			<div class="pemesanan">
				<div class="isi">
					
					<table>
						<tr>
							<td><label for="jumlah">Jumlah :</label></td>
							<td><input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Pembelian" value="<?php echo isset($_POST['jumlah']) ? $_POST['jumlah'] : '0'; ?>"></td>
							<td><button class="check" onclick="calculateTotal()">Check</button></td>
						</tr>
						<tr>
							<td><label for="total">Total :</label></td>
							<td><input type="text" name="total" id="total" readonly></td>
						</tr>
					</table>
					
					
				</div>
				<form action="cart.php" method="POST">
					<input type="hidden" name="nama_barang" value="<?php echo $nama_barang; ?>">
					<input type="hidden" name="harga" value="<?php echo $harga; ?>">
					<input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
					<input type="hidden" name="merek" value="<?php echo $merek; ?>">
					<input type="hidden" name="img" value="<?php echo $img; ?>">
					<input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
					<input type="hidden" name="hargaint" value="<?php echo $hargaint; ?>">
					<input type="hidden" name="jumlah" id="jumlah-hidden">
					<button class="keranjang" id="tambah-keranjang" disabled>Tambahkan ke Keranjang</button>
				</form>
			</div>
		</div>
		
        
    </section>
	</div>
	
	<script>
        function calculateTotal() {
		var jumlah = parseInt(document.getElementById('jumlah').value);
		var hargaPerUnit = <?php echo $hargaint; ?>;
		var total = jumlah * hargaPerUnit;
		document.getElementById('total').value = total;
		document.getElementById('jumlah-hidden').value = jumlah;

		// Aktifkan tombol "Tambahkan ke Keranjang" jika jumlah lebih dari 0
        var tambahKeranjangBtn = document.getElementById('tambah-keranjang');
        if (jumlah > 0) {
            tambahKeranjangBtn.disabled = false;
        } else {
            tambahKeranjangBtn.disabled = true;
        }
	}
    </script>
</body>
</html>
    

    