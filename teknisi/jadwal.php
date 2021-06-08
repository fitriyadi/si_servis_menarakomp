<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Jadwal Reservasi Teknisi</h1>
      </div><!-- /.col -->
      <div class="col-sm-5">
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title primary">List Data</h3>

          <div class="card-tools">
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Reservasi</th>
                <th>Teknisi</th>
                <th>Nama Barang</th>
                <th>Kerusakan</th>
                <th>No HP</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $idteknisi=$_SESSION['teknisi'];
              $query="SELECT * from tb_panggilan join tb_teknisi using(idteknisi) join tb_pelanggan using(idpelanggan) where tb_teknisi.idteknisi='$idteknisi'";

              $result=$mysqli->query($query);
              $num_result=$result->num_rows;
              if ($num_result > 0 ) { 
                $no=0;
                while ($data=mysqli_fetch_assoc($result)) {
                  extract($data);
                  ?>
                  <tr>
                    <td width="5%"><?php echo $no+=1; ?></td>
                    <td><?php echo $namapelanggan; ?></td>
                    <td><?php echo $tanggal; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $namabarang; ?></td>
                    <td><?php echo $deskripsikerusakan; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $nohp; ?></td>
                  </tr>
                <?php }} ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      <!-- /.content -->