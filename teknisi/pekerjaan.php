<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Pekerjaan</h1>
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
                <th>No Servis</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Masuk</th>
                <th>Teknisi</th>
                <th>Kerusakan</th>
                <th>Deskripsi</th>
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
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $kerusakan; ?></td>
                    <td><?php echo $keteranganbarang; ?></td>
                  </td>

                  <td width="15%">

                    <a href="?hal=pekerjaan_olah&id=<?=$idservis; ?>" 
                      class="btn btn-icon btn-primary" title="Progres Data"><i class="fa fa-plus"></i> </a>

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