<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/dist/css/adminlte.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <style>
        .content-wrapper {
         background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );

        }
        .text-siapsir{
            margin-top: -30px;
            animation: nyala 2s ease infinite;
            font-family: arial;
            font-size: 15px;
        }
        @keyframes nyala{
            0%{
                text-shadow: #fff 0px 0px 0px ;
            }
            50%{
                text-shadow: #fff 0px 0px 10px ;
            }
            100%{
                text-shadow: #fff 0px 0px 0px ;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Fullscreen -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="https://www.instagram.com/prodbyzxnz/" class="brand-link">
                <img src="<?php echo base_url() ?>/assets/img/siapsir.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Sistem Aplikasi Kasir</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/adminlte') ?>/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="https://www.instagram.com/prodbyzxnz/" class="d-block"><?= session()->get('nama') ?></a>
                    </div>
                </div>
                <div class="user-panel mt-3 mb-4 d-flex">
                    <div class="info">
                        <p class="text-white">Your Role as : <?= session()->get('role') ?></p>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-header">Dashboard</li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Data Master</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Data Pelanggan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/produk') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Data Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/user') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Data User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Transaksi</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/transaksi') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Entri Transaksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/laporan') ?>" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Laporan Transaksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Action</li>
                        <li class="nav-item">
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <?php
        if (isset($page)) {
            echo $page;
        }
        ?>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer bg-dark">
            <div class="float-right d-none d-sm-block">
                <b class="text-siapsir">SIAPSIR.</b> Version 1.0
            </div>
            <strong>Copyright &copy; 2024 Fauzan Ardhi Wardhana </strong> All rights reserved.

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">  </aside>
    <!-- ./wrapper -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/adminlte') ?>/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/adminlte') ?>/plugins/flot/plugins/jquery.flot.pie.js"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/adminlte') ?>/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('document').ready(function() {
                <?php if (session()->getFlashdata('title')) { ?>
                    Toast.fire({
                        icon: 'success',
                        title: '<?= session()->getFlashdata('title') ?>',
                        text: '<?= session()->getFlashdata('text') ?>',
                    });
                <?php } ?>
            });
        });
    </script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- InputMask -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function() {
            $('#tglTransaksi').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#batasWaktu').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#tglBayar').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
        })
    </script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Modal Edit & Delete -->
    <script>

        $(function () {
            $("#tabel-transaksi").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#tabel-transaksi_wrapper .col-md-6:eq(0)');
        });

        $(document).ready(function() {
            // get Edit Pelanggan
            $('.btn-edit-pelanggan').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const alamat = $(this).data('alamat');
                const tlp = $(this).data('tlp');

                // Set data to Form Edit
                $('.id_pelanggan').val(id);
                $('.nama_pelanggan').val(nama);
                $('.alamat_pelanggan').val(alamat);
                $('.no_tlp').val(tlp).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Pelanggan
            $('.btn-delete-pelanggan').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_pelanggan').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

            // get Edit Produk
            $('.btn-edit-produk').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const harga = $(this).data('harga');
                const stok = $(this).data('stok');

                // Set data to Form Edit
                $('.id_produk').val(id);
                $('.nama_produk').val(nama);
                $('.harga').val(harga);
                $('.stok').val(stok).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Produk
            $('.btn-delete-produk').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_produk').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

            // get Edit Transaksi
            $('.btn-edit-transaksi').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const tgl = $(this).data('tgl');
                const idpel = $(this).data('idpel');
                const idprod = $(this).data('idprod');
                const jmlproduk = $(this).data('jmlproduk');

                // Set data to Form Edit
                $('.id_transaksi').val(id);
                $('.tgl_transaksi').val(tgl);
                $('.id_pelanggan').val(idpel);
                $('.id_produk').val(idprod);
                $('.jumlah_produk').val(jmlproduk).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Transaksi
            $('.btn-delete-transaksi').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_transaksi').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });

                        // get Edit USER
            $('.btn-edit-user').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const username = $(this).data('username');
                const role = $(this).data('role');
                const password = $(this).data('password');

                // Set data to Form Edit
                $('.id_user').val(id);
                $('.nama').val(nama);
                $('.username').val(username);
                $('.password').val(password);
                $('.role').val(role).trigger('change');

                // Call Modal Edit
                $('#updateData').modal('show');
            });

            // get Delete Transaksi
            $('.btn-delete-user').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');

                // Set data to Form Edit
                $('.id_user').val(id);

                // Call Modal Edit
                $('#deleteData').modal('show');
            });
        });


    </script>

</body>

</html>