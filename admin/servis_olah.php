<?php
$tgl=date('Ymd');
$idservis=KodeOtomatis($mysqli,"tb_servis","idservis","S".$tgl,"7","2");
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
            <h3 class="card-title">Olah Data Servis Baru</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="servis_proses.php" method="post">

            <div class="card-body">


              <div class="form-group">
                <label for="nama">No Servis</label>
                <input type="text" name="idservis" class="form-control"  placeholder="Inputkan Kode Servis" value="<?=$idservis?>"  required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <select class="form-control select2" name="idpelanggan">
                  <?php
                  $query="SELECT * from tb_pelanggan";
                  $result=$mysqli->query($query);
                  $num_result=$result->num_rows;
                  if ($num_result > 0 ) { 
                    $no=0;
                    while ($data=mysqli_fetch_assoc($result)) {
                      ?>  
                      <option value="<?=$data['idpelanggan']?>"><?=$data['namapelanggan'];?></option>
                    <?php } } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nama">Tanggal</label>
                  <input type="date" name="tanggalmasuk" class="form-control" placeholder="Inputkan No HP" required="">
                </div>

                <div class="form-group">
                  <label for="nama">Kerusakan</label>
                  <input type="text" name="kerusakan" class="form-control"  placeholder="Inputkan Kerusakan" required="">
                </div>

                <div class="form-group">
                  <label for="nama">Deskripsi</label>
                  <textarea class="form-control" rows="3" name="deskripsi" placeholder="Inputkan Alamat"></textarea>
                </div>

                <div class="form-group">
                  <label for="nama">Teknisi</label>
                  <select class="form-control select2" name="idteknisi">
                    <?php
                    $query="SELECT * from tb_teknisi";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                      $no=0;
                      while ($data=mysqli_fetch_assoc($result)) {
                        ?>  
                        <option value="<?=$data['idteknisi']?>"><?=$data['nama'];?></option>
                      <?php } } ?>
                    </select>
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
                  class="btn btn-primary" value="Simpan">
                  <a href="?hal=servis" class="btn btn-default">
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