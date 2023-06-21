<?php
include '../koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $notelepon = isset($_POST['notelepon']) ? $_POST['notelepon'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE users SET id = ?, username = ?, email = ?, notelepon = ?, password = ? WHERE id = ?');
        $stmt->execute([$id, $username, $email, $notelepon, $password, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update_login.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="username">Nama</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="username" value="<?=$contact['username']?>" id="username">
        <label for="email">Email</label>
        <label for="notelepon">No. Telp</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <input type="text" name="notelepon" value="<?=$contact['notelepon']?>" id="notelepon">
        <label for="password">Password</label>
        <input type="password" name="password" value="<?=$contact['password']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>