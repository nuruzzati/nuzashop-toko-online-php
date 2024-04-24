<?php 

$id_kategori = $_GET['id'];


$koneksi->query("DELETE FROM kategori where id_kategori='$id_kategori'");

  echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
echo mysqli_error($koneksi);

?>