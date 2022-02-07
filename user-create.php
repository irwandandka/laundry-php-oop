<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Create User</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('user.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/UserController.php?action=create') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_user" class="form-label fw-bold">Nama User</label>
                    <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="john doe">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="jhonny">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="**********">
                </div>
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
                    <label for="password" class="form-label fw-bold">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="kasir">Kasir</option>
                        <option value="Owner">Owner</option>
                    </select>
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" name="create" class="btn btn-primary">Create</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>