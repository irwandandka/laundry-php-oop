<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->auth();
?>

<div class="col-md-6">
    <div class="card rounded shadow-lg">
        <div class="card-body my-5 mx-4">
            <h1 class="text-center fw-bold">Register</h1>
            <form action="<?= $helper->baseUrl('app/core/controller/UserController.php?action=register') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_user" class="form-label fw-bold">Nama</label>
                    <input type="nama_user" name="nama_user" id="nama_user" class="form-control" placeholder="John Doe">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="username" name="username" id="username" class="form-control" placeholder="johnny yes papa">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="id_outlet" class="form-label fw-bold">Outlet</label>
                    <select name="id_outlet" id="id_outlet" class="form-control">
                        <option value="">--- Pilih Outlet ---</option>
                        <?php 
                            $outlets = $CrudProcess->getAllData('tb_outlet');
                            foreach($outlets as $outlet) :
                        ?>
                        <option value="<?= $outlet->id_outlet ?>"><?= $outlet->nama_outlet ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label fw-bold">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">--- Registrasi Sebagai ---</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">kasir</option>
                        <option value="owner">owner</option>
                    </select>
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" name="login" class="btn btn-dark">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>
