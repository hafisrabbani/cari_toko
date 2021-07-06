<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ilmi Shop - Forgot password</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon_honey.png') ?>" />
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/sweetalert.css'); ?>">
</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
            <div class="flash-data_error" data-flashdata="<?php echo $this->session->flashdata("error") ?>"></div>
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content" style="border-radius: 15px;">
                    <div class="row">
                    <div class="col-md-12">
                        <!-- <a class="btn btn-warning btn-outline pull-right"><i class="fa fa-arrow-left"> Kembali</i></a> -->
                    </div>
                    </div>
                    <center>
                        <h2 class="font-bold">Lupa Password</h2>

                        <p>
                            Silahkan masukkan email anda yang terdaftar untuk melakukan reset password
                        </p>
                    </center>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="<?php echo base_url('forgotpwd/send_reset') ?>" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                                </div>
                                <div class="row">
                                <!-- <div class="col-lg-12"> -->
                                    <center>    
                                    <button style="width: 178px; margin: 5px;" type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url('register') ?>';">Kembali login</button>
                                    <button style="width: 178px; margin: 5px;" type="submit" class="btn btn-success">Reset Password</button>
                                    </center>
                                <!-- </div> -->
                                </div>
                            </form>
                            <!-- <button class="first">Test</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <!-- <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div> -->
    </div>
<script src="<?= base_url('assets/js/jquery-2.1.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>
<script>
    $(document).ready(function(){
        const flashData = $('.flash-data').data('flashdata');
        // alert(flashData);
        if( flashData != "") {
            swal({
                title: '' + flashData,
                text: ':)',
                type: 'success'
            });
        } else{
        }
    });
</script>
<script>
    $(document).ready(function(){
        const flashData = $('.flash-data_error').data('flashdata');
        // alert(flashData);
        if( flashData != "") {
            swal({
                title: '' + flashData,
                text: ':(',
                type: 'error'
            });
        } else{

        }
    });
</script>
</body>

</html>
