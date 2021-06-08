<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_sparepart","idsparepart='$kode'"));

}else{
  $nama="";
  $harga="";
  $merk="";
  $tipe="";
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
            <h3 class="card-title">Olah Data Sparepart</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="sparepart_proses.php" method="post">

            <div class="card-body">

              <input type="hidden" name="kode" value="<?=$idsparepart;?>">

              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?=$nama?>" placeholder="Inputkan nama" required="">
              </div>

              <div class="form-group">
                <label for="nama">Harga</label>
                <input type="text" name="harga" class="form-control" value="<?=$harga?>" placeholder="Inputkan harga" required="">
              </div>

              <div class="form-group">
                <label for="nama">Merk</label>
                <input type="text" name="merk" class="form-control" value="<?=$merk?>" placeholder="Inputkan Merk" required="">
              </div>

              <div class="form-group">
                <label for="nama">Tipe</label>
                <input type="text" name="tipe" class="form-control" value="<?=$tipe?>" placeholder="Inputkan Tipe" required="">
              </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
              class="btn btn-primary" value="Simpan">
              <a href="?hal=sparepart" class="btn btn-default">
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