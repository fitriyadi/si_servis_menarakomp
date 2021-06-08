<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Filter Presensi Servis</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="?hal=filter_servis_data" method="post">

            <div class="card-body">

                <div class="form-group row">
                  <label for="nama" class="col-sm-3">Periode Servis</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control" name="par1" required="">
                  </div>
                   <div class="col-sm-3">
                    <input type="date" class="form-control" name="par2" required="">
                  </div>
                </div>

              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <div class="col-sm-3 offset-3">
                  <input type="submit" name="proses" 
                  class="btn btn-primary" value="Lihat">
                  <a href="?hal=beranda" class="btn btn-default">
                    Batal
                  </a>
                </div>
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