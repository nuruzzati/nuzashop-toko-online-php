<div class="shadow p-3 mb-3 bg-white rounded">
    <h5 class="no"><b>Halaman Detail Pembelian</b></h5>
</div>

<?php 
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
        ON pembelian.id_pelanggan=pelanggan.id_pelanggan
        WHERE pembelian.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();


?>

<style>

    @media print {
        /* Menyembunyikan elemen-elemen yang tidak ingin dicetak */
        .no {
            display: none;
        }

        /* Mengatur ukuran font untuk mencetak */
        body {
            font-size: 12pt;
        }

        /* Contoh lainnya, sesuaikan dengan kebutuhan Anda */
    }
</style>


<!-- 
     -->

<div class="row">
    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header">
                <strong>Data Pelanggan</strong>
            </div>
            <div class="card-body row">
                <!--  -->
                <label for="" class="col-md-4 col-form-label">Nama :</label>
                <label for="" class="col-md-8 col-form-label"><?= $detail['nama_pelanggan'] ?></label>
                <!--  -->
                <label for="" class="col-md-4 col-form-label">Email :</label>
                <label for="" class="col-md-8 col-form-label"><?= $detail['email_pelanggan'] ?></label>
                <!--  -->
                <label for="" class="col-md-4 col-form-label">Telepon :</label>
                <label for="" class="col-md-8 col-form-label"><?= $detail['telepon_pelanggan'] ?></label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header">
                <strong>Data Pembelian</strong>
            </div>
            <div class="card-body row">
                   <!--  -->
                <label for="" class="col-md-4 col-form-label">Tanggal :</label>
                <label for="" class="col-md-8 col-form-label"><?= date("d F Y", strtotime($detail['tanggal_pembelian'])) ?></label>
                <!--  -->
                <label for="" class="col-md-4 col-form-label">Total :</label>
                <label for="" class="col-md-8 col-form-label">Rp<?= number_format($detail['total_pembelian']) ?></label>
                <!--  -->
            </div>
        </div>
    </div>
</div>

<?php 

$pp = array();
$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian=$id_pembelian");
while($pecah = $ambil->fetch_assoc()) {
    $pp[0] = $pecah;
}

var_dump($pp);

?>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pp as $key => $value) : ?>
                    <?php $subtotal = $value['harga_produk'] * $value['jumlah'] ?>
                <tr>
                    <td width='50'><?= $key+1; ?></td>
                    <td><?= $value['nama_produk'] ?></td>
                    <td><?= number_format($value['harga_produk']); ?></td>
                    <td><?= $value['jumlah'] ?></td>
                    <td>Rp<?= number_format($subtotal); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>