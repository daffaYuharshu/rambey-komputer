<?php
    require '../koneksi.php';

    if (isset($_POST["register"])){

        if( registrasi($_POST) > 0 ){
          echo "<script>alert('User baru berhasil ditambahkan'); window.location.href = 'login.php';</script>";
          exit;
        } else{
            echo mysqli_error($koneksi);
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
    <link rel="stylesheet" href="assets/css/registrasi.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" /> -->
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
        <h4 class="sign">Sign - Up</h4>
        <form action="" method="post" class="form">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
                
            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="username">Nomor Telepon</label>
            <input type="text" name="notelepon" id="notelepon">
                
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
                
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" id="password2">
                
            <button type="submit" class="submit" name="register">Register</button>
            <a href="login.php" class="login">Login</a>
        </form>
        <div class="form">
        </div>
    </section>
  </body>
</html>
