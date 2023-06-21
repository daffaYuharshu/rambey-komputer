<?php
include '../koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Check if the ID is specified
if (isset($_GET['id_barang'])) {
    // Select the record to be deleted
    $stmt = $pdo->prepare('SELECT * FROM barang WHERE id_barang = ?');
    $stmt->execute([$_GET['id_barang']]);
    $barang = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if the record exists
    if (!$barang) {
        exit('Barang doesn\'t exist with that ID!');
    }
    
    // Check if the user confirms the deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete the record
            $stmt = $pdo->prepare('DELETE FROM barang WHERE id_barang = ?');
            $stmt->execute([$_GET['id_barang']]);
            $msg = 'Record has been deleted!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read_barang.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Barang #<?=$barang['id_barang']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete field #<?=$barang['id_barang']?>?</p>
    <div class="yesno">
        <a href="delete_barang.php?id_barang=<?=$barang['id_barang']?>&confirm=yes">Yes</a>
        <a href="delete_barang.php?id_barang=<?=$barang['id_barang']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>
