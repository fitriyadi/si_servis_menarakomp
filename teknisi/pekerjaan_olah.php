<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_servis join tb_pelanggan using(idpelanggan)","idservis='$kode'"));
}
?>

<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Informasi Servis</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="pekerjaan_proses.php" method="post">

            <div class="card-body">

             <input type="hidden" name="idservis" value="<?=$kode?>">


             <div class="form-group row">
              <label for="nama" class="col-sm-3">No Servis / Tanggal Masuk</label>
              <input type="text" name="username" class="form-control col-sm-4 mr-2" value="<?=$idservis?>" readonly>
              <input type="text" name="username" class="form-control col-sm-4 mr-2" value="<?=tgl_indo($tanggalmasuk)?>" readonly>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Pelanggan / Alamat</label>
              <input type="text" name="username" class="form-control col-sm-4 mr-2" value="<?=$namapelanggan?>" readonly>
              <input type="text" name="username" class="form-control col-sm-4 mr-2" value="<?=$alamat?>" readonly>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Kerusakan</label>
              <input type="text" name="username" class="form-control col-sm-8 mr-2" value="<?=$kerusakan?>" readonly>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Keterangan Barang</label>
              <input type="text" name="username" class="form-control col-sm-8 mr-2" value="<?=$keteranganbarang?>" readonly>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Biaya Servis</label>
              <input type="number" name="biaya" class="form-control col-sm-4 mr-2" value="<?=$keteranganbarang?>">

              <input type="submit" name="selesai" class="btn btn-primary" value="Selesai">
              <a href="?hal=pekerjaan_baru" class="btn btn-secondary ml-2">Kembali</a>
              <br>

            </div>
            <div class="form-group row">
             <p  class='offset-3'>Inputkan biaya servis ketika servis selesai dikerjakan</p>
           </div>

         </div>

         <!-- /.card-body -->
       </form>
     </div>
     <!-- /.card -->
   </div>
   <!--/.col (left) -->
 </div>
 <!-- /.row -->
</div><!-- /.container-fluid -->
</section>


<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Barang Sparepart</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="pekerjaan_proses.php" method="post">

            <input type="hidden" name="idservis" value="<?=$kode?>">

            <div class="card-body">
              <div class="form-group row">
                <label for="nama" class="col-sm-3">Sparepart</label>
                <select class="form-control select2 col-sm-9" name="idsparepart" required="">
                 <?php
                 $query="SELECT * from tb_sparepart";

                 $result=$mysqli->query($query);
                 $num_result=$result->num_rows;
                 if ($num_result > 0 ) { 
                  $no=0;
                  while ($data=mysqli_fetch_assoc($result)) {
                    extract($data);
                    ?>
                    <option value="<?=$idsparepart?>"><?=$merk." ".$tipe." ".$nama?></option>
                    <?php 
                  }}
                  ?>
                </select>
              </div>

              <div class="form-group row">
                <input type="submit" name="sparepart" class="btn btn-primary offset-3" value="Tambah">
              </div>

              <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Sparepart</th>
                    <th>Harga</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query="SELECT * from tb_sparepart join tb_barang_sparepart on idbarang=idsparepart where idservis='$kode'";

                  $result=$mysqli->query($query);
                  $num_result=$result->num_rows;
                  if ($num_result > 0 ) { 
                    $no=0;
                    $total=0;
                    while ($data=mysqli_fetch_assoc($result)) {
                      extract($data);
                      ?>
                      <tr>
                        <td width="5%"><?php echo $no+=1; ?></td>
                        <td><?php echo $merk." ".$tipe." ".$nama; ?></td>
                        <td><?php echo number_format($harga,0);$total+=$harga; ?></td>
                        <td>
                          <a class="btn btn-danger" title="Hapus Data" href="pekerjaan_proses.php?hapussparepart=<?=$id;?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php }} ?>
                    </table>
                  </div>

                  <!-- /.card-body -->
                </form>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-md-6">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Progress Pekerjaan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="pekerjaan_proses.php" method="post">

                  <div class="card-body">

                   <input type="hidden" name="idservis" value="<?=$kode?>">

                   <div class="form-group row">
                    <label for="nama" class="col-sm-3">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control col-sm-8 mr-2"  placeholder="Input Pekerjaan" >
                  </div>

                  <div class="form-group row">
                    <label for="nama" class="col-sm-3">Presentase</label>
                    <input type="number" max="100" name="presentase" class="form-control col-sm-8 mr-2" placeholder="Input Presentase">
                  </div>

                  <div class="form-group row">
                    <input type="submit" name="ubah" class="btn btn-primary offset-3" value="Tambah">
                  </div>

                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pekerjaan</th>
                        <th>Progress</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query="SELECT * from tb_pengerjaan where idservis='$kode'";

                      $result=$mysqli->query($query);
                      $num_result=$result->num_rows;
                      if ($num_result > 0 ) { 
                        $no=0;
                        $total=0;
                        while ($data=mysqli_fetch_assoc($result)) {
                          extract($data);
                          ?>
                          <tr>
                            <td width="5%"><?php echo $no+=1; ?></td>
                            <td><?php echo $tanggal; ?></td>
                            <td><?php echo $pekerjaan; ?></td>
                            <td><?php echo $presentase; ?></td>
                            <td>
                              <a class="btn btn-danger" title="Hapus Data" href="pekerjaan_proses.php?hapuspekerjaan=<?=$id;?>" 
                                onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                          <?php }} ?>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (left) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>