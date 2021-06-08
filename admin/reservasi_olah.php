<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_panggilan","idpanggilan='$kode'"));
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
            <h3 class="card-title">Info Data Reservasi Pelanggan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="reservasi_proses.php" method="post">

            <input type="hidden" name="idpanggilan" value="<?=$idpanggilan?>">
            <div class="card-body">

              <div class="form-group">
                <label for="nama">Tanggal</label>
                <input type="date" name="tanggal" class="form-control"  value="<?=@$tanggal;?>" placeholder="Inputkan Tanggal" required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Jam</label>
                <input type="time" name="jam"  value="<?=@$jam;?>" class="form-control" placeholder="Inputkan Jam" required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" name="namabarang" class="form-control"   value="<?=@$namabarang;?>" placeholder="Inputkan Nama Barang" required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Deskripsi Kerusakan</label>
                <textarea class="form-control" rows="3" name="deskripsi" placeholder="Inputkan Deskripsi Kerusakan" readonly=""><?=@$deskripsikerusakan?></textarea>
              </div>

              <div class="form-group">
                <label for="nama">Pilih Teknisi</label>
                <select class="form-control select2" name="idteknisi" required="">
                 <?php
                 $query="SELECT * from tb_teknisi";

                 $result=$mysqli->query($query);
                 $num_result=$result->num_rows;
                 if ($num_result > 0 ) { 
                  $no=0;
                  while ($data=mysqli_fetch_assoc($result)) {
                    extract($data);
                  ?>
                    <option value="<?=$idteknisi?>"><?=$nama?></option>
                  <?php 
                    }}
                  ?>
                  </select>
                </div>



              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
                class="btn btn-primary" value="Simpan">
                <a href="?hal=reservasi" class="btn btn-default">
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