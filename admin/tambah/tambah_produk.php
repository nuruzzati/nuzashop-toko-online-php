<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b> Halaman Tambah Produk</b></h5>
</div>

<?php 
$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nama Kategori :</label>
                <div class="col-sm-6">
                  <select name="id_kategori" id="" class="form-control" >
                    <option selected disabled>- Pilih Nama Kategori -</option>
                    <?php foreach ($kategori as $key => $value) : ?>

                        <option value="<?= $value['id_kategori']; ?>">
                        <?= $value['nama_kategori']  ?>
                        </option>
                    <?php endforeach; ?>    
                  </select>
                </div>
            </div>

             <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nama Produk :</label>
                <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Produk" >
                </div>
            </div>

             <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Harga Produk :</label>
                <div class="col-sm-6">
                <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Produk" >
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Berat Produk :</label>
                <div class="col-sm-6">
                <input type="number" name="berat" class="form-control" placeholder="Masukan Berat Produk" >
                </div>
            </div>
            
             <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Foto Produk :</label>
                <div class="col-sm-6">
                    <div class="input-foto">   
                        <input type="file" name="foto[]" class="form-control" >
                    </div>
                <span class="btn btn-sm btn-success mt-2 btn-tambah">
                    <i class="fas fa-plus"></i>
                </span>
                </div>
            </div>

             <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Deskripsi Produk :</label>
                <div class="col-sm-6">
               <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10" placeholder="Masukan Deskripsi Produk"></textarea>
                </div>
            </div>

              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Stok Produk :</label>
                <div class="col-sm-6">
                <input type="number" name="stok" class="form-control" placeholder="Masukan stok Produk" >
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
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];

    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    $result_produk = $koneksi->query("INSERT INTO produk (id_kategori, nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, stok_produk)
    
    VALUES ('$id_kategori', '$nama', '$harga', '$berat', '$nama_foto[0]', '$deskripsi', '$stok')");

    if ($result_produk) {
        $id_baru = $koneksi->insert_id;

        foreach ($nama_foto as $key => $tiap_nama) {
            $tiap_lokasi = $lokasi_foto[$key];
            move_uploaded_file($tiap_lokasi, "../assets/foto_produk/" . $tiap_nama);

            $result_produk_foto = $koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto)
            VALUES ('$id_baru', '$tiap_nama')");
            
            if (!$result_produk_foto) {
                echo 'Terjadi kesalahan saat menyimpan foto produk: ' . mysqli_error($koneksi);
                exit;
            }
        }

        echo '<script>alert("Data berhasil ditambahkan"); location.href="index.php?halaman=produk";</script>';
    } else {
        echo 'Terjadi kesalahan saat menyimpan data produk: ' . mysqli_error($koneksi);
    }
}
?>
