<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Create Member</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('member.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/MemberController.php?action=create') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_member" class="form-label fw-bold">Nama Member</label>
                    <input type="text" name="nama_member" id="nama_member" class="form-control" placeholder="jane doe">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">----- Pilih jenis kelamin -----</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
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