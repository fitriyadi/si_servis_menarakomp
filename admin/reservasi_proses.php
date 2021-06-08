<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_panggilan  SET 
		idteknisi=?,
		status=?
		where idpanggilan=?");
	$stmt->bind_param("sss",
		mysqli_real_escape_string($mysqli, $_POST['idteknisi']),
		mysqli_real_escape_string($mysqli, "Proses"),
		mysqli_real_escape_string($mysqli, $_POST['idpanggilan']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Reservasi Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=reservasi_selesai';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_panggilan where idpanggilan=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Reservasi Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=rerervasi_selesai';</script>";	
	} else {
		echo "<script>alert('Data Reservasi Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}