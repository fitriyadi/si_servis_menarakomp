<?php
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';

$user=$_POST['username'];
$pass=$_POST['password']; 

  //Pengecekan ada data dalam login tidak
$sqladmin="Select idadmin from tb_admin where username='$user' and password='$pass'";
$sqlpelanggan="Select idpelanggan from tb_pelanggan where email='$user' and password='$pass'";
$sqlteknisi="Select idteknisi from tb_teknisi where username='$user' and password='$pass'";


if (CekExist($mysqli,$sqladmin)== true):
    //JIka data ditemukan
	$_SESSION['admin']=caridata($mysqli,$sqladmin);
	echo "<script>alert('Anda login sebagai Admin')</script>";
	echo "<script>window.location='admin/index.php?hal=admin';</script>";

elseif(CekExist($mysqli,$sqlpelanggan)== true):
    //Jika tidak ditemukan
	$_SESSION['pelanggan']=caridata($mysqli,$sqlpelanggan);
	echo "<script>alert('Anda login sebagai pelanggan')</script>";
	echo "<script>window.location='pelanggan/index.php?hal=pelanggan';</script>";

elseif(CekExist($mysqli,$sqlteknisi)== true):
    //Jika tidak ditemukan
	$_SESSION['teknisi']=caridata($mysqli,$sqlteknisi);
	echo "<script>alert('Anda login sebagai Teknisi')</script>";
	echo "<script>window.location='teknisi/index.php?hal=teknisi';</script>";
else:
	echo "<script>alert('Username atau Password tidak terdaftar')</script>";
	echo "<script>window.location='login.php';</script>";
endif;

?>