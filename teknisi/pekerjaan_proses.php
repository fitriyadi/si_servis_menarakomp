<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';
session_start();

if(isset($_POST['sparepart']))
{	
	//Proses penambahan data
	$idservis=$_POST['idservis'];
	$idsparepart=$_POST['idsparepart'];
	$harga=caridata($mysqli,"select harga from tb_sparepart where idsparepart='$idsparepart'");
	$stmt = $mysqli->prepare("INSERT INTO tb_barang_sparepart 
		(idservis,idbarang,harga) 
		VALUES (?,?,?)");

	$stmt->bind_param("sss", 
		mysqli_real_escape_string($mysqli, $_POST['idservis']),
		mysqli_real_escape_string($mysqli, $_POST['idsparepart']),
		mysqli_real_escape_string($mysqli, $harga));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data sparepart Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=pekerjaan_olah?&id=$idservis';</script>";	
	} else {
		echo "<script>alert('Data sparepart Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}


}else if(isset($_POST['pekerjaan'])){	
	//Proses penambahan data
	updatestatus($mysqli,$idservis,"Pengerjaan");
	$idservis=$_POST['idservis'];
	$idsparepart=$_POST['idsparepart'];

	$stmt = $mysqli->prepare("INSERT INTO tb_pengerjaan 
		(idservis,pekerjaan,tanggal,presentase) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss", 
		mysqli_real_escape_string($mysqli, $_POST['idservis']),
		mysqli_real_escape_string($mysqli, $_POST['pekerjaan']),
		mysqli_real_escape_string($mysqli, date('Y-m-d')),
		mysqli_real_escape_string($mysqli, $_POST['presentase']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data pekerjaan Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=pekerjaan_olah?&id=$idservis';</script>";	
	} else {
		echo "<script>alert('Data pekerjaan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}


}else if(isset($_GET['hapussparepart'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_barang_sparepart where id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapussparepart'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data barang sparepart Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pekerjaan_baru';</script>";	
	} else {
		echo "<script>alert('Data Reservasi Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapuspekerjaan'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pengerjaan where idpengerjaan=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapuspekerjaan'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data barang sparepart Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pekerjaan_baru';</script>";	
	} else {
		echo "<script>alert('Data Reservasi Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['selesai'])){	
	//Proses penambahan data
	$status="selesai";
	$idservis=$_POST['idservis'];
	$biaya=$_POST['biaya'];
	$harga=caridata($mysqli,"select sum(harga) from tb_barang_sparepart where idservis='$idservis'");
	$total=$harga+$biaya;

	$stmt = $mysqli->prepare("UPDATE tb_servis  SET 
		biayaservis=?,
		total=?,
		status=?
		where idservis=?");
	$stmt->bind_param("ssss",
		mysqli_real_escape_string($mysqli, $biaya),
		mysqli_real_escape_string($mysqli, $total),
		mysqli_real_escape_string($mysqli, $status),
		mysqli_real_escape_string($mysqli, $idservis));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data servis Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=pekerjaan_selesai';</script>";	
	} else {
		echo "<script>alert('Data pekerjaan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
}


function updatestatus($mysqli,$idservis,$status){
	$stmt = $mysqli->prepare("UPDATE tb_servis  SET 
		status=?
		where idservis=?");
	$stmt->bind_param("ss",
		mysqli_real_escape_string($mysqli, $status),
		mysqli_real_escape_string($mysqli, $idservis));	
	$stmt->execute();
}
?>