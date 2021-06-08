<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Servis Selesai</h1>
      </div><!-- /.col -->
      <div class="col-sm-5">
      </div>
      <div class="col-sm-1">
      </div><!-- /.col -->
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
                <th>No Servis</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Masuk</th>
                <th>Daftar Sparepart</th>
                <th>Teknisi</th>
                <th>Kerusakan</th>
                <th>Biaya Servis</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query="SELECT * from tb_servis join tb_teknisi using(idteknisi) join tb_pelanggan using(idpelanggan)";

              $result=$mysqli->query($query);
              $num_result=$result->num_rows;
              if ($num_result > 0 ) { 
                $no=0;
                while ($data=mysqli_fetch_assoc($result)) {
                  extract($data);
                  ?>
                  <tr>
                    <td width="5%"><?php echo $no+=1; ?></td>
                    <td><?php echo $idservis; ?></td>
                    <td><?php echo $namapelanggan; ?></td>
                    <td><?php echo $tanggalmasuk; ?></td>
                    <td>
                      <?php
                      $query1="SELECT * from tb_sparepart join tb_barang_sparepart on idbarang=idsparepart where idservis='$idservis'";

                      $result1=$mysqli->query($query1);
                      $num_result1=$result->num_rows;
                      if ($num_result1 > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result1)) {
                          ?>
                            <?php echo $data['merk']." ".$data['tipe']." ".$data['nama'];?>
                            <?php echo "Harga ".number_format($data['harga'],0);?>
                          <?php }} ?>

                        </td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $kerusakan; ?></td>
                        <td><?php echo $biayaservis; ?></td>
                        <td><?php echo $total; ?></td>
                      </td>

                      <td width="15%">

                        <a class="btn btn-danger" title="Hapus Data" href="servis_proses.php?hapus=<?=$idservis;?>" 
                          onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>

                        </td>
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