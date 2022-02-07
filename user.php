<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/user.php');
?>

<div class="col-md-10">
    <div class="card">
        <div class="card-header text-center fw-bold">Users</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('user-create.php') ?>" class="btn btn-outline-primary">Create</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>#</th>
                            <th>Nama</th> 
                            <th>Username</th>
                            <th>Nama Outlet</th>
                            <th>Role</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        <?php 
                            $users = $CrudProcess->selectJoin('SELECT * FROM tb_user JOIN tb_outlet ON (tb_user.id_outlet = tb_outlet.id_outlet)');
                            $no = 1;
                            foreach($users as $user) : 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user->nama_user ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->nama_outlet ?></td>
                            <td><?= $user->role ?></td>
                            <td>
                                <a href="<?= $helper->baseUrl("user-edit.php?id=$user->id_user") ?>" class="btn btn-outline-success">Edit</a>
                                <a href="<?= $helper->baseUrl("app/core/controller/UserController.php?delete=$user->id_user") ?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-outline-danger">Delete</a>
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