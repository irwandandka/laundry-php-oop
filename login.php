<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->auth();
?>

<div class="col-md-6">
    <div class="card rounded shadow-lg">
        <div class="card-body my-5 mx-4">
            <h1 class="text-center fw-bold">Login</h1>
            <form action="<?= $helper->baseUrl('app/core/controller/UserController.php?action=login') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="username" name="username" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label fw-bold">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">--- Masuk Sebagai ---</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">kasir</option>
                        <option value="owner">owner</option>
                    </select>
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" name="login" class="btn btn-dark">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>
