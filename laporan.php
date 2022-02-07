<?php 
    require_once "app/init.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/laporan.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Siuuu</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="row mb-5 d-print-none">
            <div class="col-md-6">
                <form action="" method="get" class="d-flex">
                    <a href="<?= $helper->baseUrl('transaksi.php') ?>" class="btn btn-dark me-2">Back</a>
                    <input type="date" name="tanggal_awal" id="tanggal_mulai" class="form-control me-2">
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control me-2">
                    <button type="submit" class="btn btn-success me-2">Search</button>
                    <button type="button" name="print" class="btn btn-primary print">Print</button>
                </form>
            </div>
        </div>
        <h3 class="text-center mb-3">Laporan Laundry Siuuu</h3>
        <table class="table table-bordered table-striped">
            <thead class="text-center align-middle">
                <tr>
                    <th>#</th>
                    <th>Nama Outlet</th> 
                    <th>Nama User</th> 
                    <th>Nama Pelanggan</th> 
                    <th>Kode Invoice</th>
                    <th>Tanggal</th>
                    <th>Batas Waktu</th>
                    <th>Tanggal Bayar</th>
                    <th>Biaya Tambahan</th>
                    <th>Diskon</th>
                    <th>Pajak</th>
                    <th>Status</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                    <?php 
                    $no = 1;
                    if(!empty($_GET['tanggal_awal']) && !empty($_GET['tanggal_akhir'])) {
                        $tanggalAwal = $_GET['tanggal_awal'];
                        $tanggalAkhir = $_GET['tanggal_akhir'];
                        $transaksi = $CrudProcess->selectJoin("SELECT * FROM tb_transaksi JOIN tb_user ON (tb_transaksi.id_user = tb_user.id_user) JOIN tb_outlet ON (tb_transaksi.id_outlet = tb_outlet.id_outlet) JOIN tb_member ON (tb_transaksi.id_member = tb_member.id_member) WHERE tanggal >= '$tanggalAwal' AND tanggal <= '$tanggalAkhir'");
                    } else {
                        $transaksi = $CrudProcess->selectJoin("SELECT * FROM tb_transaksi JOIN tb_user ON (tb_transaksi.id_user = tb_user.id_user) JOIN tb_outlet ON (tb_transaksi.id_outlet = tb_outlet.id_outlet) JOIN tb_member ON (tb_transaksi.id_member = tb_member.id_member)");
                    }
                        foreach($transaksi as $t) :
                    ?>
                    <td><?= $no++ ?></td>
                    <td><?= $t->nama_outlet ?></td>
                    <td><?= $t->nama_user ?></td>
                    <td><?= $t->nama_member ?></td>
                    <td><?= $t->kode_invoice ?></td>
                    <td><?= $t->tanggal ?></td>
                    <td><?= $t->batas_waktu ?></td>
                    <td><?= $t->tanggal_bayar ?></td>
                    <td><?= $t->biaya_tambahan ?></td>
                    <td><?= $t->diskon ?>%</td>
                    <td><?= $t->pajak ?>%</td>
                    <td><?= $t->status ?></td>
                    <td><?= $t->status_pembayaran ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        let btnPrint = document.querySelector('.print');
        btnPrint.addEventListener('click', function() {
            window.print();
        });
        // window.onload = function() {
        //     window.print();
        // }
    </script>
</body>
</html>


