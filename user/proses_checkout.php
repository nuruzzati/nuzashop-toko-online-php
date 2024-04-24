<?php
session_start();
include '../koneksi/koneksi.php';

if (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_telp'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    

    // Ambil data produk dari session atau database, sesuaikan dengan struktur Anda
    $id_produk = $_SESSION['checkout_items']['id_produk'];
    $jumlah = $_SESSION['checkout_items']['jumlah'];

    // Dapatkan informasi produk dari database
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $pecah = $ambil->fetch_assoc();

    // Simpan informasi pembeli ke dalam tabel detail_pembeli
    $query_insert = "INSERT INTO data_pembeli (nama_pembeli, alamat_pembeli, no_telepon, nama_produk, harga, jumlah)
                    VALUES ('$nama', '$alamat', '$no_telp', '{$_SESSION['nama_produk']}', '{$pecah['harga_produk']}', '$jumlah')";
    $koneksi->query($query_insert);

    // Kirim konfirmasi WhatsApp
    // Setelah selesai, Anda bisa mengosongkan session belanja
    unset($_SESSION['checkout_items']);

    // Redirect atau lakukan operasi lain sesuai kebutuhan
    header('Location: konfirmasi.php');
    exit;
} else {
    // Jika data tidak lengkap, mungkin tampilkan pesan kesalahan atau kembali ke halaman sebelumnya.
    header('Location: keranjang.php');
    exit;
}

// Fungsi untuk mengirim pesan WhatsApp
    // Implementasikan logika untuk mengirim pesan WhatsApp di sini
    // Gunakan WhatsApp API atau layanan lain yang mendukung pengiriman pesan otomatis
    // Pastikan untuk menyertakan nomor dan pesan yang sesuai

?>
