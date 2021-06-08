<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark" align="center">Laporan Servis</h1>
        <p align="center" class="mb-0">Periode : 
          <p align="center"><?=tgl_indo($_POST['par1']);?> S/d <?=tgl_indo($_POST['par2'])?></p>
        </div><!-- /.col -->
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

  <!-- /.content-header -->

  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>No Servis</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Masuk</th>
                <th>Teknisi</th>
                <th>Biaya</th>
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
                    <td><?php echo tgl_indo($tanggalmasuk); ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo number_format($total,0); ?></td>

                  </tr>
                <?php }} ?>
              </table>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

