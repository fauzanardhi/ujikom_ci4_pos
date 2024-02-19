<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width:
            100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-light"><?= $header; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class=" text-light" href="<?= base_url('petugas/dashboard') ?>">Homepage</a></li>
                        <li class="breadcrumb-item active  text-light"><?= $header; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box Update -->
        <div class="card">
            <div class="card-header">


                <!-- type code here for generate report -->

                <?php
                echo anchor('petugas/laporan/generatepdf', '<button style="background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );"  type="button" class="btn-sm btn-light text-light p-2">
                <i class="fa fa-print" aria-hidden="true"></i> <h7>Generate Laporan PDF.</h4>
            </button>') . '<p/>';

                $table = new \CodeIgniter\View\Table();
                $table->setHeading('Tanggal Transaksi', 'Nama Pelanggan', 'Nama Produk', 'Harga', 'Jumlah Produk', 'Total Harga');

                foreach ($transaksi as $item) :
                    $table->addRow($item->tgl_transaksi, $item->nama_pelanggan, $item->nama_produk, $item->harga,
                    $item->jumlah_produk, $item->total_harga);
                endforeach;

                echo $table->generate();
                 ?>
                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                 Total Data : <?= $transaksicount; ?>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>