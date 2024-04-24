<?php 
session_start();
include '../../koneksi/koneksi.php';


// $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

// $ambil = $koneksi->query("SELECT * FROM pelanggan
//  WHERE id_pelanggan='$id_pelanggan'
// ");

// $pecah = $ambil->fetch_assoc();

// echo "<pre>";
//  print_r($pecah);
// echo "</pre>";



?>

<head>
      <!-- <link rel="styleshet" href="../style.css"> -->

  <!-- icons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- font googgle -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

   body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
   }

   .img img {
      width: 100%;
      height: auto;
   }

   a,li {
    background-color: #c8815f !important;
    border: none !important;
    border-radius: 10px;
   }


</style>
  
</head>
<!-- 
 <header>
    <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>Nuza<span>shop</span></a>
    <ul class="navlist">
      <li><a href="../index.php">Home</a></li>
      <li><a href="../index.php">Categories</a></li>
      <li><a href="../index.php">New</a></li>
      <li><a href="../index.php">Product</a></li>
      <li><a href="../index.php">Contact</a></li>
    </ul>

    <div class="header-icons">
      <a href="keranjang.php"><i class='bx bx-shopping-bag'></i></a>
      <div class="bx bx-menu" id="menu-icon"></div>
    </div>

    <div class="user">
      <li><a href="index.php">Profile</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </div>
</header> -->




<div class="container mt-5" style="text-transform: capitalize;">
   <div class="row">
      <div class="col-md-3">
         <div class="card">
            <div class="card-header rounded">
               <div class="img text-center rounded">
                  <img width="150" src="rawrrrrrrr.jpg" alt="" class="rounded mb-3">
               </div>
               <div class="card-title text-center">
                  <h5><?= $_SESSION['username'] ?></h5>
                  <p><?= $_SESSION['level'] ?></p>
               </div>
            </div>

            <div class="card-body">
               <ul class="nav nav-pills flex-row text-center justify-content-center">
                  <li class="nav-item" style="margin: 5px;">
                     <a href="index.php?page=home" class="btn-sm btn btn-primary">Home</a>
                  </li>
                  <li class="nav-item" style="margin: 5px;">
                     <a href="index.php?page=pesanan" class="btn-sm btn btn-primary">Pesanan</a>
                  </li>
                  <li class="nav-item" style="margin: 5px;">
                     <a href="index.php?page=riwayat" class="btn-sm btn btn-primary">Riwayat</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>

      <div class="col-md-9">
         <!-- Konten Halaman -->
         <?php 
            if(isset($_GET['page'])) {
               // Sertakan file atau tampilkan konten sesuai halaman yang dipilih
               include $_GET['page'] . '.php';
            } else {
               include 'home.php';   
            }
         ?>
      </div>
   </div>
</div>


  

    


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
      