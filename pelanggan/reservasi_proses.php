<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';
session_start();

if(isset($_POST['tambah']))
{	
//Proses penambahan username
	$stmt = $mysqli->prepare("INSERT INTO tb_panggilan 
		(idpelanggan,tanggal,jam,namabarang,deskripsikerusakan) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		mysqli_real_escape_string($mysqli, $_SESSION['pelanggan']),
		mysqli_real_escape_string($mysqli, $_POST['tanggal']),
		mysqli_real_escape_string($mysqli, $_POST['jam']),
		mysqli_real_escape_string($mysqli, $_POST['namabarang']),
		mysqli_real_escape_string($mysqli, $_POST['deskripsi']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Reservasi Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=reservasi';</script>";	
	} else {
		echo "<script>alert('Data Reservasi Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}


}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_panggilan where idpanggilan=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Reservasi Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=reservasi';</script>";	
	} else {
		echo "<script>alert('Data Reservasi Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>