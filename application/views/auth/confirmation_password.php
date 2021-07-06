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
                        <h2 class="font-bold">Konfirmasi Password</h2>

                        <p>
                            Silahkan masukkan password baru anda
                        </p>
                    </center>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="<?php echo base_url('forgotpwd/confirm_pwd') ?>" method="POST">
                                <input type="hidden" name="email" value="<?php echo $this->input->get('email')?>">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <input id="txtPassword" type="password" name="password" class="form-control pwd" required>
                                          <span class="input-group-btn">
                                            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                          </span>          
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <input id="txtConfirmPassword" type="password" class="form-control pwd1" required>
                                          <span class="input-group-btn">
                                            <button class="btn btn-default reveal1" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                          </span>          
                                        </div>
                                      </div>
                                <!-- <div class="form-group">
                                    <input id="txtPassword" type="password" name="password" class="form-control showpwd" required="" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    
                                    <input id="txtConfirmPassword" type="password" class="form-control showpwd" required="" placeholder="Confirm Password">
                                    <br>
                                    <input class="pull-right" type="checkbox" onclick="myFunction()"><p style="text-align: right;">Tampilkan Password </p>
                                </div> -->
                                <div class="row">
                                <!-- <div class="col-lg-12"> -->
                                    <center>    
                                    <button style="width: 178px; margin: 5px;" type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url('') ?>';">Home</button>
                                    <button id="btnSubmit" style="width: 178px; margin: 5px;" type="submit" class="btn btn-success">Submit</button>
                                    </center>
                                <!-- </div> -->
                                </div>
                            </form>
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
                text: 'Data berhasil diubah',
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
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                // alert("Passwords do not match.");
                swal({
                    title: 'Gagal',
                    text: 'Password tidak cocok',
                    type: 'error'
                });
                return false;
            }
            return true;
        });
    });
</script>
<!-- <script>
    function myFunction() {
      var x = document.getElementsByClassName("showpwd");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script> -->
<script>
    $(".reveal").on('click',function() {
        var $pwd = $(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
</script>
<script>
    $(".reveal1").on('click',function() {
        var $pwd = $(".pwd1");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
</script>
</body>

</html>
