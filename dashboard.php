<?php 
    require_once "app/init.php";
    include_once "layout/header.php";
    $checkAuth->redirectIfNotAuthenticated();
?>

<div class="col-md-6">
    <div class="card rounded shadow-lg">
        <div class="card-body text-center fw-bold">
            <?= $checkAuth->welcomeMessage($name) ?>
        </div>
    </div>
</div>

<?php include_once "layout/footer.php" ?>
