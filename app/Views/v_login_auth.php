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
        .text-siapsir{
            margin-top: -30px;
            animation: nyala 2s ease infinite;
            font-family: arial;
            font-size: 15px;
        }
        .text{

            transition: 1s;
            font-family: arial;
            font-size: 50px;
            animation: nyala 2s ease infinite;
        }

        .button-login{
            transition: 5s;
            border: #fff;
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

<body class="hold-transition login-page bg-dark">
    <div class="login-box ">
        <!-- /.login-logo -->
        <div class="card card-outline card-dark bg-dark">
            <div class="card-header text-center">
                <p class="text"><b>SIAPSIR.</b></p>
                <p class=" text-siapsir"><b>Sistem Aplikasi Kasir</b></p>
                <p class="login-box-msg">Sign in to start your session</p>
            </div>
            <div class="card-body">
                <?php	
					if(!empty(session()->getFlashdata('wrong')))
					{
				?>
					<div class="alert alert-danger text-center"> 
						<p><?= session()->getFlashdata('wrong')?></p>
					</div>
				<?php
					}
				?>
                
                <?php	if(!empty(session()->getFlashdata('great'))) { ?>
					<div class="alert alert-success text-center"> 
						<p><?= session()->getFlashdata('great')?></p>
					</div>
				<?php }?>
                <form action="<?php echo base_url('auth/login'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-3">
                        <button type="submit"  class="text-light btn btn-block btn-primary">Sign In</button>
                    </div>
                    
                </form>
                <p class="mb-0">
                    <a href="<?php echo base_url('auth/register'); ?>" class="text-light text-center">Register</a>
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
</body>

</html>