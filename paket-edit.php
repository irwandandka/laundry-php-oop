<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $id = strip_tags($_GET['id']);
    $paket = $CrudProcess->selectSingleJoin("SELECT * FROM tb_paket JOIN tb_outlet ON (tb_paket.id_outlet = tb_outlet.id_outlet) WHERE id_paket = $id");
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Edit Paket <?= $paket->nama_paket ?></div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('paket.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/PaketController.php?action=edit') ?>" method="post">
                <div class="mb-3">
                    <label for="id_outlet" class="form-label fw-bold">Nama Outlet</label>
                    <select name="id_outlet" id="id_outlet" class="form-control">
                        <?php 
                            $outlets = $CrudProcess->getAllData('tb_outlet');
                            foreach($outlets as $outlet) :
                        ?>
                        <option value="<?= $outlet->id_outlet ?>" <?= $paket->id_outlet == $outlet->id_outlet ? 'selected' : '' ?>><?= $outlet->nama_outlet ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis" class="form-label fw-bold">Jenis</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="">----- Pilih jenis paket -----</option>
                        <option value="kiloan" <?= $paket->jenis == 'kiloan' ? 'selected' : '' ?>>Kiloan</option>
                        <option value="selimut" <?= $paket->jenis == 'selimut' ? 'selected' : '' ?>>Selimut</option>
                        <option value="bed_cover" <?= $paket->jenis == 'bed_cover' ? 'selected' : '' ?>>Bed Cover</option>
                        <option value="kaos" <?= $paket->jenis == 'kaos' ? 'selected' : '' ?>>Kaos</option>
                        <option value="lain-lain" <?= $paket->jenis == 'lain-lain' ? 'selected' : '' ?>>Lain-lain</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_paket" class="form-label fw-bold">Nama Paket</label>
                    <input type="text" name="nama_paket" id="nama_paket" class="form-control" value="<?= $paket->nama_paket ?>" placeholder="kemeja">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label fw-bold">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="<?= $paket->harga ?>" placeholder="100.000">
                </div>
                <div class="mb-3 float-end">
                    <input type="hidden" name="id" value="<?= $paket->id_paket ?>">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>