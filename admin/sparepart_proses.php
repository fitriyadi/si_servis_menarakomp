<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan nama
	$stmt = $mysqli->prepare("INSERT INTO tb_sparepart 
		(nama,harga,merk,tipe) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss", 
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['harga']),
		mysqli_real_escape_string($mysqli, $_POST['merk']),
		mysqli_real_escape_string($mysqli, $_POST['tipe']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data sparepart Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=sparepart';</script>";	
	} else {
		echo "<script>alert('Data sparepart Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_sparepart  SET 
		nama=?,
		harga=?,
		merk=?,
		tipe=?
		where idsparepart=?");
	$stmt->bind_param("sssss",
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['harga']),
		mysqli_real_escape_string($mysqli, $_POST['merk']),
		mysqli_real_escape_string($mysqli, $_POST['tipe']),
		mysqli_real_escape_string($mysqli, $_POST['kode']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data sparepart Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=sparepart';</script>";	
	} else {
		echo "<script>alert('Data sparepart Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_sparepart where idsparepart=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data sparepart Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=sparepart';</script>";	
	} else {
		echo "<script>alert('Data sparepart Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>