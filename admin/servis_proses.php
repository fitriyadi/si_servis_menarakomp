<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan username
	$stmt = $mysqli->prepare("INSERT INTO tb_servis 
		(idservis,idpelanggan,tanggalmasuk,kerusakan,keteranganbarang,status) 
		VALUES (?,?,?,?,?,?)");

	$stmt->bind_param("ssssss", 
		mysqli_real_escape_string($mysqli, $_POST['idservis']),
		mysqli_real_escape_string($mysqli, $_POST['idpelanggan']),
		mysqli_real_escape_string($mysqli, $_POST['tanggalmasuk']),
		mysqli_real_escape_string($mysqli, $_POST['kerusakan']),
		mysqli_real_escape_string($mysqli, $_POST['deskripsi']),
		mysqli_real_escape_string($mysqli, 'masuk'));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Servis Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=servis_baru';</script>";	
	} else {
		echo "<script>alert('Data Servis Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_servis  SET 
		username=?,
		password=?
		where idServis=?");
	$stmt->bind_param("sss",
		mysqli_real_escape_string($mysqli, $_POST['username']),
		mysqli_real_escape_string($mysqli, $_POST['password']),
		mysqli_real_escape_string($mysqli, $_POST['kode']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Servis Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=Servis';</script>";	
	} else {
		echo "<script>alert('Data Servis Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_servis where idServis=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Servis Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=Servis';</script>";	
	} else {
		echo "<script>alert('Data Servis Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>