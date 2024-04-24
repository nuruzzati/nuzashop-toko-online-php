<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Tambah Kategori</b></h5>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-6">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Kategori" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto Kategori</label>
                <div class="col-sm-6">
                    <input type="file" name="foto" id="foto" accept="image/*">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-1">
                    <button name="simpan" class="btn btn-success">Simpan</button>
                </div>
                <div class="col-md-11">
                    <a href="index.php?halaman=kategori" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php 
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];

    // Menangani unggah foto
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $lokasi_foto = "../assets/foto_kategori/$foto";

    $result = $koneksi->query("INSERT INTO kategori (nama_kategori, foto_kategori) VALUES ('$nama', '$foto')");

    if ($result && move_uploaded_file($tmp_foto, $lokasi_foto)) {
        echo '<script>alert("Data berhasil disimpan"); location.href="index.php?halaman=kategori";</script>';
    } else {
        echo 'Terjadi kesalahan: ' . mysqli_error($koneksi);
    }
}
?>
