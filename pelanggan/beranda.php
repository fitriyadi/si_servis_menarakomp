
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3 class="m-0 text-dark">Selamat Datang, Pelanggan </h3>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<?php $idpelanggan=$_SESSION['pelanggan']; ?>
					<h3><?=JumlahData($mysqli,"tb_panggilan where idpelanggan='$idpelanggan'")?></h3>
					<p>Jumlah Reservasi</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="?hal=reservasi" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h3><?=JumlahData($mysqli,"tb_servis where idpelanggan='$idpelanggan'")?></h3>

					<p>Jumlah servis</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="?hal=servis" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->