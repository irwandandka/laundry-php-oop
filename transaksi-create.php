<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Create Transaksi</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('transaksi.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/TransaksiController.php?action=create') ?>" method="post">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id_outlet" class="form-label fw-bold">Nama Outlet</label>
                            <select name="id_outlet" id="id_outlet" class="form-control">
                                <?php 
                                    $outlets = $CrudProcess->getAllData('tb_outlet');
                                    foreach($outlets as $outlet) :
                                ?>
                                <option value="<?= $outlet->id_outlet ?>"><?= $outlet->nama_outlet ?></option>
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
                                <option value="<?= $user->id_user ?>"><?= $user->nama_user ?></option>
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
                                <option value="<?= $m->id_member ?>"><?= $m->nama_member ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal">
                        </div>
                        <div class="col-md-4">
                            <label for="batas_waktu" class="form-label fw-bold">Batas Waktu</label>
                            <input type="date" name="batas_waktu" class="form-control" id="batas_waktu">
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal_bayar" class="form-label fw-bold">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" class="form-control" id="tanggal_bayar">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="biaya_tambahan" class="form-label fw-bold">Biaya Tambahan</label>
                            <input type="number" name="biaya_tambahan" class="form-control" id="biaya_tambahan" placeholder="10000">
                        </div>
                        <div class="col-md-4">
                            <label for="diskon" class="form-label fw-bold">Diskon</label>
                            <input type="number" name="diskon" class="form-control" id="diskon" placeholder="12%">
                        </div>
                        <div class="col-md-4">
                            <label for="pajak" class="form-label fw-bold">Pajak</label>
                            <input type="number" name="pajak" class="form-control" id="pajak" placeholder="5%">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">--- Status --- </option>
                                <option value="Baru">Baru</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Diambil">Diambil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status_pembayaran" class="form-label fw-bold">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                <option value="">--- Status Pembayaran --- </option>
                                <option value="Dibayar">Dibayar</option>
                                <option value="Belum Dibayar">Belum Bayar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" name="create" class="btn btn-primary">Create</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>