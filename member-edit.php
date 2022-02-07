<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();

    $id = strip_tags($_GET['id']);
    $member = $CrudProcess->getData('tb_member', 'id_member', $id);
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header text-center fw-bold">Edit Member <?= $member->nama_member ?></div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('member.php') ?>" class="btn btn-outline-primary mb-3">Back</a>
            <form action="<?= $helper->baseUrl('app/core/controller/MemberController.php?action=edit') ?>" method="post">
                <div class="mb-3">
                    <label for="nama_member" class="form-label fw-bold">Nama Member</label>
                    <input type="text" name="nama_member" id="nama_member" class="form-control" value="<?= $member->nama_member ?>" placeholder="jane doe">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control">
                        <?= $member->alamat ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">----- PIlih jenis kelamin -----</option>
                        <option value="L" <?= $member->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?> >Laki-laki</option>
                        <option value="P" <?= $member->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?> >Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label fw-bold">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?= $member->no_telepon ?>" placeholder="xxxx-xxxx-xxxx">
                </div>
                <div class="mb-3 float-end">
                    <input type="hidden" name="id" value="<?= $member->id_member ?>">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>