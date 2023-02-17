<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SAS Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/Sbadmin2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/Sbadmin2/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Effect God -->
    <link href="<?= base_url('assets/Sbadmin2/'); ?>css/effectgod.css" rel="stylesheet">

    <!-- Input -->
    <link href="<?= base_url('assets/Sbadmin2/'); ?>css/input.css" rel="stylesheet">

</head>

<body class="">
    <div class="">

        <!-- Outer Row -->
        <div class=" row justify-content-center">

            <!-- Pembungkus -->
            <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
            <div class="col-lg-6" >

                <div class="card o-hidden border-0 my-5" style="box-shadow: 15px 15px 20px rgba(170, 170, 170); border-radius: 20px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- Gambar dikiri login -->
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->

                            <!-- Isinya -->
                            <!-- <div class="col-lg-6"> -->
                            <div class="col-lg" style="background-color: #9ED2E9;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <center>
                                        <a class="logo">
                                            <img src="<?= base_url('assets/Logo SAS1.png'); ?>" alt="Logo"  style=" width: 580px;">
                                        </a>
                                        </center>
                                    </div>
                                    <form class="user" method="post" action="<?php echo base_url()?>SAS/proses_login">
                                        <div class="form-group mt-5">
                                            <label>
                                                Username
                                            </label>
                                            <input type="text" class="form-control form-control-user" id="username" name="username" style="border-radius: 25px;">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label >
                                                Password
                                            </label>
                                            <input type="password" class="form-control form-control-user" id="password" name="password">
                                        </div>
                                        <button type="submit" class="btn px-5 mb-4 mt-3 float-right font-weight-bold fs-1" style="background-color: #ffffff;">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Effect God -->
        <!-- <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul> -->
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/Sbadmin2/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/Sbadmin2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/Sbadmin2/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/Sbadmin2/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>