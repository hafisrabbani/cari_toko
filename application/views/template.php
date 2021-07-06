<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->config->item('site_name'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/bee_icon.png') ?>" />
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/images/ico.png" /> -->
    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/morris.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/morris.js');?>"></script>
    <script src="<?php echo base_url('assets/js/raphael-min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/rickshaw/vendor/d3.v3.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/rickshaw/rickshaw.min.js');?>"></script>


    <!-- Datepicker -->
    <script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<!--     <link href="<?php echo base_url('assets/css/plugins/clockpicker/clockpicker.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/clockpicker/clockpicker.js') ?>"></script> -->

    <!-- Datatables -->
    <link href="<?php echo base_url('assets/js/morris.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.fixedColumns.min.js') ?>"></script>

    <!-- Checkbox -->
    <link href="<?php echo base_url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') ?>" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url('assets/css/plugins/select2/select2.min.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/select2/select2.min.js') ?>"></script>

    <!-- Icheck -->
    <link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js') ?>"></script>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- CK-Editor -->
    <script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <!-- Progress Wizard -->
    <link href="<?php echo base_url('assets/css/progress-wizard.min.css') ?>" rel="stylesheet">

    <!-- Steps -->
    <link href="<?php echo base_url('assets/css/plugins/steps/jquery.steps.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/staps/jquery.steps.min.js') ?>"></script>

    <!-- Switchery -->
    <link href="<?php echo base_url('assets/css/plugins/switchery/switchery.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/switchery/switchery.js') ?>"></script>

    <!-- Validate -->
    <script src="<?php echo base_url('assets/js/plugins/validate/jquery.validate.min.js') ?>"></script>

    <!-- Fancybox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
    <!-- Input Mask-->
    <!-- <script src="<?php echo base_url('assets/js/plugins/Inputmask-2.x/dist/jquery.inputmask.bundle.min.js') ?>"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
    <style>
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
      50% { opacity: 0; }
    }
    </style>
</head>
<body class="md-skin">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <center>
                            <span>
                                <img class="img-circle" alt="image" width="60" height="60" src="<?php echo base_url('assets/images/profile_img.jpg')?>"/>
                            </span>
                         </center> 
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <center>
                                        <strong class="font-bold"><?php echo ucwords($this->session->userdata("full_name")); ?></strong>
                                        <!-- <b class="caret"></b> -->
                                    </center>
                                </span>
                                    <center>
<!--                                         <?php
                                            $cek_toko = $this->db->get_where("tbl_olshop", array('id_user' => $this->session->userdata('id_user')))->result();
                                        ?> -->
                                        <!-- <?php if($cek_toko || $this->session->userdata('nama_role') == 'SUPERADMIN'){ ?> -->
                                            <span class="text-muted text-xs block"><?php echo ucwords(strtolower($this->session->userdata("nama_role"))); ?> </span>
                                        <!-- <?php } else { ?> -->
                                            <!-- <span class="text-muted text-xs block"><?php echo ucwords(strtolower($this->session->userdata("nama_role"))); ?> <span class="label label-danger pull-right blink_me">Tambahkan Toko</span></span> -->
                                            
                                        <!-- <?php } ?>                                         -->
                                    </center>
                            </span>
                        </a>
                            <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profil</a></li>
                                <?php if($this->session->userdata('nama_role') != 'SUPERADMIN'){ ?>
                                <?php if($cek_toko){ ?>
                                    <li><a href="<?php echo base_url('olshop/shop_profile') ?>">Olshop</a></li>
                                <?php }else{ ?>
                                <li><a href="<?php echo base_url('olshop/shop_profile') ?>">Olshop <i class="fa fa-warning" style="color:red" data-toggle="tooltip" data-placement="right" title="Tambahkan Toko"></i></a></li>
                                <?php } ?>
                                <?php } ?>
                            </ul> -->
                        
                    </div>
                    <div class="logo-element">
                        ECM
                    </div>
                </li>
                <?php $menu = $this->uri->segment('1'); $submenu = $this->uri->segment('2');?>
                <li <?php if($menu == "profile"){ echo "class='active'";} ?>>
                    <a href="<?php echo base_url("profile") ?>"><i class="fa fa-user"></i> <span class="nav-label">Profi User</span></a>
                </li>
                <?php if($this->session->userdata('nama_role') == 'SUPERADMIN') { ?>
                    <li <?php if($menu == "dashboard"){ echo "class='active'";} ?>>
                    <a href="<?php echo base_url("dashboard") ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                    <li <?php if($menu == "category"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("category") ?>"><i class="fa fa-cubes"></i> <span class="nav-label">Kategori</span></a>
                    </li>
                    <li <?php if($menu == "setting"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("setting") ?>"><i class="fa fa-cog"></i> <span class="nav-label">Setting Harga</span></a>
                    </li>
                    <li <?php if($menu == "slideshow"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("slideshow") ?>"><i class="fa fa-file-image-o"></i> <span class="nav-label">Slideshow</span></a>
                    </li>
                    <li <?php if($menu == "olshop"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("olshop") ?>"><i class="fa fa-home"></i> <span class="nav-label">Toko</span></a>
                    </li>
                    <li <?php if($menu == "user"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("user") ?>"><i class="fa fa-cogs"></i> <span class="nav-label">User Management</span></a>
                    </li>

                <?php } ?>
                <?php if($cek_toko || $this->session->userdata('nama_role') == 'SUPERADMIN'){ ?>
                    <li <?php if($menu == "product"){ echo "class='active'";} ?>><a href="<?php echo base_url("product"); ?>"><i class="fa fa-cube"></i> <span class="nav-label">Produk</span></a></li>
                <?php } else { ?>
                    <li <?php if($menu == "product"){ echo "class='active'";} ?>><a href="<?php echo base_url("product"); ?>"><i class="fa fa-cube"></i> <span class="nav-label">Produk</span> <i class="fa fa-warning blink_me" style="color:red" data-toggle="tooltip" data-placement="right" title="Anda belum memiliki produk"></i></a></li>
                <?php } ?>

                <?php if($this->session->userdata('nama_role') != 'SUPERADMIN'){ ?>
                    <!-- <li <?php if($menu == "profile"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("profile/shop_profile") ?>"><i class="fa fa-user"></i> <span class="nav-label">Profil User</span></a>
                    </li> -->
                    <li <?php if($menu == "olshop"){ echo "class='active'";} ?>>
                        <a href="<?php echo base_url("olshop/shop_profile") ?>"><i class="fa fa-home"></i> <span class="nav-label">Toko</span></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background: linear-gradient(to right, #ffeaad 0%, #eea236 100%);color:black;">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-warning " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo base_url("login/doLogout"); ?>">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        </div>
            <!-- content in here -->
            <?= $contents; ?>
            <!-- /content in here -->

            <div class="footer">
                <div class="pull-right">
                    <small><a href="http://www.emcorpstudio.com/" target="_blank">Emcorp Studio</a> | Ilmi-Ecommerce &copy; <?php echo '2020'; ?></small>
                </div>
            </div>

        </div>
    </div>
</body>
</html>