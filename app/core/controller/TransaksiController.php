<?php

    require_once __DIR__."/../../init.php";
    if(!empty($_GET['action'] == 'create'))
    {
        $idOutlet = strip_tags($_POST['id_outlet']);
        $idUser = strip_tags($_POST['id_user']);
        $idMember = strip_tags($_POST['id_member']);
        $tanggal = strip_tags($_POST['tanggal']);
        $batasWaktu = strip_tags($_POST['batas_waktu']);
        $tanggalBayar = strip_tags($_POST['tanggal_bayar']);
        $kodeInvoice = bin2hex(random_int(10, 20));
        $biayaTambahan = strip_tags($_POST['biaya_tambahan']);
        $diskon = strip_tags($_POST['diskon']);
        $pajak = strip_tags($_POST['pajak']);
        $status = strip_tags($_POST['status']);
        $statusPembayaran = strip_tags($_POST['status_pembayaran']);

        $result = $CrudProcess->insert("INSERT INTO tb_transaksi (id_outlet, id_user, id_member, tanggal, batas_waktu, tanggal_bayar, kode_invoice,
         biaya_tambahan, diskon, pajak, status, status_pembayaran) VALUES ('$idOutlet', '$idUser', '$idMember', '$tanggal', '$batasWaktu', 
         '$tanggalBayar', '$kodeInvoice', '$biayaTambahan', '$diskon', '$pajak', '$status', '$statusPembayaran')");
        if($result) {
            $helper->redirect('Berhasil Tambah Transaksi','transaksi.php');
        }
    }

    // proses edit
	if(!empty($_GET['action'] == 'edit'))
	{
		$idOutlet = strip_tags($_POST['id_outlet']);
        $idUser = strip_tags($_POST['id_user']);
        $idMember = strip_tags($_POST['id_member']);
        $tanggal = strip_tags($_POST['tanggal']);
        $batasWaktu = strip_tags($_POST['batas_waktu']);
        $tanggalBayar = strip_tags($_POST['tanggal_bayar']);
        $biayaTambahan = strip_tags($_POST['biaya_tambahan']);
        $diskon = strip_tags($_POST['diskon']);
        $pajak = strip_tags($_POST['pajak']);
        $status = strip_tags($_POST['status']);
        $statusPembayaran = strip_tags($_POST['status_pembayaran']);
        $id = strip_tags($_POST['id']);
        
        $result = $CrudProcess->update("UPDATE tb_transaksi SET id_outlet = $idOutlet, id_user = $idUser, id_member = $idMember, tanggal = '$tanggal', batas_waktu = '$batasWaktu', tanggal_bayar = '$tanggalBayar', biaya_tambahan = '$biayaTambahan', diskon = '$diskon', pajak = '$pajak', status = '$status', status_pembayaran = '$statusPembayaran' WHERE id_transaksi = '$id'");
        if($result) {
            $helper->redirect('Berhasil Edit Transaksi','transaksi.php');
        }

    } 

    if(!empty($_GET['action'] == 'detail-transaksi-create'))
    {
        $idPaket = strip_tags($_POST['id_paket']);
        $quantity = strip_tags($_POST['qty']);
        $keterangan = strip_tags($_POST['keterangan']);
        $idTransaksi = strip_tags($_POST['id']);

        $result = $CrudProcess->insert("INSERT INTO tb_detail_transaksi (id_transaksi, id_paket, qty, keterangan) VALUES ('$idTransaksi','$idPaket','$quantity','$keterangan')");
        if($result) {
            $helper->redirect('Berhasil Tambah Detail Transaksi','transaksi.php');
        }
    }
    
    // hapus data
    if(!empty($_GET['delete']))
    {
        $id = strip_tags($_GET['delete']);
        $result = $CrudProcess->delete("DELETE FROM tb_transaksi WHERE id_transaksi = '$id'");
        if($result) {
            $helper->redirect('Berhasil Hapus Transaksi','transaksi.php');
        }
    }
