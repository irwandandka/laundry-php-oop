<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/paket.php');
    $id = strip_tags($_GET['id']);
    $transaksi = $CrudProcess->selectSingleJoin("SELECT * FROM tb_transaksi JOIN tb_outlet ON (tb_transaksi.id_outlet = tb_outlet.id_outlet) JOIN tb_user ON (tb_transaksi.id_user = tb_user.id_user) JOIN tb_member ON (tb_transaksi.id_member = tb_member.id_member) WHERE id_transaksi = $id");
    $detailTransaksi = $CrudProcess->getDatabyId("SELECT * FROM tb_detail_transaksi INNER JOIN tb_paket ON (tb_detail_transaksi.id_paket = tb_paket.id_paket) WHERE id_transaksi = $transaksi->id_transaksi");
?>

<div class="col-md-8">
    <div class="card rounded shadow-lg">
        <div class="card-body my-4 mx-3">
            <div class="row mb-4">
                <div class="col-6">
                    <div class="d-block">
                        <span class="badge bg-primary mb-2">Nama Member : <?= $transaksi->nama_member ?></span>
                        <span class="badge bg-success mb-2">Nama Outlet : <?= $transaksi->nama_outlet ?></span>
                        <span class="badge bg-info mb-2">Nama User : <?= $transaksi->nama_user ?></span><br>
                        <span class="badge bg-danger mb-2">Diskon : <?= $transaksi->diskon ?>%</span>
                        <span class="badge bg-secondary mb-2">Pajak : <?= $transaksi->pajak ?>%</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-block">
                        <span class="badge bg-dark mb-2">Tanggal : <?= $transaksi->tanggal ?></span><br>
                        <span class="badge bg-dark mb-2">Batas Waktu : <?= $transaksi->batas_waktu ?></span>
                        <span class="badge bg-dark mb-2">Tanggal Bayar : <?= $transaksi->tanggal_bayar ?></span>
                        <span class="badge bg-dark mb-2">Biaya Tambahan : <?= $transaksi->biaya_tambahan ?></span>
                        <span class="badge bg-dark mb-2">Status : <?= $transaksi->status ?></span>
                        <span class="badge bg-dark mb-2">Status Pembayaran : <?= $transaksi->status_pembayaran ?></span>
                    </div>
                </div>
            </div>
            <hr>
            <p class="fw-bold">Detail Transaksi</p>
                <?php 
                    $no = 1;
                    foreach($detailTransaksi as $detail) : 
                ?>
                    <span class="badge bg-primary mb-2"><?= $no++ ?></span>
                    <span class="badge bg-dark mb-2">Nama Paket : <?= $detail->nama_paket ?></span>
                    <span class="badge bg-dark">Quantity : <?= $detail->qty ?></span>
                    <span class="badge bg-dark">Keterangan : <?= $detail->keterangan ?></span><br>
                <?php endforeach; ?>
                <button class="btn btn-dark btn-show-form-detail-transaksi mt-3">Tambah</button>
            <hr>
            <div class="row form-detail-transaksi d-none">
                <div class="col-12">
                    <form action="<?= $helper->baseUrl('app/core/controller/TransaksiController.php?action=detail-transaksi-create') ?>" method="post">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="id_paket" class="form-label">Nama Paket</label>
                                    <select name="id_paket" id="id_paket" class="form-control" required>
                                        <?php
                                            $paket = $CrudProcess->getAllData('tb_paket');
                                            foreach($paket as $p) :
                                        ?>
                                        <option value="<?= $p->id_paket ?>"><?= $p->nama_paket ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>  
                                <div class="col-6">
                                    <label for="qty" class="form-label" id="qty">Quantity</label>
                                    <input type="number" name="qty" id="qty" class="form-control" placeholder="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Nama Paket</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan..." required>
                        </div>
                        <div class="mb-3 float-end">
                            <input type="hidden" name="id" value="<?= $transaksi->id_transaksi ?>">
                            <button type="button" class="btn btn-secondary btn-close-form-detail-transaksi">Close</button>
                            <button type="submit" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once "layout/footer.php" ?>
