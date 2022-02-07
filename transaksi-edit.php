<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $id = strip_tags($_GET['id']);
    $transaksi = $CrudProcess->selectSingleJoin("SELECT * FROM tb_transaksi JOIN tb_outlet ON (tb_transaksi.id_outlet = tb_outlet.id_outlet) JOIN tb_user ON (tb_transaksi.id_user = tb_user.id_user) JOIN tb_member ON (tb_transaksi.id_member = tb_member.id_member) WHERE id_transaksi = $id");
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Edit Transaksi</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('transaksi.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/TransaksiController.php?action=edit') ?>" method="post">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id_outlet" class="form-label fw-bold">Nama Outlet</label>
                            <select name="id_outlet" id="id_outlet" class="form-control">
                                <?php 
                                    $outlets = $CrudProcess->getAllData('tb_outlet');
                                    foreach($outlets as $outlet) :
                                ?>
                                <option value="<?= $outlet->id_outlet ?>" <?= $transaksi->id_outlet == $outlet->id_outlet ? 'selected' : '' ?> ><?= $outlet->nama_outlet ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="id_user" class="form-label fw-bold">Nama User</label>
                            <select name="id_user" id="id_user" class="form-control">
                                <?php 
                                    $users = $CrudProcess->getAllData('tb_user');
                                    foreach($users as $user) :
                                ?>
                                <option value="<?= $user->id_user ?>" <?= $transaksi->id_user == $user->id_user ? 'selected' : '' ?> ><?= $user->nama_user ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="id_member" class="form-label fw-bold">Nama Member</label>
                            <select name="id_member" id="id_member" class="form-control">
                                <?php 
                                    $member = $CrudProcess->getAllData('tb_member');
                                    foreach($member as $m) :
                                ?>
                                <option value="<?= $m->id_member ?>" <?= $transaksi->id_member == $m->id_member ? 'selected' : '' ?> ><?= $m->nama_member ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $transaksi->tanggal ?>" id="tanggal">
                        </div>
                        <div class="col-md-4">
                            <label for="batas_waktu" class="form-label fw-bold">Batas Waktu</label>
                            <input type="date" name="batas_waktu" class="form-control" value="<?= $transaksi->batas_waktu ?>" id="batas_waktu">
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal_bayar" class="form-label fw-bold">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" class="form-control" value="<?= $transaksi->tanggal_bayar ?>" id="tanggal_bayar">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="biaya_tambahan" class="form-label fw-bold">Biaya Tambahan</label>
                            <input type="number" name="biaya_tambahan" class="form-control" value="<?= $transaksi->biaya_tambahan ?>" id="biaya_tambahan">
                        </div>
                        <div class="col-md-4">
                            <label for="diskon" class="form-label fw-bold">Diskon</label>
                            <input type="number" name="diskon" class="form-control" value="<?= $transaksi->diskon ?>" id="diskon">
                        </div>
                        <div class="col-md-4">
                            <label for="pajak" class="form-label fw-bold">Pajak</label>
                            <input type="number" name="pajak" class="form-control" value="<?= $transaksi->pajak ?>" id="pajak">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Baru" <?= $transaksi->status == 'Baru' ? 'selected' : '' ?> >Baru</option>
                                <option value="Proses" <?= $transaksi->status == 'Proses' ? 'selected' : '' ?> >Proses</option>
                                <option value="Selesai" <?= $transaksi->status == 'Selesai' ? 'selected' : '' ?> >Selesai</option>
                                <option value="Diambil" <?= $transaksi->status == 'Diambil' ? 'selected' : '' ?> >Diambil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status_pembayaran" class="form-label fw-bold">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                <option value="Dibayar" <?= $transaksi->status_pembayaran == 'Dibayar' ? 'selected' : '' ?> >Dibayar</option>
                                <option value="Belum Dibayar" <?= $transaksi->status_pembayaran == 'Belum Dibayar' ? 'selected' : '' ?> >Belum Bayar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 float-end">
                    <input type="hidden" name="id" value="<?= $transaksi->id_transaksi ?>">
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>