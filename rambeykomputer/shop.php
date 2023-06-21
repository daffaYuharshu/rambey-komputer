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
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rambey's computer</title>
	<link rel="stylesheet" href="aseets/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
	<link rel="stylesheet" href="slick/slick.css" />
	<link rel="stylesheet" href="slick/slick-theme.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/shoppp.css" />
</head>

<body>
	
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
<section id="container">
		<section id="product1" class="section-p1">
			<div class="pro-container">
			<?php
			include "../koneksi.php";

			// Fungsi untuk memfilter produk
			function filterProducts($filters) {
				global $koneksi;

				// Memeriksa apakah ada filter yang dipilih
				if (empty($filters)) {
					$data = mysqli_query($koneksi, "SELECT * FROM barang");
				} else {
					$filterString = implode("', '", $filters);
					$query = "SELECT * FROM barang WHERE kategori IN ('$filterString')";
					$data = mysqli_query($koneksi, $query);
				}

				$hasil = mysqli_fetch_array($data);
				if (empty($hasil)) {
					?>
					<div class="barang-kosong">
						<img src="assets/img/shop/png-clipart-shopping-cart-supermarket-shopping-cart-furniture-retail-removebg-preview.png" alt="No Products" />
						<p>Barang yang Anda cari sedang kosong.</p>
					</div>
					<?php
				} else {
					mysqli_data_seek($data, 0); // Mengatur kursor data kembali ke awal
					while ($hasil = mysqli_fetch_array($data)) {
						?>
						<div class="pro" data-categories=<?php echo $hasil['kategori']; ?>>
							<img src=<?php echo $hasil['img']; ?> alt="" />
							<div class="des">
								<span><?php echo $hasil['merek']; ?></span>
								<h5><?php echo $hasil['nama_barang']; ?></h5>
								<div class="star">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<h4><?php echo $hasil['harga']; ?></h4>
							</div>
							<a href="detail.php?nama_barang=<?php echo $hasil['nama_barang']; ?>&harga=<?php echo $hasil['harga']; ?>&id_barang=<?php echo $hasil['id_barang']; ?>&merek=<?php echo $hasil['merek']; ?>&img=<?php echo $hasil['img']; ?>&kategori=<?php echo $hasil['kategori']; ?>&hargaint=<?php echo $hasil['hargaint']; ?>"><i class="fas fa-shopping-cart cart"></i></a>
						</div>
						<?php
					}
				}

			}

			// Memproses filter ketika form dikirim
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$filters = array();
				for ($i = 1; $i <= 7; $i++) {
					if (!empty($_POST['Komponen' . $i])) {
						$filters[] = $_POST['Komponen' . $i];
					}
				}
				filterProducts($filters);
			} else {
				// Menampilkan semua produk saat halaman pertama kali dimuat
				filterProducts(array());
			}
			?>

			</div>
		</section>
	<div class="filter">
		<form id="filterForm" method="POST">
			<input type="checkbox" id="Komponen1" name="Komponen1" value="processor">
			<label for="Komponen1"> Processor</label><br>
			<input type="checkbox" id="Komponen2" name="Komponen2" value="VGA">
			<label for="Komponen2"> VGA</label><br>
			<input type="checkbox" id="Komponen3" name="Komponen3" value="motherboard">
			<label for="Komponen3"> Motherboard</label>
			<br><input type="checkbox" id="Komponen4" name="Komponen4" value="RAM">
			<label for="Komponen4"> RAM</label><br>
			<input type="checkbox" id="Komponen5" name="Komponen5" value="SSD">
			<label for="Komponen5"> SSD</label><br>
			<input type="checkbox" id="Komponen6" name="Komponen6" value="HDD">
			<label for="Komponen6"> HDD</label>
			<br><input type="checkbox" id="Komponen7" name="Komponen7" value="monitor">
			<label for="Komponen7"> Monitor</label>
			<br><input type="submit" value="Cari">
		</form>
	</div>
</section>
<script>
		// Menyimpan status checkbox saat form dikirim
		document.addEventListener("DOMContentLoaded", function() {
			const filterForm = document.getElementById("filterForm");
			const checkboxes = filterForm.querySelectorAll("input[type='checkbox']");

			// Mengatur status checkbox berdasarkan localStorage saat halaman dimuat
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = localStorage.getItem(checkbox.id) === "true";
			});

			// Menyimpan status checkbox ke localStorage saat checkbox diubah
			checkboxes.forEach(function(checkbox) {
				checkbox.addEventListener("change", function() {
					localStorage.setItem(checkbox.id, checkbox.checked);
				});
			});
		});
	</script>
</body>

</html>