<?php
// Sambungkan ke database
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "toko_online");

// Periksa koneksi
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil ID produk dari parameter URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Buat query SQL untuk mengambil data produk berdasarkan ID
    $query = "SELECT * FROM produk WHERE id_produk = $id_produk";

    // Jalankan query
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        $detail_produk = mysqli_fetch_assoc($result);
        if ($detail_produk) {
            // Data produk ditemukan, sekarang tampilkan dalam HTML
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                 <!-- icons -->
                    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

                    
                  <!-- font googgle -->
                  <link rel="preconnect" href="https://fonts.googleapis.com">
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
                <style>
                                    :root {
                                        --bg-color: #fff;
                                        --text-color: #111;
                                        --main-color: #c8815f;
                                        --big-font: 4.5rem;
                                        --h2-font: 3.3rem;
                                        --h3-font: 2rem;
                                        --normal-font: 1rem;
                                    }

                                    * {
                                        margin: 0;
                                        padding: 0;
                                        box-sizing: border-box;
                                        list-style: none;
                                        text-decoration: none !important;
                                        font-family: 'Poppins', sans-serif;
                                        color: #111;
                                    }

                                    body {
                  background: var(--bg-color);
                  color: var(--text-color);
                        }

                        header {
                          width: 100%;
                          top: 0;
                          right: 0;
                          z-index: 1000;
                          position: fixed;
                          display: flex;
                          justify-content: space-between;
                          background: transparent;
                          transition: all 0.35s ease;
                          padding: 20px 14%;
                        }

                        .logo {
                          font-size: 28px;
                          font-weight: 700;
                          letter-spacing: 1px;
                          color: var(--text-color);
                        }

                        .navlist {
                          display: flex;
                          align-items: center;
                        }

                        .navlist a {
                          color: var(--text-color);
                          font-weight: 600;
                          padding: 10px 20px;
                          font-size: var(--normal-font);

                          transition: all 0.36s ease;
                        }
                        span {
                          color: var(--main-color);
                        }

                        .navlist a:hover {
                          color: var(--main-color);
                        }

                        .header-icons i {
                          font-size: 32px;
                          color: var(--text-color);
                          margin-right: 20px;
                          transition: all 0.36s ease;
                        }

                        .header-icons i:hover {
                          color: var(--main-color);
                        }

                        #menu-icon {
                          font-size: 34px;
                          color: var(--text-color);
                          z-index: 10001;
                          margin-right: 20px;
                          display: none;
                        }
                        header.sticky {
                          background: var(--bg-color);
                          padding: 14px 14%;
                          box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
                        }
                        .contact {
                          background: var(--text-color);
                          display: grid;
                          grid-template-columns: repeat(auto-fit, minmax(150px, auto));
                          gap: 2rem;
                        }

                        .main-contact h3 {
                          font-size: 23px;
                          margin-bottom: 1.6rem;
                          color: var(--bg-color);
                        }

                        .main-contact h5 {
                          font-size: 15px;
                          font-weight: 600;
                          color: #555;
                        }

                        .icons {
                          display: flex;
                          margin-top: 2rem;
                        }
                        .icons i {
                          font-size: 25px;
                          margin-right: 1rem;
                          color: #555;
                          transition: all 0.35s ease;
                        }

                        .icons i:hover {
                          color: var(--bg-color);
                          transform: scale(1.1) translateY(-5px);
                        }

                        .main-contact li {
                          margin-bottom: 15px;
                        }

                        .main-contact li a {
                          display: block;
                          color: #555;
                          font-weight: 600;
                          transition: all 0.35s ease;
                          font-size: var(--normal-font);
                        }

                        .main-contact li a:hover {
                          transform: translateX(-8px);
                          color: var(--bg-color);
                        }

                        .last-text {
                          text-align: center;
                          padding: 20px;
                          background: var(--text-color);
                        }

                        .last-text p {
                          color: #555;
                          font-size: 14px;
                          letter-spacing: 1px;
                        }

                        .top {
                          position: fixed;
                          bottom: 2rem;
                          right: 2rem;
                        }

                        .top i {
                          font-size: 22px;
                          color: var(--bg-color);
                          padding: 14px;
                          background: var(--main-color);
                          border-radius: 2rem;
                        }
                        @media (max-width: 1000px) {
                          header {
                            padding: 7px 4%;
                            transition: 0.2s;
                          }
                          header.sticky {
                            padding: 14px 4%;
                            transition: 0.2s;
                          }
                          section {
                            padding: 80px 4%;
                            transition: 0.1s;
                          }
                        }

                        @media (max-width: 670px) {
                          #menu-icon {
                            display: block;
                            cursor: pointer;
                          }
                          .header-icons {
                            display: inline-flex;
                          }
                          .navlist {
                            position: absolute;
                            top: 100%;
                            left: -100%;
                            width: 280px;
                            height: 120vh;
                            background: var(--bg-color);
                            display: flex;
                            align-items: center;
                            flex-direction: column;
                            padding: 150px 30px;
                            transition: all 0.45s ease;
                          }
                          section {
                          padding: 100px 14%;
                        }

                          .navlist a {
                            display: block;
                            margin: 1.2rem 0;
                          }
                          .navlist.open {
                            left: 0;
                          }
                        }

                        .xyz {
                            margin: px;
                            display: inline-block;
                          background: var(--main-color);
                          color: var(--bg-color);
                          padding: 6px 13px;
                          font-size: 15px;
                          font-weight: 600;
                          border-radius: 5px;
                          transition: all 0.35s ease;
                          border: none;
                        }

                        .btn a:hover {
                              background-color: #111 !important;
                              color: #fff !important;
                        }


                </style>

                <title>Detail Product</title>
            </head>
            <body style="text-transform: capitalize;">
<header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>Nuza<span>shop</span></a>
    <ul class="navlist">
      <li><a href="../user/index.php#home">home</a></li>
      <li><a href="../user/index.php#featured">Featured</a></li>
      <li><a href="../user/index.php#new">New</a></li>
      <li><a href="../user/index.php#all">All</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <div class="header-icons">
      <a href="keranjang.php"><i class='bx bx-shopping-bag'></i></a>
      <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header>

                <!-- Content -->
             <section class="py-5" style="margin-top: 70px;">
    <form action="" method="post">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygallery" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
                            <img class="rounded-2" width="100%" height="450" src="../assets/foto_produk/<?php echo $detail_produk['foto_produk']; ?>" alt="Product Image">
                        </a>
                    </div>
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h1 style="font-size: var(--h2-font); font-weight: 500; color: #111;" class="title text-dark">
                            <?php echo $detail_produk['nama_produk']; ?> <br>
                        </h1>
                        <!-- Tampilkan informasi produk lainnya -->
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">4.5</span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                            <span class="text-success ms-2">In stock</span>
                        </div>

                        <div class="mb-3">
                            <span style="font-size: var(--h3-font);" class="h5">Rp <?php echo number_format($detail_produk['harga_produk']); ?></span>
                            <span class="text-muted"></span>
                        </div>

                        <p>product description: <?php echo $detail_produk['deskripsi_produk']; ?></p>
                        <p>product weight: <?php echo $detail_produk['berat_produk']; ?></p>
                        <label>product stock:</label>
                        <input style="background-color: white; border: none;" disabled class="form-control" value="<?php echo $detail_produk['stok_produk']; ?>">

                        <!-- Tampilkan informasi produk lainnya sesuai kebutuhan -->
                        <div class="row mb-4">
                            <div class="col-md-4 col-6">
                                <label class="mb-2">Size</label>
                                <select class="form-select border border-secondary" style="height: 35px;">
                                    <option>One Size M to L</option>
                                </select>
                            </div>
                            <!-- col.// -->
                            <div class="col-md-4 col-6 mb-3">
                                <label class="mb-2 d-block">jumlah</label>
                                <input type="text" name="jumlah" class="form-control text-center border border-secondary" value="1" min="1" max="<?= $detail_produk['stok_produk'] ?>" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                            </div>
                        </div>

                        <a href="checkout.php?id_produk=<?= $id_produk ?>&jumlah=1" class="xyz"><i style="color: #fff;" class='bx bx-money'></i> Buy now</a>
                        <button style="border: none;" name="beli">
                            <a href="beli.php?idproduk=<?= $detail_produk['id_produk'] ?>" class="xyz"><i style="color: #fff;" class='bx bx-cart-add'></i> add to cart</a>
                        </button>
                        <a href="#" class="xyz py-2 icon-hover px-3"><i style="color: #fff;" class='bx bx-save'></i> Save</a>
                    </div>
                </main>
            </div>
        </div>
    </form>
</section>




                 <section style="padding: 100px 14% !important;margin-top: 50px;" class="contact" id="contact">
        <div class="main-contact">
          <h3>Nuza</h3>
          <h5>Let's Connect With Us</h5>
          <div class="icons">
            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
            <a href="#"><i class='bx bxl-whatsapp-square' ></i></a>
            <a href="#"><i class='bx bxl-facebook-square'></i></a>
          </div>
        </div>
        <div class="main-contact">
          <h3>Explore</h3>
            <li><a href="#home">Home</a></li>
            <li><a href="#featured">Featured</a></li>
            <li><a href="#new">New</a></li>
            <li><a href="#contact">Contact</a></li>
        </div>

        <div class="main-contact">
          <h3>Our Services</h3>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Free Shipping</a></li>
          <li><a href="#">Gift Cards</a></li>
        </div>
        <div class="main-contact">
          <h3>Shopping</h3>
          <li><a href="#">Clothing Store</a></li>
          <li><a href="#">Trending Shoes</a></li>
          <li><a href="#">Accesories</a></li>
          <li><a href="#">Sale</a></li>
        </div>
      </section>
                <?php 
             if (isset($_POST['beli'])) {
    $jumlah = $_POST['jumlah'];
    $_SESSION['keranjang_belanja'][$id_produk] = $jumlah;

    // Tambahkan echo atau var_dump di sini untuk memeriksa nilai
    echo "Jumlah setelah pembelian: " . $_SESSION['keranjang_belanja'][$id_produk];

    echo "<script>alert('produk berhasil masuk ke keranjang')</script>";
    echo "<script>location='keranjang.php';</script>";
}

                ?>

                <!-- Content -->
        <script>
const header = document.querySelector('header');

window.addEventListener('scroll', function () {
  header.classList.toggle('sticky', window.scrollY > 0);
});

let menu = document.querySelector('#menu-icon');
let navlist = document.querySelector('.navlist');

menu.onclick = () => {
  menu.classList.toggle('bx-x');
  navlist.classList.toggle('open');
}

window.onscroll = () => {
  menu.classList.remove('bx-x');
  navlist.classList.remove('open');
};
        </script>
            </body>
            </html>

            <?php
        } else {
            echo "Produk tidak ditemukan.";
        }
    } else {
        echo "Error dalam menjalankan query: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    echo "ID produk tidak ditemukan dalam parameter URL.";
}
?>
