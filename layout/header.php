<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Siuuu</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Laundry Siuuu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $helper->path('index.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('index.php') ?>">Home</a>
                    </li>
                    <?php if(isset($_SESSION['auth'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('dashboard.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('dashboard.php') ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('user.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('user.php') ?>">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('outlet.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('outlet.php') ?>">Outlet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('member.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('member.php') ?>">Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('paket.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('paket.php') ?>">Paket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('transaksi.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('transaksi.php') ?>">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold <?= $helper->path('laporan.php') ? 'active' : '' ?>" href="<?= $helper->baseUrl('laporan.php') ?>">Laporan</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['auth'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-bold dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $name ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="<?= $helper->baseUrl('app/core/controller/UserController.php?action=logout') ?>" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold active" href="<?= $helper->baseUrl('login.php') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold active" href="<?= $helper->baseUrl('register.php') ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <?php
            if(isset($_SESSION['message'])) :
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-danger text-center fw-bold">
                        <?= $message; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">

        