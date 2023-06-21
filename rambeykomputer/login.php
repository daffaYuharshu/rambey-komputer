<?php
session_start();

if( isset($_SESSION["login"]) ){
  header("location: profile.php");
  exit;
}

require '../koneksi.php';

  if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'" );

    //cek username
    if (mysqli_num_rows($result) === 1) {
      // cek password
      $row = mysqli_fetch_assoc($result);
      if ($password === $row["password"]) {
        //set session
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $row["email"];
        $_SESSION["notelepon"] = $row["notelepon"];

        header("Location: index.php");
        exit;
      }
    }

    $error = true;  
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
    <link rel="stylesheet" href="assets/css/login.css" />
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
        <h4 class="login">Login</h4>
        <?php if (isset($error)) : ?>
          <p style="color:red; font-style: italic;">Username / password salah</p>
        <?php endif; ?>
        <form action="" method="post" class="form">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit" class="submit" name="login">Login</button>
            <a href="registrasi.php" class="sign">Sign-Up</a>
        </form>
        
    </section>
  </body>
</html>
