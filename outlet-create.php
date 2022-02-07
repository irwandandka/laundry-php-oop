<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/outlet-create.php');
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Create Outlet</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('outlet.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/OutletController.php?action=create') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_outlet" class="form-label fw-bold">Nama</label>
                    <input type="text" name="nama_outlet" id="nama_outlet" class="form-control" placeholder="your laundry">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label fw-bold">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="xxxx-xxxx-xxxx">
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" name="create" class="btn btn-primary">Create</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>