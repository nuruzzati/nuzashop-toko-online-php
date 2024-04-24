<?php 
include '../koneksi/koneksi.php';

// Menangani filter kategori
$kategori = '';

if (isset($_POST['kategori'])) {
    $kategori = "WHERE kategori.nama_kategori = '{$_POST['kategori']}'";
}

$query = "SELECT * FROM produk 
          JOIN kategori ON produk.id_kategori = kategori.id_kategori 
          $kategori";

$ambil_produk = $koneksi->query($query);

// Mengambil data kategori untuk dropdown
$resultKategori = $koneksi->query("SELECT * FROM kategori");
$kategoris = $resultKategori->fetch_all(MYSQLI_ASSOC);


// Menangani pencarian
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];

    $query = "SELECT * FROM produk 
              JOIN kategori ON produk.id_kategori = kategori.id_kategori 
              WHERE produk.nama_produk LIKE '%$keyword%'";

    $ambil_produk = $koneksi->query($query);
}
?>

<head>
      <link rel="stylesheet" href="style.css">

  <!-- icons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- font googgle -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
 

.search-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

#search-input {
    padding: 10px;
    border: none;
    border-radius: 5px 0 0 5px;
    font-size: 16px;
     width: 500px; /* Ubah lebar sesuai kebutuhan Anda */
         border: 2px solid #555;

}

#search-button {
    padding: 5px 10px;
    border: 2px solid #555;
    border-radius: 0 5px 5px 0;
    background-color: #c8815f;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
}

#search-button:hover {
    background-color: #a76846;
  }
  header.sticky {
    background: var(--bg-color);
    padding: 14px 14%;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
  }
  

    .filter-form {
            display: flex;
            justify-content: start;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-form select {
            padding: 3px;
            border: 2px solid #555;
            border-radius: 4px;
            font-size: 16px;
        }

        .filter-form button {
            padding: 3px;
            border: 2px solid #555;
            border-radius: 5px;
            background-color: #c8815f;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        .filter-form button:hover {
            background-color: #a76846;
        }
  </style>
  
</head>

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
  <section class="new" id="all">
  <form class="filter-form" action="" method="post">
        <select name="kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategoris as $kategoriItem) : ?>
                <option value="<?= $kategoriItem['nama_kategori'] ?>" <?= $kategori == $kategoriItem['nama_kategori'] ? 'selected' : '' ?>>
                    <?= $kategoriItem['nama_kategori'] ?>
                </option>
            <?php endforeach; ?>

        </select>
        <button type="submit">Filter</button>
    </form>
    <div class="new">
        <div class="center-text">
            <h2>All <span>Product</span></h2>
        </div>

        <form action="" method="post">
           <div class="search-container">
                <input width="100" autofocus type="text" autocomplete="off" name="keyword" id="search-input" placeholder="Search...">
                <button type="submit" id="search-button" name="cari">Search</button>
            </div>
        </form>
1
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
    </section>


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
      