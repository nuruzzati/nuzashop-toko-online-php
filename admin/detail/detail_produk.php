<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman detail produk</b></h5>
</div>

<?php 
$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori
    ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");

$detail_produk = $ambil->fetch_assoc();

$produk_foto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($tiap = $ambil->fetch_assoc()) {
    $produk_foto[] = $tiap;
}

?>

<div class="card shadow bg-white">
    <div class="card-header">
        <strong>Data Detail Produk</strong>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php foreach($produk_foto as $key => $value) : ?>
            <div class="col-4 rounded">
                <div class="p-2 rounded ml-5 mt-3" style="width: 28rem;">
                    <img width="400" class="rounded" src="../assets/foto_produk/<?= $value['nama_produk_foto'] ?>" alt="">
                    <div class="card-footer text-center">
                        <a href="index.php?halaman=hapus_foto&idfoto=<?= $value['id_produk_foto']; ?>&idproduk=<?= $value['id_produk']; ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah kamu yakin ingin menghapus foto ini?')">Hapus</a>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card-body">
                <h2 class="mb-4" style="text-transform: capitalize;"><?= $detail_produk['nama_produk']; ?></h2>
                <p>Harga: Rp<?= number_format($detail_produk['harga_produk']); ?></p>
                <p>Berat: <?= number_format($detail_produk['berat_produk']); ?>gr</p>
                <p>Deskripsi Produk: <?= $detail_produk['deskripsi_produk']; ?></p>
                <p>Stok: <?= $detail_produk['stok_produk']; ?></p>
            </div>
        </div>
    </div>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white mt-3">
        <div class="card-header p-3">
            <strong>Tambah Foto</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="produk_foto" class="col-sm-2 col-form-label">Tambahkan File Foto :</label>
                <div class="col-sm-6">
                    <input type="file" name="produk_foto" id="" class="form-control">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-1">
                    <button name="simpan" class="btn btn-success">Simpan</button>
                </div>
                <div class="col-md-11">
                    <a href="index.php?halaman=produk" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php 
if(isset($_POST['simpan'])) {
    $namafoto = $_FILES['produk_foto']['name'];
    $lokasifoto = $_FILES['produk_foto']['tmp_name'];

    $tgl_foto = date('YmdHis') . $namafoto;
    move_uploaded_file($lokasifoto, "../assets/foto_produk/" . $tgl_foto);

    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
                    VALUES ('$id_produk','$tgl_foto')");

    echo "<script>alert('Foto produk berhasil disimpan')</script>";
    echo "<script>location='index.php?halaman=detail_produk&id=$id_produk'</script>";
}
?>
