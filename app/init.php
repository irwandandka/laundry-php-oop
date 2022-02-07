<?php

require_once "core/Database.php";
require_once "core/CrudProcess.php";
require_once "core/Helper.php";
require_once "core/Authenticated.php";


$db = new Database;
$conn = $db->DBConnect();
$CrudProcess = new CrudProcess($conn);

if(isset($_SESSION['auth'])) {
    $role = $_SESSION['auth']->role;
    $name = $_SESSION['auth']->nama_user;
}

$checkAuth = new Authenticated;


