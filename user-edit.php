<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $id = strip_tags($_GET['id']);
    $user = $CrudProcess->selectSingleJoin("SELECT * FROM tb_user JOIN tb_outlet ON (tb_user.id_outlet = tb_outlet.id_outlet) WHERE id_user = $id");
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Edit User</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('user.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/UserController.php?action=edit') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_user" class="form-label fw-bold">Nama User</label>
                    <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= $user->nama_user ?>" placeholder="john doe">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="username" name="username" id="username" class="form-control" value="<?= $user->username ?>" placeholder="jhonny">
                </div>
                <div class="mb-3">
                    <label for="id_outlet" class="form-label fw-bold">Nama Outlet</label>
                    <select name="id_outlet" id="id_outlet" class="form-control">
                    <?php 
                        $outlets = $CrudProcess->getAllData('tb_outlet');
                        foreach($outlets as $outlet) :
                    ?>
                        <option value="<?= $outlet->id_outlet ?>" <?= $user->id_outlet == $outlet->id_outlet ? 'selected' : '' ?>><?= $outlet->nama_outlet ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="user" <?= $user->role == 'user' ? 'selected' : '' ?>>User</option>
                        <option value="kasir" <?= $user->role == 'kasir' ? 'selected' : '' ?>>Kasir</option>
                        <option value="Owner" <?= $user->role == 'owner' ? 'selected' : '' ?>>Owner</option>
                    </select>
                </div>
                <div class="mb-3 float-end">
                    <input type="hidden" name="id" value="<?= $user->id_user ?>">
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>