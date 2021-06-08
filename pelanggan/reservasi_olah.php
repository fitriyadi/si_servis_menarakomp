<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Olah Data Reservasi Servis</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="reservasi_proses.php" method="post">

            <div class="card-body">

              <div class="form-group">
                <label for="nama">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="Inputkan Tanggal" required="">
              </div>

              <div class="form-group">
                <label for="nama">Jam</label>
                <input type="time" name="jam" class="form-control" placeholder="Inputkan Jam" required="">
              </div>

              <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" name="namabarang" class="form-control"  placeholder="Inputkan Nama Barang" required="">
              </div>

              <div class="form-group">
                <label for="nama">Deskripsi Kerusakan</label>
                <textarea class="form-control" rows="3" name="deskripsi" placeholder="Inputkan Deskripsi Kerusakan"></textarea>
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