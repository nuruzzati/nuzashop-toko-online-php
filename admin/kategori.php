<style>
    .product-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        width: 200px;
        text-align: center;
    }

    .product-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .product-info {
        padding: 10px;
    }

    .product-btn {
        background-color: #c8815f;
        color: white;
        padding: 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Kategori</b></h5>
</div>

<?php 
// $kategori = array();
// $ambil = $koneksi->query("SELECT * FROM kategori");
// while($pecah = $ambil->fetch_assoc()) {
//     $kategori[] = $pecah;
// }



$categories = [];

// Mengambil data kategori dari database
$query = $koneksi->query("SELECT * FROM kategori");

// Memasukkan setiap baris data ke dalam array categories
while ($category = $query->fetch_assoc()) {
    $categories[] = $category;
}



?>



<a href="index.php?halaman=tambah_kategori" class="btn btn-success">Tambah</a>

<div class="product-container mt-3">
    <?php foreach($kategori as $key => $value): ?>
        <div class="product-card shadow bg-white">
            <img src="../assets/foto_kategori/<?= $value['foto_kategori']; ?>" class="product-img" alt="<?= $value['nama_kategori']; ?>">
            <div class="product-info">
                <p><?= $value['nama_kategori']; ?></p>
                <div class="text-center">
                    <a href="index.php?halaman=edit_kategori&id=<?= $value['id_kategori'] ?>" class="btn btn-sm btn-primary product-btn">Edit</a>
                    <a href="index.php?halaman=hapus_kategori&id=<?= $value['id_kategori'] ?>" class="btn btn-sm btn-danger product-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>    
</div>
