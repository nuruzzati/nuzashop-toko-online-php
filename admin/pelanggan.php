<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Pelanggan</b></h5>
</div>

<?php 
$pelanggan = array();
$ambil = $koneksi->query("SELECT * FROM pelanggan");
while($pecah = $ambil->fetch_assoc()) {
    $pelanggan[] = $pecah;
}

?>


<div class="card shadow bg-white">
    <div class="card-body">
        <a href="print_pelanggan.php" class="btn btn-primary mb-3">print data</a>
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead class="hapus">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pelanggan as $key => $value) : ?>
                <tr>
                    <td width='50'><?= $key+1; ?></td>
                    <td><?= $value['nama_pelanggan'] ?></td>
                    <td><?= $value['email_pelanggan'] ?></td>
                    <td><?= $value['telepon_pelanggan'] ?></td>
                    <td><?= $value['foto_pelanggan'] ?></td>
                    <td class="text-center" width='150'>
                        <a href="" class="hapus btn btn-sm btn-danger">hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



