<?php
include '../koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $id_barang = isset($_POST['id_barang']) && !empty($_POST['id_barang']) && $_POST['id_barang'] != 'auto' ? $_POST['id_barang'] : NULL;
    $nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
    $merek = isset($_POST['merek']) ? $_POST['merek'] : '';
    $img = isset($_POST['img']) ? $_POST['img'] : '';
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    $hargaint = isset($_POST['hargaint']) ? $_POST['hargaint'] : '';
    $stmt = $pdo->prepare('INSERT INTO barang (id_barang, nama_barang, merek, img, kategori, harga, hargaint) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id_barang, $nama_barang, $merek, $img, $kategori, $harga, $hargaint]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update barang">
	<h2>Create Barang</h2>
    <form action="create_barang.php" method="post">
        <label for="id_barang">ID Barang</label>
        <input type="text" name="id_barang" value="auto" id="id_barang">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang">
        <label for="merek">Merek</label>
        <input type="text" name="merek" id="merek">
        <label for="img">Link Image</label>
        <input type="text" name="img" id="img">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" id="kategori">
        <label for="harga">Harga</label>
        <input type="text" name="harga" id="harga">
        <label for="hargaint">Harga (integer)</label>
        <input type="text" name="hargaint" id="hargaint">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
