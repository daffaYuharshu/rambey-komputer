<?php
include '../koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {

    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $notelepon = isset($_POST['notelepon']) ? $_POST['notelepon'] : '';
    $stmt = $pdo->prepare('INSERT INTO users VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $username, $email, $notelepon, $password]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update contract">
	<h2>Create Contact</h2>
    <form action="create_login.php" method="post">
        <label for="id">ID</label>
        <label for="username">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="username" id="username">
        <label for="email">Email</label>
        <label for="notelepon">No. Telp</label>
        <input type="text" name="email" id="email">
        <input type="text" name="notelepon" id="notelepon">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>


<?=template_footer()?>