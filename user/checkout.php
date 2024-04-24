<?php
session_start();
include '../koneksi/koneksi.php';

if (isset($_GET['id_produk']) && isset($_GET['jumlah'])) {
    $id_produk = $_GET['id_produk'];
    $jumlah = $_GET['jumlah'];

    // Lakukan operasi yang diperlukan dengan data ini, misalnya, tambahkan ke dalam daftar belanja checkout.
    // Misalnya:
    // $_SESSION['checkout_items'][$id_produk] = $jumlah;
} else {
    // Jika data tidak lengkap, mungkin tampilkan pesan kesalahan atau kembali ke halaman sebelumnya.
    header('Location: keranjang.php');
    exit;
}

// Dapatkan informasi produk dari database
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$pecah = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Checkout</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
              background: linear-gradient(to bottom, #c8815f, #444); /* Gradien dari #c8815f ke putih */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .produk-info {
            display: flex;
            width: 40%;
            align-items: center;
            margin: auto;
            margin-bottom: 60px;
            background-color: #fff;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 20px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .produk-info img {
            border-radius: 5px;
            width: 80px;
            height: auto;
            margin-right: 20px;
        }

        .produk-detail {
            align-items: center;
            margin: auto;
            display: flex;
            flex-direction: column;
        }

        h2, h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #444;
        }

        input, textarea, button {
            width: 70%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        input::placeholder,
        textarea::placeholder {
            text-align: center;
            display: none !important;
        }

        p {
            font-weight: bold;
            color: #333;
            margin-top: -1px;
        }

        button {
        background-color: #c8815f; color: #fff; letter-spacing: 1px; font-weight: 800; border: none; border-radius: 10px; cursor: pointer;
        transition: .3s;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        button:hover {
            background-color: #333;
            
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="display: flex;align-items: center; justify-content: center;margin-bottom: 50px;">Halaman <span style="color: #c8815f;"> Checkout </span></h2>
        
        <form action="proses_checkout.php" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="produk-info">
            <img src="../assets/foto_produk/<?= $pecah['foto_produk']; ?>" alt="Product Image" style="border-radius: 5px; width: 80px; height: auto; margin-right: 20px;">
            <div class="produk-detail" style="align-items: center; margin: auto; display: flex; flex-direction: column;">
                <h3><?= $pecah['nama_produk']; ?></h3>
                <p>Jumlah: <?= $jumlah; ?></p>
                <p class="harga">Rp<?= number_format($pecah['harga_produk']); ?></p>
            </div>
        </div>

            <label for="nama">Nama:</label>
            <input require type="text" id="nama" name="nama" required style="width: 70%; padding: 12px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 10px;">

            <label for="alamat">Alamat Pengiriman:</label>
            <input require id="alamat" name="alamat" required style="width: 70%; padding: 12px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 10px;">

            <label for="no_telp">Nomor Telepon:</label>
            <input require type="tel" id="no_telp" name="no_telp" required style="width: 70%; padding: 12px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 10px;">

            <button type="submit"><a style="text-decoration: none;color: #fff;" href="konfirmasi.php">BUY NOW</a></button>
        </form>
    </div>
</body>
</html>
