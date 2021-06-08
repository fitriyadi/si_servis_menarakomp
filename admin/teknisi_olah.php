<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_teknisi","idteknisi='$kode'"));

}else{
  $idteknisi="";
  $nama="";
  $nohp="";
  $alamat="";
  $username="";
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
            <h3 class="card-title">Olah Data Teknisi</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="teknisi_proses.php" method="post">

            <div class="card-body">

              <input type="hidden" name="idteknisi" value="<?=$idteknisi?>">

              <div class="form-group">
                <label for="nama">Nama Teknisi</label>
                <input type="text" name="nama" class="form-control" value="<?=$nama?>" placeholder="Inputkan Nama teknisi" required="">
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
                <label for="nama">Username</label>
                <input type="text" name="username" class="form-control" value="<?=$username?>" placeholder="Inputkan Username" required="">
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
              <a href="?hal=teknisi" class="btn btn-default">
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