<?php

session_start();
class Authenticated {

    public $message;

    public function auth()
    {
        if(isset($_SESSION['auth'])) {
            $_SESSION['message'] = "Anda Sudah Terautentikasi";
            header('Location: http://localhost/laundry/dashboard.php');
        }
    }

    public function checkRole($role, $page) 
    {
        if($role == 'admin') {
            // admin rules
        } elseif ($role == 'kasir') {
            // kasir rules
            switch ($page) {
                case 'localhost/laundry/user.php':
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                case 'localhost/laundry/outlet.php';
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                case 'localhost/laundry/paket.php';
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                default:
                    continue;
                    break;
            }
        } elseif ($role == 'owner') {
            // owner rules 
            switch ($page) {
                case 'localhost/laundry/user.php':
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                case 'localhost/laundry/member.php':
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                case 'localhost/laundry/outlet.php';
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                case 'localhost/laundry/paket.php';
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                case 'localhost/laundry/transaksi.php';
                    $_SESSION['message'] = "Anda Tidak Memiliki Akses!";
                    header('Location: http://localhost/laundry/dashboard.php');
                    break;
                default:
                    continue;
                    break;
            }
        }
    }

    public function redirectIfNotAuthenticated()
    {
        if(!isset($_SESSION['auth'])) {
            $_SESSION['message'] = "Anda Belum Login";
            header('Location: http://localhost/laundry/login.php');
        }
    }

    public function welcomeMessage($name) 
    {
        return "Selamat Datang $name";
    }
}