<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-light">
                    <h1><?= $header; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-light" href="<?= base_url('petugas/dashboard') ?>">Homepage</a></li>
                        <li class="breadcrumb-item active text-light"><?= $header; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

                <div class="mt-1">
                    <button style="background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );" type="button" class="btn-light text-light btn-sm" data-toggle="modal" data-target="#inputData">
                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-2" style="height: 300px;">
                <table id="tabel-transaksi" class="table table-bordered table-striped dataTable dtr-inline collapsed">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah Produk</th>
                            <th>Total Harga</th>
                            <th class="bg-secondary">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach ($transaksi as $item) :
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->tgl_transaksi; ?></td>
                                <td><?= $item->nama_pelanggan; ?></td>
                                <td><?= $item->nama_produk; ?></td>
                                <td>Rp. <?= $item->harga; ?></td>
                                <td><?= $item->jumlah_produk; ?></td>
                                <td>Rp <?= $item->total_harga; ?></td>
                                <td class="text-center">
                                    <button class="btn-warning btn-edit-transaksi" 
                                        data-id="<?= $item->id_transaksi; ?>" 
                                        data-tgl="<?= $item->tgl_transaksi; ?>" 
                                        data-idpel="<?= $item->id_pelanggan; ?>" 
                                        data-idprod="<?= $item->id_produk; ?>" 
                                        data-jmlproduk="<?= $item->jumlah_produk; ?>">
                                        <i class="nav-icon fas fa-pen" aria-hidden="true"></i>
                                    </button>

                                    <button class="btn-danger btn-delete-transaksi" 
                                        data-id="<?= $item->id_transaksi; ?>">
                                        <i class="nav-icon fas fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                 Total Data : <?= $transaksicount; ?>
            </div>
            <!-- /.card-footer-->

        <!-- /.card -->

        <!-- Modal Create Data -->
        <form class="form-horizontal" action="<?php echo base_url('petugas/transaksi/save'); ?>" method="post">
            <div class="modal fade" id="inputData">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $inputtitle; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Card Body Input -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaPengguna" class="col-sm-4 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namaPengguna" name="id_user" value="<?= session()->get('nama'); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tglTransaksi" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="tglTransaksi" placeholder="Tanggal Transaksi" name="tgl_transaksi" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="namaPelanggan" name="id_pelanggan" required>
                                            <option value="">- Pilih Nama Pelanggan -</option>
                                            <?php foreach ($pelanggan as $item) : ?>
                                                <option value="<?= $item->id_pelanggan; ?>"><?= $item->nama_pelanggan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaProduk" class="col-sm-4 col-form-label">Nama Produk</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="namaProduk" name="id_produk" required>
                                            <option value="">- Pilih Nama Produk -</option>
                                            <?php foreach ($produk as $item) : ?>
                                                <option value="<?= $item->id_produk; ?>"><?= $item->nama_produk . " - Rp " . $item->harga; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlahProduk" class="col-sm-4 col-form-label">Jumlah Produk</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="jumlahProduk" placeholder="Jumlah Produk" name="jumlah_produk" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn text-light" style="background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <!-- /.modal -->

        <!-- Modal Update Data -->
        <form class="form-horizontal" action="<?php echo base_url('petugas/transaksi/update'); ?>" method="post">
            <div class="modal fade" id="updateData">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $updatetitle; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Card Body Input -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tglTransaksi" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control tgl_transaksi" id="tglTransaksi" placeholder="Tanggal Transaksi" name="tgl_transaksi" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control id_pelanggan" id="namaPelanggan" name="id_pelanggan" required>
                                            <option value="">- Pilih Nama Pelanggan -</option>
                                            <?php foreach ($pelanggan as $item) : ?>
                                                <option value="<?= $item->id_pelanggan; ?>"><?= $item->nama_pelanggan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaProduk" class="col-sm-4 col-form-label">Nama Produk</label>
                                    <div class="col-sm-8">
                                        <select class="form-control id_produk" id="namaProduk" name="id_produk" required>
                                            <option value="">- Pilih Nama Produk -</option>
                                            <?php foreach ($produk as $item) : ?>
                                                <option value="<?= $item->id_produk; ?>"><?= $item->nama_produk . " - Rp " . $item->harga; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlahProduk" class="col-sm-4 col-form-label">Jumlah Produk</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control jumlah_produk" id="jumlahProduk" placeholder="Jumlah Produk" name="jumlah_produk" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_transaksi" class="id_transaksi">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn text-light" style="background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );">Update</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <!-- /.modal -->

        <!-- Modal Delete Data -->
        <form class="form-horizontal" action="<?php echo base_url('petugas/transaksi/delete'); ?>" method="post">
            <div class="modal fade" id="deleteData">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= $deletetitle; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Card Body Verification -->
                            <div class="card-body">
                                <h6>Are you sure want to delete this data?😡</h6>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id_transaksi" class="id_transaksi">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <!-- /.modal -->

    </section>
    <!-- /.content -->
</div>