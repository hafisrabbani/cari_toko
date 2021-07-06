<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login Page <?php echo $this->config->item('site_name'); ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon_honey.png') ?>" />

  <!-- Google Fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/icon-line-pro/style.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/icon-hs/style.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/animate.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/dzsparallaxer/dzsparallaxer.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/dzsparallaxer/dzsscroller/scroller.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/dzsparallaxer/advancedscroller/plugin.css') ?>" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../../assets/vendor/hs-megamenu/src/hs.megamenu.css"> -->
  <link href="<?php echo base_url('assets/vendor/hamburgers/hamburgers.min.css') ?>" rel="stylesheet">

  <!-- CSS Unify -->
  <link href="<?php echo base_url('assets/vendor/css/unify-core.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/css/unify-components.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/css/unify-globals.css') ?>" rel="stylesheet">

  <!-- CSS Customization -->
  <link href="<?php echo base_url('assets/vendor/css/custom.css') ?>" rel="stylesheet">
</head>
<style>
  body {
    overflow: hidden;
  }
</style>
<body>
  <main>


    <!-- Login -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options="{direction: 'reverse', settings_mode_oneelement_max_offset: '150'}">
      <!-- Parallax Image -->
      <div class="divimage dzsparallaxer--target w-100 u-bg-overlay g-bg-size-cover g-bg-bluegray-opacity-0_3--after" style="height: 140%; background-image: url(assets/images/cover.png); filter: blur(8px); -webkit-filter: blur(8px);"></div>
      <!-- End Parallax Image -->

      <div class="container g-pt-100 g-pb-200">
        <div class="row justify-content-between">
          <div class="col-md-6 col-lg-5 flex-md-unordered align-self-center g-mb-80">
            <div class="g-bg-white rounded g-pa-50">
              <header class="text-center mb-4">
                <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
              </header>
              <?php if($this->session->flashdata("error")){ ?>
            <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

              <?php
              echo $this->session->flashdata("error");
              unset($_SESSION["error"]);
              ?>
            </div>
          <?php } ?>
              <!-- Form -->
              <form class="g-py-15" action="<?php echo base_url("login/action") ?>" method="POST">
                <div class="mb-4">
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="username" type="email" placeholder="xxxxxx@email.com" value="admin@gmail.com">
                </div>

                <div class="g-mb-30">
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password" type="Password" placeholder="Password" value="admin">
                </div>

                <div class="text-center mb-5">
                  <button class="btn btn-block u-btn-primary rounded g-py-13" type="submit">Login</button>
                </div>

                <div class="d-flex justify-content-center text-center g-mb-30">
                  <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                  <?php
                    date_default_timezone_set("Asia/Jakarta");
                    echo $this->session->userdata("biru_login");
                    $hour = date('H');
                    if((int)($hour) >= 0){
                      $greeting = "Selamat Petang!";
                    }
                    if((int)($hour) >= 6){
                      $greeting = "Selamat Pagi!";
                    } 
                    if((int)($hour) >= 12){
                      $greeting = "Selamat Siang!";
                    }
                    if((int)($hour) >= 17){
                      $greeting = "Selamat Sore!";
                    }
                    if((int)($hour) >= 22){
                      $greeting = "Selamat Malam!";
                    }
                  ?>
                  <span class="align-self-center g-color-gray-dark-v5 mx-4"style="text-align:center;"><h3>
                    <?php echo $greeting; ?></h3></span>
                  <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                </div>
              </form>
              <!-- End Form -->

              <footer class="text-center">
                
              </footer>
            </div>
          </div>

          <div class="col-md-6 flex-md-first align-self-center g-mb-80">
            <div class="mb-5">
              <h1 class="h3 g-color-white g-font-weight-600 mb-3"><strong>Ilmi-Honey</strong><br>Quality And Trusted Honey</h1>
              <p class="g-color-white-opacity-0_8 g-font-size-12 text-uppercase">Established in 2000, trusted by renowned local and foreign companies for supporting multiple engineering projects</p>
            </div>

            <div class="row">
              <div class="col-md-11 col-lg-9">
                <!-- Icon Blocks -->
                <div class="media mb-4">
                  <div class="d-flex mr-4">
                    <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                      <i class="icon-finance-168 u-line-icon-pro"></i>
                    </span>
                  </div>
                  <div class="media-body align-self-center">
                    <p class="g-color-white mb-0">Reliable contracts, multifanctionality &amp; best usage of Unify template</p>
                  </div>
                </div>
                <!-- End Icon Blocks -->

                <!-- Icon Blocks -->
                <div class="media mb-5">
                  <div class="d-flex mr-4">
                    <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                      <i class="icon-finance-193 u-line-icon-pro"></i>
                    </span>
                  </div>
                  <div class="media-body align-self-center">
                    <p class="g-color-white mb-0">Secure &amp; integrated options to create individual &amp; business websites</p>
                  </div>
                </div>
                <!-- End Icon Blocks -->

                <!-- Testimonials -->
                <blockquote class="u-blockquote-v1 g-color-main rounded g-pl-60 g-pr-30 g-py-25 g-mb-40">Become a company of science, technology and management based on excellence.</blockquote>
                <div class="media">
                  <img class="d-flex align-self-center rounded-circle g-width-40 g-height-40 mr-3" src="assets/images/bee_icon.jpg" alt="Image Description">
                  <div class="media-body align-self-center">
                    <h4 class="h6 g-color-primary g-font-weight-600 g-mb-0">Ilmi-Commerce</h4>
                    <em class="g-color-white g-font-style-normal g-font-size-12">Honey Specialistr</em>
                  </div>
                </div>
                <!-- End Testimonials -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->

    <!-- Copyright Footer -->
    <!-- <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
            <div class="d-lg-flex">
              <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2020 &copy; All Rights Reserved.</small>
            </div>
          </div>
        </div>
      </div>
    </footer> -->
    <!-- End Copyright Footer -->
    <a class="js-go-to u-go-to-v1" href="#" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-migrate/jquery-migrate.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/popper.js/popper.min.js') ?>"></script>

  <script src="<?= base_url('assets/vendor/bootstrap/bootstrap.min.js') ?>"></script>


  <!-- JS Implementing Plugins -->
  <!-- <script src="../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script> -->
  <script src="<?= base_url('assets/vendor/dzsparallaxer/dzsparallaxer.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/dzsparallaxer/dzsscroller/scroller.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/dzsparallaxer/advancedscroller/plugin.js') ?>"></script>


  <!-- JS Unify -->
  <script src="<?= base_url('assets/vendor/js/hs.core.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js/components/hs.header.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js/helpers/hs.hamburgers.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js/components/hs.tabs.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/js/components/hs.go-to.js') ?>"></script>

  <!-- JS Customization -->
  <script src="<?= base_url('assets/vendor/js/custom.js') ?>"></script>

  <!-- JS Plugins Init. -->

   <!-- End Scripts -->
  <!-- End Style Switcher -->

</body>

</html>
