<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/outlet.php');
?>

<div class="col-md-10">
    <div class="card rounded shadow-lg">
        <div class="card-header text-center fw-bold">Outlet</div>
        <div class="card-body my-4 mx-3">
            <div class="table-responsive">
                <a href="<?= $helper->baseUrl('outlet-create.php') ?>" class="btn btn-outline-primary mb-3">Create</a>
                <table class="table table-striped table-hover table-borderless">
                    <thead class="text-center align-middle bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        <?php 
                            $no = 1;
                            $outlets = $CrudProcess->getAllData('tb_outlet');
                            foreach($outlets as $outlet) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $outlet->nama_outlet ?></td>
                            <td><?= $outlet->alamat ?></td>
                            <td><?= $outlet->no_telepon ?></td>
                            <td>
                                <a href="<?= $helper->baseUrl("outlet-edit.php?id=$outlet->id_outlet") ?>" class="btn btn-outline-success">Edit</a>
                                <a href="<?= $helper->baseUrl("app/core/controller/OutletController.php?delete=$outlet->id_outlet") ?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-outline-danger">Delete</a>
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