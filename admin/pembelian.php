<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Pembelian</b></h5>
</div>

<?php 

$pembelian = array();
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
         ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
         while($pecah = $ambil->fetch_assoc()) {
            $pembelian[] = $pecah;
         }

?>

<div class="card shadow bg-white">
    <div class="card-body">
        <a href="print_pembelian.php" class="btn btn-primary mb-3">print data</a>
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pembelian as $key => $value) : ?>
                    <tr>
                        <td width='50'><?= $key+1; ?></td>
                        <td><?= $value['nama_pelanggan'] ?></td>
                        <td><?= date("d F Y", strtotime($value['tanggal_pembelian'])) ?></td>
                        <td>Rp<?= number_format($value['total_pembelian']) ?></td>
                        <td width='150'>
                            <a href="index.php?halaman=detail_pembelian&id=<?= $value['id_pembelian']; ?>" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
