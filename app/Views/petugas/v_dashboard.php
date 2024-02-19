<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6  text-light">
                    <h1><?= $header; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-light" href="<?= base_url('petugas/dashboard') ?>">Homepage</a></li>
                        <li class="breadcrumb-item active  text-light"><?= $header; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <!-- /.info-box -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 bg-dark">
                <span style="background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );"class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                  <h3 class="info-box-number"><?= $transaksicount; ?></h3>
                  <span class="info-box-text pb-2">Data Transaksi</span>
                  <a href="<?= base_url('petugas/transaksi') ?>" class="info-box-footer btn-outline-light p-1 rounded text-center btn">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              
              </div>
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>