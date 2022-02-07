<?php

    require_once "../../init.php";

    // proses tambah
    if(!empty($_GET['action'] == 'create'))
    {
        $idOutlet = strip_tags($_POST['id_outlet']);
        $jenis = strip_tags($_POST['jenis']);
        $namaPaket = strip_tags($_POST['nama_paket']);
        $harga = strip_tags($_POST['harga']);

        $result = $CrudProcess->insert("INSERT INTO tb_paket (nama_paket, jenis, id_outlet, harga) VALUES ('$namaPaket', '$jenis', '$idOutlet', '$harga')");
        if($result) {
            $helper->redirect('Berhasil Tambah Paket','paket.php');
        }
    }

    // proses edit
	if(!empty($_GET['action'] == 'edit'))
	{
		$idOutlet = strip_tags($_POST['id_outlet']);
        $jenis = strip_tags($_POST['jenis']);
        $namaPaket = strip_tags($_POST['nama_paket']);
        $harga = strip_tags($_POST['harga']);
        $id = strip_tags($_POST['id']);
        
        $result = $CrudProcess->update("UPDATE tb_paket SET nama_paket = '$namaPaket', jenis = '$jenis', id_outlet = '$idOutlet', harga = '$harga' WHERE id_paket = $id");
        if($result) {
            $helper->redirect('Berhasil Edit Paket','paket.php');
        }

    }
    
    // hapus data
    if(!empty($_GET['delete']))
    {
        $id = strip_tags($_GET['delete']);
        $result = $CrudProcess->delete("DELETE FROM tb_paket WHERE id_paket = '$id'");
        if($result) {
            $helper->redirect('Berhasil Hapus Paket','paket.php');
        }
    }