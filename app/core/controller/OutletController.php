<?php

    require_once "../../init.php";

    // proses tambah
    if(!empty($_GET['action'] == 'create'))
    {
        $nama = strip_tags($_POST['nama_outlet']);
        $alamat = strip_tags($_POST['alamat']);
        $no_telepon = strip_tags($_POST['no_telepon']);

        $result = $CrudProcess->insert("INSERT INTO tb_outlet (nama_outlet, alamat, no_telepon) VALUES ('$nama', '$alamat', '$no_telepon')");
        if($result) {
            $helper->redirect('Berhasil Tambah Outlet','outlet.php');
        }
    }

    // proses edit
	if(!empty($_GET['action'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama_outlet']);
        $alamat = strip_tags($_POST['alamat']);
        $no_telepon = strip_tags($_POST['no_telepon']);
        $id = strip_tags($_POST['id']);
        
        $result = $CrudProcess->update("UPDATE tb_outlet SET nama_outlet = '$nama', alamat = '$alamat', no_telepon = '$no_telepon' WHERE id_outlet = '$id'");
        if($result) {
            $helper->redirect('Berhasil Edit Outlet','outlet.php');
        }

    }
    
    // hapus data
    if(!empty($_GET['delete']))
    {
        $id = strip_tags($_GET['delete']);
        $result = $CrudProcess->delete("DELETE FROM tb_outlet WHERE id_outlet = '$id'");
        if($result) {
            $helper->redirect('Berhasil Hapus Outlet','outlet.php');
        }
    }