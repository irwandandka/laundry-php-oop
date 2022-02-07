<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/transaksi.php');
?>

<div class="col-md-12">
    <div class="card rounded shadow-lg">
        <div class="card-header text-center fw-bold">Transaksi</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('transaksi-create.php') ?>" class="btn btn-outline-primary mb-3">Create</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless">
                    <thead class="text-center align-middle bg-dark text-white">
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
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        <?php 
                            $no = 1;
                            $transaksi = $CrudProcess->selectJoin("SELECT * FROM tb_transaksi JOIN tb_user ON (tb_transaksi.id_user = tb_user.id_user) JOIN tb_outlet ON (tb_transaksi.id_outlet = tb_outlet.id_outlet) JOIN tb_member ON (tb_transaksi.id_member = tb_member.id_member)");
                                foreach($transaksi as $t) :
                        ?>
                            <tr>
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
                                <td>
                                    <a href="<?= $helper->baseUrl("transaksi-edit.php?id=$t->id_transaksi") ?>" class="btn btn-outline-success btn-sm mb-2">Edit</a>
                                    <a href="<?= $helper->baseurl("detail-transaksi.php?id=$t->id_transaksi") ?>" class="btn btn-outline-info btn-sm mb-2">Detail</a>
                                    <a href="<?= $helper->baseUrl("app/core/controller/TransaksiController.php?delete=$t->id_transaksi") ?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>