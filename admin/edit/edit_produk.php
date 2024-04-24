<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Edit Produk</b></h5>
</div>

<?php 
$id_produk = $_GET['id'];

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}

$ambil_produk = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$edit_produk = $ambil_produk->fetch_assoc();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
            <div class="form-group row">
                <label for="id_kategori" class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control" id="id_kategori">
                        <?php foreach ($kategori as $value) : ?>
                            <option value="<?= $value['id_kategori']; ?>" <?php if ($value['id_kategori'] == $edit_produk['id_kategori']) echo "selected"; ?>>
                                <?= $value['nama_kategori']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?= $edit_produk['nama_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="harga" class="col-sm-3 col-form-label">Harga Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="harga" class="form-control" value="<?= $edit_produk['harga_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="berat" class="col-sm-3 col-form-label">Berat Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="berat" class="form-control" value="<?= $edit_produk['berat_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto Produk :</label>
                <div class="col-sm-9">
                    <img src="../assets/foto_produk/<?= $edit_produk['foto_produk'] ?>" width="150">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="deskripsi" class="form-control" value="<?= $edit_produk['deskripsi_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label">Stok Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="stok" class="form-control" value="<?= $edit_produk['stok_produk']; ?>">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-1">
                    <button name="simpan" class="btn btn-success">Simpan</button>
                </div>
                <div class="col-md-11">
                    <a href="index.php?halaman=produk" class="btn btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php 
if(isset($_POST['simpan'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['
    stok'];

    // Periksa apakah file gambar diunggah
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
        
        // Pindahkan file gambar ke direktori yang sesuai
        move_uploaded_file($lokasifoto, "../assets/foto_produk/" . $namafoto);

        // Update data produk
        $koneksi->query("UPDATE produk SET 
            id_kategori='$id_kategori',
            nama_produk='$nama',
            harga_produk='$harga',
            berat_produk='$berat',
            deskripsi_produk='$deskripsi',
            stok_produk='$stok',
            foto_produk='$namafoto'
            WHERE id_produk = '$id_produk'");
    } else {
        // Jika tidak ada gambar baru diunggah, hanya update data teks
        $koneksi->query("UPDATE produk SET 
            id_kategori='$id_kategori',
            nama_produk='$nama',
            harga_produk='$harga',
            berat_produk='$berat',
            deskripsi_produk='$deskripsi',
            stok_produk='$stok'
            WHERE id_produk = '$id_produk'");
    }

    echo "<script>alert('Data berhasil diedit')</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>
