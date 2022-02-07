<?php

    require_once "../../init.php";

    // proses tambah
    if(!empty($_GET['action'] == 'create'))
    {
        $nama = strip_tags($_POST['nama_member']);
        $alamat = strip_tags($_POST['alamat']);
        $jenisKelamin = strip_tags($_POST['jenis_kelamin']);
        $noTelepon = strip_tags($_POST['no_telepon']);

        $result = $CrudProcess->insert("INSERT INTO tb_member (nama_member, alamat, jenis_kelamin, no_telepon) VALUES ('$nama', '$alamat', '$jenisKelamin', '$noTelepon')");
        if($result) {
            $helper->redirect('Berhasil Tambah Member','member.php');
        }
    }

    // proses edit
	if(!empty($_GET['action'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama_member']);
        $alamat = strip_tags($_POST['alamat']);
        $jenisKelamin = strip_tags($_POST['jenis_kelamin']);
        $noTelepon = strip_tags($_POST['no_telepon']);
        $id = strip_tags($_POST['id']);
        
        $result = $CrudProcess->update("UPDATE tb_member SET nama_member = '$nama', alamat = '$alamat', jenis_kelamin = '$jenisKelamin', no_telepon = '$noTelepon' WHERE id_member = '$id'");
        if($result) {
            $helper->redirect('Berhasil Edit Member','member.php');
        }

    }
    
    // hapus data
    if(!empty($_GET['delete']))
    {
        $id = strip_tags($_GET['delete']);
        $result = $CrudProcess->delete("DELETE FROM tb_member WHERE id_member = '$id'");
        if($result) {
            $helper->redirect('Berhasil Hapus Member','member.php');
        }
    }