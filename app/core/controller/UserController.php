<?php

    require_once "../../init.php";

    // proses tambah
    if(!empty($_GET['action'] == 'create'))
    {
        $nama = strip_tags($_POST['nama_user']);
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $id_outlet = strip_tags($_POST['id_outlet']);
        $role = strip_tags($_POST['role']);

        $result = $CrudProcess->insert("INSERT INTO tb_user (nama_user, username, password, id_outlet, role) VALUES ('$nama', '$username', '$password', '$id_outlet', '$role')");
        if($result) {
            $helper->redirect('Berhasil Tambah User','user.php');
        }
    }

    // proses edit
	if(!empty($_GET['action'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama_user']);
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $id_outlet = strip_tags($_POST['id_outlet']);
        $role = strip_tags($_POST['role']);
        $id = strip_tags($_POST['id']);
        
        $result = $CrudProcess->update("UPDATE tb_user SET nama_user = '$nama', username = '$username', id_outlet = '$id_outlet', role = '$role' WHERE id_user = '$id'");
        if($result) {
            $helper->redirect('Berhasil Edit User','user.php');
        }

    }
    
    // hapus data
    if(!empty($_GET['delete']))
    {
        $id = strip_tags($_GET['delete']);
        $result = $CrudProcess->delete("DELETE FROM tb_user WHERE id_user = '$id'");
        if($result) {
            $helper->redirect('Berhasil Hapus User','user.php');
        }
    }

    if(!empty($_GET['action'] == 'login'))
    {   
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $role = strip_tags($_POST['role']);

        $result = $CrudProcess->login($username,$password, $role);
        if($result == 'gagal')
        {
            header('Location: http://localhost/laundry/login.php');
            exit();
        }else{
            $_SESSION['auth'] = $result;
            header('Location: http://localhost/laundry/dashboard.php');
            exit();
        }
    }

    if(!empty($_GET['action'] == 'register')) 
    {
        $name = strip_tags($_POST['nama_user']);
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $idOutlet = strip_tags($_POST['id_outlet']);
        $role = strip_tags($_POST['role']);

        $result = $CrudProcess->register($name, $username, $password, $idOutlet, $role);
        $data = $CrudProcess->getData('tb_user','username', $username);
        if($result == 'gagal') {
            header('Location: http://localhost/laundry/register.php');
            exit();
        } else {
            $_SESSION['auth'] = $data;
            header('Location: http://localhost/laundry/dashboard.php');
            exit();
        }
    }

    if(!empty($_GET['action'] == 'logout'))
    {   
        session_destroy();
        header('Location: http://localhost/laundry/index.php');
        exit();
    }

