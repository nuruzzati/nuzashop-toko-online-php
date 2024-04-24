<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Edit Kategori</b></h5>
</div>

<?php 
$id_kategori = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$edit = $ambil->fetch_assoc();

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Kategori:</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?= $edit['nama_kategori']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto Kategori Saat Ini:</label>
                <div class="col-sm-9">
                    <img src="../assets/foto_kategori/<?= $edit['foto_kategori']; ?>" class="img-thumbnail" alt="Foto Kategori">
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Ganti Foto Kategori:</label>
                <div class="col-sm-9">
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
                    <a href="index.php?halaman=kategori" class="btn btn-danger ml-1">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php 
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];

    // Cek apakah ada file yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $lokasi_foto = "../assets/foto_kategori/$foto";

        // Hapus foto lama jika ada
        if (file_exists("../assets/foto_kategori/{$edit['foto_kategori']}")) {
            unlink("../assets/foto_kategori/{$edit['foto_kategori']}");
        }

        // Pindahkan foto baru ke lokasi yang diinginkan
        move_uploaded_file($tmp_foto, $lokasi_foto);
    } else {
        $foto = $edit['foto_kategori']; // Gunakan foto yang sudah ada jika tidak ada pengunggahan file baru
    }

    // Update data kategori
    $koneksi->query("UPDATE kategori SET nama_kategori='$nama', foto_kategori='$foto' WHERE id_kategori='$id_kategori'");

    echo "<script>alert('Data berhasil diedit')</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>
    