
<?php
session_start();
include '../koneksi/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .page-keranjang {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .card-body {
            text-align: center;
        }

        .produk {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }

        .produk img {
            width: 80px;
            height: auto;
            margin-right: 20px;
            border-radius: 5px;
        }

        .harga {
            font-weight: bold;
        }

        .btn-hapus {
            background-color: #c8815f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Menambahkan efek transisi */
        }
        
        .btn-hapus:hover {
    color: #fff;
    background-color: #333; /* Ganti warna sesuai keinginan Anda */

}

        /* Style tambahan sesuai kebutuhan */
        @media (max-width: 767px) {
            .produk {
                flex-direction: column;
                text-align: center;
            }

            .produk img {
                margin: 0 auto 10px;
            }
        }
    </style>
</head>
<body style="text-transform: capitalize;">

    <section class="page-keranjang">
        <div class="container">

            <div class="card box">
                <div class="card-body">
                    <h2>Keranjang Belanja</h2>
                    <p>Anda mempunyai (4) item di dalam keranjang belanja</p>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <?php foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) : ?>
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subtotal = $pecah['harga_produk'] * $jumlah;
                        ?>
                        <div class="produk">
                            <img src="../assets/foto_produk/<?= $pecah['foto_produk']; ?>" alt="Product Image">
                            <div>
                                <h4><?= $pecah['nama_produk']; ?></h4>
                                <p>Jumlah: <?= $jumlah; ?></p>
                                <p class="harga">Rp<?= number_format($pecah['harga_produk']); ?></p>
                                <p class="harga">Subtotal: Rp<?= number_format($subtotal); ?></p>
                                <div class="row">
                                    <div class="col-4">
                              <form action="hapus_produk.php" method="post">
                                <input type="hidden" name="id_produk" value="<?= $id_produk; ?>">
                            <button type="submit" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $pecah['nama_produk']; ?> dari keranjang?')">Hapus</button>

                        </form>
                        </div>

                       <div class="col" style="margin-left: 4px;">
                            <a href="checkout.php?id_produk=<?= $id_produk ?>&jumlah=<?= $jumlah ?>" class="btn btn-hapus">Checkout</a>
                        </div>
                        </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="row mt-3">
                        <div class="col-10">
                        <a href="index.php" class="btn btn-secondary">kembali</a>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
