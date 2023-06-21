<?php
$koneksi = mysqli_connect("localhost","root","","rambey");

if (mysqli_connect_errno()){
    echo "Koneksi Database Gagal:". mysqli_connect_errno();
}
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'rambey';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

function registrasi($data) {
    global $koneksi;

    $username = strtolower($data["username"]);
    $password = $data["password"];
    $password2 = $data["password2"];
    $email = $data["email"];
    $notelepon = $data["notelepon"];

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "select username from users where username = '$username'");
    if (mysqli_fetch_assoc($result) ){
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ( $password !== $password2 ){
        echo "<script>
            alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

   // tambahkan user baru ke database
   mysqli_query($koneksi, "INSERT INTO users values('', '$username','$email','$notelepon','$password')");
   return mysqli_affected_rows($koneksi);

}
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Rambey Computer Manage Account </h1>
                <a href="index.php"><i class="fas fa-home"></i>Home</a>
                <a href="read_login.php"><i class="fas fa-address-book"></i>Contacts</a>
                <a href="read_barang.php"><i class="fas fa-cart-plus"></i>Chart</a>
            </div>
        </nav>
    EOT;
    }
    function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }


?>