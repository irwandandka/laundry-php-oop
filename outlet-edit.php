<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/outlet-edit.php');

    $id = strip_tags($_GET['id']);
    $outlet = $CrudProcess->getData('tb_outlet','id_outlet',$id);
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Edit User</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('outlet.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/OutletController.php?action=edit') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_outlet" class="form-label fw-bold">Nama Outlet</label>
                    <input type="text" name="nama_outlet" id="nama_outlet" class="form-control" value="<?= $outlet->nama_outlet ?>" placeholder="john doe">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control">
                        <?= $outlet->alamat ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label fw-bold">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?= $outlet->no_telepon ?>" placeholder="xxxx-xxxx-xxxx">
                </div>
                <div class="mb-3 float-end">
                    <input type="hidden" name="id" value="<?= $outlet->id_outlet ?>">
                    <button type="submit" name="create" class="btn btn-primary">Update</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>