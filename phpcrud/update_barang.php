<?php
include '../koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Check if the ID is specified
if (isset($_GET['id_barang'])) {
    // Check if the form is submitted
    if (!empty($_POST)) {
        // Retrieve form data
        $id_barang = isset($_POST['id_barang']) ? $_POST['id_barang'] : '';
        $nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
        $merek = isset($_POST['merek']) ? $_POST['merek'] : '';
        $img = isset($_POST['img']) ? $_POST['img'] : '';
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
        $hargaint = isset($_POST['hargaint']) ? $_POST['hargaint'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE barang SET id_barang = ?, nama_barang = ?, merek = ?, img = ?, kategori = ?, harga = ?, hargaint = ? WHERE id_barang = ?');
        if ($stmt->execute([$id_barang, $nama_barang, $merek, $img, $kategori, $harga, $hargaint, $_GET['id_barang']])) {
            $msg = 'Record updated successfully!';
        } else {
            exit('Error updating the record.');
        }
    }

    // Fetch the existing record from the database
    $stmt = $pdo->prepare('SELECT * FROM barang WHERE id_barang = ?');
    $stmt->execute([$_GET['id_barang']]);
    $barang = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the record exists
    if (!$barang) {
        exit('Barang doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Edit')?>

<div class="content update">
	<h2>Edit Barang #<?=$barang['id_barang']?></h2>
    <form action="update_barang.php?id_barang=<?=$barang['id_barang']?>" method="post">
        <label for="id_barang">ID Barang</label>
        <input type="text" name="id_barang" value="<?=$barang['id_barang']?>" id="id_barang">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" value="<?=$barang['nama_barang']?>" id="nama_barang">
        <label for="merek">Merek</label>
        <input type="text" name="merek" value="<?=$barang['merek']?>" id="merek">
        <label for="img">Img</label>
        <input type="text" name="img" value="<?=$barang['img']?>" id="img">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" value="<?=$barang['kategori']?>" id="kategori">
        <label for="harga">Harga</label>
        <input type="text" name="harga" value="<?=$barang['harga']?>" id="harga">
        <label for="hargaint">Hargaint</label>
        <input type="text" name="hargaint" value="<?=$barang['hargaint']?>" id="hargaint">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
