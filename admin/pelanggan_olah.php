<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_pelanggan","idpelanggan='$kode'"));

}else{
  $idpelanggan="";
  $namapelanggan="";
  $nohp="";
  $alamat="";
  $email="";
  $password="";
}
?>

<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Olah Data Pelanggan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="pelanggan_proses.php" method="post">

            <div class="card-body">

              <input type="hidden" name="idpelanggan" value="<?=$idpelanggan?>">

              <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" name="namapelanggan" class="form-control" value="<?=$namapelanggan?>" placeholder="Inputkan Nama pelanggan" required="">
              </div>

              <div class="form-group">
                <label for="nama">No HP</label>
                <input type="number" name="nohp" class="form-control" value="<?=$nohp?>" placeholder="Inputkan No HP" required="">
              </div>

              <div class="form-group">
                <label for="nama">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?=$alamat?>" placeholder="Inputkan alamat" required="">
              </div>

              <div class="form-group">
                <label for="nama">Email</label>
                <input type="email" name="email" class="form-control" value="<?=$email?>" placeholder="Inputkan email" required="">
              </div>

              <div class="form-group">
                <label for="nama">Password</label>
                <input type="text" name="password" class="form-control" value="<?=$password?>" placeholder="Inputkan Password" required="">
              </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
              class="btn btn-primary" value="Simpan">
              <a href="?hal=pelanggan" class="btn btn-default">
                Batal
              </a>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
                      <!-- /.content -->