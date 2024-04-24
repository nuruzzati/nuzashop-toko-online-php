<?php
session_start();

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];

    // Hapus item dari keranjang belanja
    unset($_SESSION['keranjang_belanja'][$id_produk]);

    // Redirect kembali ke halaman keranjang belanja
    header('Location: keranjang.php');
    exit();
}
?>
