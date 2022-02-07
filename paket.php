<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/paket.php');
?>

<div class="col-md-10">
    <div class="card rounded shadow-lg">
        <div class="card-header text-center fw-bold">Paket</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('paket-create.php') ?>" class="btn btn-outline-primary mb-3">Create</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless">
                    <thead class="text-center align-middle bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Nama Outlet</th>
                            <th>Jenis</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        <?php 
                        $no = 1;
                        $pakets = $CrudProcess->selectJoin("SELECT * FROM tb_paket JOIN tb_outlet ON (tb_paket.id_outlet = tb_outlet.id_outlet)");
                        foreach($pakets as $paket) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $paket->nama_outlet ?></td>
                            <td><?= $paket->jenis ?></td>
                            <td><?= $paket->nama_paket ?></td>
                            <td><?= $paket->harga ?></td>
                            <td>
                                <a href="<?= $helper->baseUrl("paket-edit.php?id=$paket->id_paket") ?>" class="btn btn-outline-success">Edit</a>
                                <a href="<?= $helper->baseUrl("app/core/controller/PaketController.php?delete=$paket->id_paket") ?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-outline-danger">Delete</a>
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