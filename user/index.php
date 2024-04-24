<?php 
session_start();
include '../koneksi/koneksi.php';
	// cek apakah yang mengakses halaman ini sudah login



$ambil_produk = $koneksi->query("SELECT * FROM produk LIMIT 20");


$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nuzaxz</title>
  <link rel="stylesheet" href="style.css">

  <!-- icons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- font googgle -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
<style>
  .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
  display: block;
}


</style>
  
</head>
<body>
  <!-- header -->
  <header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>Nuza<span>shop</span></a>
    <ul class="navlist">
      <li><a href="#home">Home</a></li>
      <li><a href="#featured">Categories</a></li>
      <li><a href="#new">New</a></li>
      <li><a href="#all">Product</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    
    <div class="header-icons">
      <a style="position: absolute;right: 0; margin-right: 120px" href="keranjang.php"><i class='bx bx-shopping-bag'></i></a>
    </div>

    <!-- Dropdown User -->
    <div class="dropdown">
      <p href="#" class="position: absolute;right: 0; margin-right: 120px;">
<i class='bx bxs-user' style="margin-top:2px;font-size:30px;color:#111"></i></p>
      <div class="dropdown-content">
        <?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'pelanggan'): ?>
          <a href="pelanggan/index.php">Profile</a>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login/index.php">Login</a>
          <a href="daftar.php">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
</div>



  </header>

  <!-- home -->
  <section class="home" id="home">
    <div class="home-text">
      <h1>Men's New <br><span>Arrivals</span></h1>
      <p>New colors, now also avaible in men's sizing</p>
      <a href="#" class="btn">View Collection</a>
    </div>
  </section>

  <!-- featured -->
<section class="featured" id="featured">
    <div class="center-text">
        <h2>Featured <span>Categories</span></h2>
    </div>

    <div class="featured-content">
        <?php foreach ($kategori as $key => $value) : ?>
            <div class="row">
                <a href="detail.php?id=<?= $value['id_kategori'] ?>">   <img src="../assets/foto_kategori/<?= $value['foto_kategori']; ?>" class="product-img" alt="<?= $value['nama_kategori']; ?>"></a>

                <div class="fea-text">
                    <a style="color: #111;" href="detail.php?id=<?= $value['id_kategori'] ?>">
                        <h5><?= $value['nama_kategori'] ?></h5>
                        <?php
                        $id_kategori = $value['id_kategori'];
                        $hitung_produk = $koneksi->query("SELECT COUNT(*) AS jumlah_produk FROM produk WHERE id_kategori = '$id_kategori'");
                        $jumlah_produk = $hitung_produk->fetch_assoc();
                        ?>
                        <p><?= $jumlah_produk['jumlah_produk'] ?> items</p>
                    </a>
                </div>
                <div class="arrow">
                    <a href="detail.php?id=<?= $value['id_kategori'] ?>"><i class="bx bx-right-arrow-alt"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>




  <!-- cta -->
  <section class="cta">
    <div class="cta-text">
      <h6>
        SUMMER ON SALE
        <h4>20% OFF <br> NEW ARRIVAL</h4>
        <a href="#" class="btn">Shop Now</a>
      </h6>
    </div>
  </section>

    <!-- new -->
  <section class="new" id="new">
    <div class="new">
      <div class="center-text">
        <h2>New <span>Arrivals</span></h2>
      </div>

      <div class="new-content">
        <div class="box">
          <img width="90%" src="model1.jpg" alt="">
          <h5>lorem ipsum dizgi</h5>
          <h6>Rp399.000.00</h6>
          <div class="sale">
            <h4>New</h4>
          </div>
        </div>
        <div class="box">
          <img width="90%" src="model1.jpg" alt="">
          <h5>lorem ipsum dizgi</h5>
          <h6>Rp399.000.00</h6>
          <div class="sale">
            <h4>New</h4>
          </div>
        </div>
        <div class="box">
          <img width="90%" src="model1.jpg" alt="">
          <h5>lorem ipsum dizgi</h5>
          <h6>Rp399.000.00</h6>
          <div class="sale">
            <h4>New</h4>
          </div>
        </div>
        <div class="box">
          <img width="90%" src="model1.jpg" alt="">
          <h5>lorem ipsum dizgi</h5>
          <h6>Rp399.000.00</h6>
          <div class="sale">
            <h4>New</h4>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- all product -->
<!-- all product -->
<section class="new" id="all">
    <div class="new">
        <div class="center-text">
            <h2>Featured <span>Product</span></h2>
        </div>

        <div class="new-content">
            <?php
            while ($detail_produk = $ambil_produk->fetch_assoc()) {
            ?>
            <div class="box">
               <a href="detail_produk.php?id=<?= $detail_produk['id_produk'] ?>"> <img height="200px" width="100%" src="../assets/foto_produk/<?php echo $detail_produk['foto_produk']; ?>" alt="<?php echo $detail_produk['nama_produk']; ?>"></a>
                <h5><?php echo $detail_produk['nama_produk']; ?></h5>
                <h6>Rp<?php echo number_format($detail_produk['harga_produk']); ?></h6>
                <div class="sale">
                    <h4>Sale</h4>
                </div>
                
              </div>
              <?php
            }
            ?>
        </div>
      </div>
      <div class="button" style="display: flex;justify-content: center;margin-top:20px">
      <a href="all_produk.php" style="justify-content: center;margin-top: 10px;align-items: center;" class="btn">View All Product</a>
      </div>
</section>



    <!-- brand -->
    <section class="brand">
      <div class="brand-content">
        <div class="main">
          <img src="brand.webp" alt="">
        </div>
        <div class="main">
          <img src="brand.webp" alt="">
        </div>
        <div class="main">
          <img src="brand.webp" alt="">
        </div>
        <div class="main">
          <img src="brand.webp" alt="">
        </div>
        <div class="main">
          <img src="brand.webp" alt="">
        </div>
        <div class="main">
          <img src="brand.webp" alt="">
        </div>
      </div>

    </section>

      <!-- contact -->
      <section class="contact" id="contact">
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

      <div class="last-text">
        <p>Copyright @ 2022 All rights reserved | This template is made with by Nuza Nadenta</p>
      </div>

      <!-- scroll-top -->
      <a href="#" id="home" class="top"><i class='bx bx-up-arrow-alt'></i></a>

  

<script src="https://unpkg.com/scrollreveal"></script>
  <!-- javascript -->
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

const sr = ScrollReveal ({
  distance: '30px',
  duration:2600,
  reset:true
})

sr.reveal('.home-text',{delay:200, origin:'right'})
// sr.reveal('.featured,.cta,.new,.brand,.contact',{delay:200, origin:'bottom'})
</script>
</body>
</html>