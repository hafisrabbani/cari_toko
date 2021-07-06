<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/auth/style.css') ?>" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login & Sign Up</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon_honey.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/sweetalert.css'); ?>">
    <style>
      .clickme {
          background-color: #EEEEEE;
          padding: 4px 10px;
          text-decoration:none;
          font-weight:normal;
          border-radius:5px;
          cursor:pointer;
      }
      .warning {
          background-color:#FFA500;
          color: #FFFFFF;
      }

      .warning:hover {
          background-color:#EB9800;
          color: #FFFFFF;
      }
      #f44336!important;
    </style>
  </head>
  <body>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
    <div class="flash-data_error" data-flashdata="<?php echo $this->session->flashdata("error") ?>"></div>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo base_url('login/action') ?>" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <div>
              
            <!-- <a href="<?php echo base_url('') ?>" class="clickme warning" style="margin-right: 50px;"></i>Kembali</a> -->
            <a href="<?php echo base_url('forgotpwd') ?>">Lupa Password </a>
            </div>
            <div class="row">
              <input type="submit" value="Login" class="btn solid" />
              <input style="background: orange;" type="button" value="Home" class="btn solid" onclick="location.href='<?php echo base_url('') ?>';" />
              <!-- <a href="<?php echo base_url('') ?>" class="clickme warning" style="margin-right: 50px;"></i>Kembali</a> -->
            </div>
            <!-- <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> -->
          </form>
          <form action="<?php echo base_url('register/reg') ?>" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fa fa-id-card"></i>
              <input type="text" name="full_name" placeholder="Nama Lengkap" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" name="no_phone" placeholder="No Hp" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Daftar Member</h3>
            <p>
              Gabung jadi member sekarang, jika ingin menjual produk madumu
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="<?php echo base_url('assets/auth/img/honey.svg')?>" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah Punya Akun</h3>
            <p>
              Silahkan masuk untuk mulai menjual produkmu
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="<?php echo base_url('assets/auth/img/bee.svg')?>" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('assets/auth/app.js') ?>"></script>
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
