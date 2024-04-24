<?php

$id_produk = $_GET['id'];

// Hubungkan dengan database (pastikan $koneksi telah didefinisikan sebelumnya)
// $koneksi = new mysqli("host", "username", "password", "database");

$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$id_produk'");
$pecah = $ambil->fetch_assoc();

$hapus_foto = $pecah['foto_produk'];

if (file_exists("../assets/foto_produk/" . $hapus_foto)) {
    unlink("../assets/foto_produk/" . $hapus_foto);
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$id_produk'");

$hapusprodukfoto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($hapus = $ambil->fetch_assoc()) {
    $hapusprodukfoto[] = $hapus;
}
foreach ($hapusprodukfoto as $key => $value) {
    $hapusfoto = $value['nama_produk_foto'];
    if (file_exists("../assets/foto_produk/" . $hapusfoto)) {
        unlink("../assets/foto_produk/" . $hapusfoto);
    }

    $koneksi->query("DELETE FROM produk_foto WHERE id_produk='$id_produk'");
}

mysqli_error($koneksi);
echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script>location='index.php?halaman=produk'</script>";

?>
