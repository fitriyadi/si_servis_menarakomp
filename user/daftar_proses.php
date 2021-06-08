<?php
error_reporting(0);
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if($_POST['pass']==$_POST['passulang']):

	$stmt = $mysqli->prepare("INSERT INTO tb_pelanggan 
		(namapelanggan,nohp,alamat,email,password) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['nohp']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']),
		mysqli_real_escape_string($mysqli, $_POST['email']),
		mysqli_real_escape_string($mysqli, $_POST['pass']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan Berhasil Disimpan, silakan login sistem')</script>";
		echo "<script>window.location='../login.php';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

else:
	echo "<script>alert('Password dan konfirmasi password harus sama')</script>";
	echo "<script>window.location='javascript:history.go(-1)';</script>";
endif;
?>