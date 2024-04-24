<?php
// proses_pencarian.php
include '../koneksi/koneksi.php';

if (isset($_GET['search-button'])) {
    $keyword = $_GET['search-button'];

    // Implementasikan logika pencarian ke database
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'";
    $result = $koneksi->query($query);

    // Tampilkan hasil pencarian
    while ($detail_produk = $result->fetch_assoc()) {
        // ... (kode untuk menampilkan hasil pencarian)
    }
}
?>
