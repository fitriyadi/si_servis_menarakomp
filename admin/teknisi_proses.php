<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan teknisi
	$stmt = $mysqli->prepare("INSERT INTO tb_teknisi 
		(nama,nohp,alamat,username,password) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['nohp']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']),
		mysqli_real_escape_string($mysqli, $_POST['username']),
		mysqli_real_escape_string($mysqli, $_POST['password']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data teknisi Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=teknisi';</script>";	
	} else {
		echo "<script>alert('Data teknisi Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_teknisi  SET 
		nama=?,
		nohp=?,
		alamat=?,
		username=?,
		password=?
		where idteknisi=?");
	$stmt->bind_param("ssssss",
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['nohp']),
		mysqli_real_escape_string($mysqli, $_POST['alamat']),
		mysqli_real_escape_string($mysqli, $_POST['username']),
		mysqli_real_escape_string($mysqli, $_POST['password']),
		mysqli_real_escape_string($mysqli, $_POST['idteknisi']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data teknisi Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=teknisi';</script>";	
	} else {
		echo "<script>alert('Data teknisi Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_teknisi where idteknisi=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data teknisi Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=teknisi';</script>";	
	} else {
		echo "<script>alert('Data teknisi Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>