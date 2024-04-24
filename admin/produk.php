<style>
    /* Efek hover pada kartu */
    .card:hover {
        transition: transform 0.3s; /* Efek transisi selama 0.3 detik */
    }

    img {
        transition: .5s;
        border: none !important;
        
    }

    /* Efek hover pada gambar */
    .card:hover img {
        transform: scale(1.02); /* Memperbesar gambar saat dihover */
        rotate: 4deg;
        transform: scale(1.05); 
    }
        
    
    
    /* Menambahkan teks "Detail" di tengah gambar saat dihover */
    .card:hover::after {
        content: "Detail";
        position: absolute;
       /* justify-content: center */
        cursor: pointer;
    

     
        
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .card img {
    max-width: 100%;
    max-height: 100%;
}

</style>


<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Produk</b></h5>
</div>

<?php 
$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
while($pecah = $ambil->fetch_assoc()) {
    $produk[] = $pecah; 
}
?>

<a href="index.php?halaman=tambah_produk" class="btn btn-success">Tambah produk</a>
<div class="row mt-3">
    <div class="col-md-5 mb-3">
        <!-- Pencarian Produk -->
        <form action="index.php?halaman=produk" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari produk...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row mt-3" style="text-transform: capitalize;">
        <?php foreach($produk as $value) : ?>
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="card border rounded">
                    <a href="index.php?halaman=detail_produk&id=<?= $value['id_produk']; ?>" class="detail-link">
                        <img src="../assets/foto_produk/<?= $value['foto_produk']; ?>" class="card-img-top" alt="<?= $value['nama_produk']; ?>">
                    </a>
                    <div class="card-body border">
                        <h5 class="card-title"><?= $value['nama_produk']; ?></h5>
                        <p class="card-text">Kategori: <?= $value['nama_kategori']; ?></p>
                        <p class="card-text">Harga: Rp<?= number_format($value['harga_produk']); ?></p>
                        <p class="card-text">Berat: <?= number_format($value['berat_produk']); ?>gr</p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?halaman=edit_produk&id=<?= $value['id_produk']; ?>" class="btn btn-primary mb-2">Edit</a>
                        <a href="index.php?halaman=hapus_produk&id=<?= $value['id_produk']; ?>" class="mb-2 btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        <a href="index.php?halaman=detail_produk&id=<?= $value['id_produk']; ?>" class="btn btn-info mb-2">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
