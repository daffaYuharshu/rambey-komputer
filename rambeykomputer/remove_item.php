<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_barang'])) {
        $id_barang = $_POST['id_barang'];
        removeItemFromCart($id_barang);
    }
}

function removeItemFromCart($id_barang) {
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $item) {
            if ($item["id_barang"] === $id_barang) {
                unset($_SESSION["cart"][$key]);
                break;
            }
        }
    }
}

?>