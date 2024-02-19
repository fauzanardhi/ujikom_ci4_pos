<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SIAPSIR - Sistem Aplikasi Kasir</title>
    <style>
        body {
            background: linear-gradient(25deg, rgba(57, 143, 255, 1) 0%, rgba(130, 184, 255, 1 ) 100% );
        }
        .text{
            transition: 1s;
            font-family: arial;
            font-size: 50px;
            animation: nyala 2s ease infinite;
        }
        .text-siapsir{
            margin-top: -30px;
            animation: nyala 2s ease infinite;
            font-family: arial;
            font-size: 15px;
        }
        .text:hover{
            text-shadow: #fff 0px 0px 0px ;
        }
        .button-login{
            background: rgba(57, 143, 255, 1);
            transition: 5s;
        }
        .button-login:hover{
            background: rgba(57, 143, 255, 1);
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

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-dark bg-dark">
            <div class="card-header text-center">
                <p class="text"><b>SIAPSIR.</b></p>
                <p class="text-siapsir">Sistem Aplikasi Kasir</p>
                <p class="login-box-msg">Sign in to start your session</p>
            </div>
            <div class="card-body">


                <form action="<?php echo base_url('auth/save'); ?>" method="post">
                <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="role" value="Petugas">
                    <div class="mt-2 mb-3">
                        <button type="submit" class="text-light btn btn-primary btn-block">Register</button>
                    </div>
                    
                </form>
                <p class="mb-0">
                    <a href="<?php echo base_url('auth'); ?>" class="text-center text-light">Sudah punya akun? Login disini</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/adminlte') ?>/dist/js/adminlte.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?php echo base_url('assets/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>


</body>

</html>