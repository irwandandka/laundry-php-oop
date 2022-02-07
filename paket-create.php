<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Create Paket</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('paket.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/PaketController.php?action=create') ?>" method="post">
                <div class="mb-3">
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
                <div class="mb-3">
                    <label for="jenis" class="form-label fw-bold">Jenis</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="">----- Pilih jenis paket -----</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain-lain">Lain-lain</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_paket" class="form-label fw-bold">Nama Paket</label>
                    <input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="kemeja">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label fw-bold">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="20000">
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" name="create" class="btn btn-primary">Create</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>