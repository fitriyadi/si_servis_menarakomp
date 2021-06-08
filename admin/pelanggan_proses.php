<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan pelanggan
	$stmt = $mysqli->prepare("INSERT INTO tb_pelanggan 
		(namapelanggan,nohp,alamat,email,password) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		mysqli_real_escape_string($mysqli, $_POST['namapelanggan']),
		mysqli_real_escape_string($mysqli, $_POST['nohp']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']),
		mysqli_real_escape_string($mysqli, $_POST['email']),
		mysqli_real_escape_string($mysqli, $_POST['password']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=pelanggan';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_pelanggan  SET 
		namapelanggan=?,
		nohp=?,
		alamat=?,
		email=?,
		password=?
		where idpelanggan=?");
	$stmt->bind_param("ssssss",
		mysqli_real_escape_string($mysqli, $_POST['namapelanggan']),
		mysqli_real_escape_string($mysqli, $_POST['nohp']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']),
		mysqli_real_escape_string($mysqli, $_POST['email']),
		mysqli_real_escape_string($mysqli, $_POST['password']),
		mysqli_real_escape_string($mysqli, $_POST['idpelanggan']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=pelanggan';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pelanggan where idpelanggan=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pelanggan';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>