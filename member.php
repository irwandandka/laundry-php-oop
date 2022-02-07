<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
    $checkAuth->checkRole($role, 'localhost/laundry/member.php');
?>

<div class="col-md-10">
    <div class="card rounded shadow-lg">
        <div class="card-header text-center fw-bold">Member</div>
        <div class="card-body my-4 mx-3">
            <a href="<?= $helper->baseUrl('member-create.php') ?>" class="btn btn-outline-primary mb-3">Create</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless">
                    <thead class="text-center align-middle bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        <?php 
                            $no = 1;
                            $members = $CrudProcess->getAllData('tb_member');
                            foreach($members as $member) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $member->nama_member ?></td>
                            <td><?= $member->alamat ?></td>
                            <td><?= $member->jenis_kelamin ?></td>
                            <td><?= $member->no_telepon ?></td>
                            <td>
                                <a href="<?= $helper->baseUrl("member-edit.php?id=$member->id_member") ?>" class="btn btn-outline-success">Edit</a>
                                <a href="<?= $helper->baseUrl("app/core/controller/MemberController.php?delete=$member->id_member") ?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-outline-danger">Delete</a>
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