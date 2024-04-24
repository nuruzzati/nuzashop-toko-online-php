<?php
session_start();

// Periksa apakah pengguna telah melakukan checkout
if (isset($_SESSION['keranjang_belanja']) && !empty($_SESSION['keranjang_belanja'])) {
    // Tampilkan informasi konfirmasi pesanan
    $pesan = "Terima kasih atas pesanan Anda! Pesanan Anda akan di proses setelah konfirmasi pembayaran di nomer <a> 0895384290613</a>, hubungi untuk info lebih lanjut";

    // Hapus keranjang belanja setelah konfirmasi
    unset($_SESSION['keranjang_belanja']);
} else {
    // Jika keranjang belanja kosong, mungkin pengguna mengakses halaman ini tanpa melakukan checkout
    $pesan = "Mohon maaf, tidak ada pesanan yang ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #111;
            text-align: center;
            padding: 50px;
        }

        h1, p {
            margin-bottom: 20px;
        }

        a {
            color: #c8815f;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Konfirmasi Pesanan</h1>
    <p><?= $pesan ?></p>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
