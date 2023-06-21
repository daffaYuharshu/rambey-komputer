<?php
	session_start();
	require '../koneksi.php';
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
	<link rel="stylesheet" href="assetscss/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="slick/slick.css" />
    <link rel="stylesheet" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/profile.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="head">
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
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
          </li>
          <li>
            <a class="active" href="login.php"><i class="material-icons" style="font-size:32px">account_circle</i></a>
          </li>
        </ul>
      </div>
    </section>
    </div>
    

    <section class = "main">
        <h4 class="akun">Akun</h4>
        <form action="" method="post" class="form">
            <p>Username: <?php echo $_SESSION["username"]; ?></p>
			      <p>Email: <?php echo $_SESSION["email"]; ?></p>
			      <p>No Telepon: <?php echo $_SESSION["notelepon"]; ?></p>
            <a href="logout.php" class="logout">Logout</a>
        </form>
    </section>
    
</body>
</html>