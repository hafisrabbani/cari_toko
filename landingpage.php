<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cari Toko</title>
    <link href="<?php echo base_url('assets/css/plugins/toastr/toastr.min.css') ?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon_honey.png') ?>" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/slick/slick.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/slick/slick-theme.css') ?>" rel="stylesheet">

    <!-- Plugins -->
    <link href="<?php echo base_url('assets/css/plugins/select2/select2.min.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">

    <style>
        .slideshow {
            /*background-image: url("assets/img/landing/background car.jpg");*/
            background-repeat: no-repeat;
            background-size: 1900px 700px;
            /*background-position: center;*/
        }
    </style>
    <style>
        .slick_demo_2 .ibox-content {
            margin: 0 10px;
        }
        .mytext {
            width: 400px;
        }
        #text2 {
          color: orange;
        }
        input[type="text"]{
        font-size:14px;
        }
        select[name="city"]{
        width: 200px;
        }
        .icon {
          padding: 10px;
          background: #f8ac59;
          color: white;
          min-width: 50px;
          text-align: center;
        }
        .input-container {
          display: flex;
          width: 100%;
          margin-bottom: 15px;
        }
        .containerctg {
          position: relative;
          text-align: center;
          color: white;
        }
        /*.centeredctg {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: #f8ac59;
          }*/
      .containerctg .contentctr {
          position: absolute;
          bottom: 0;
          background: rgb(0, 0, 0); /* Fallback color */
          background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
          color: #f8ac59;
          width: 100%;
          font-size: 15px;
          padding: 50px;
      }
      .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: #eee;
            border-color: #ffffff;
        }
      </style>
      <style type="text/css">
        <?php $i=0; foreach($slide as $sld){ ?>
            <?php if($i == 0){ ?>
                .landing-page .header-back.madu<?php echo $slide[0]->id_slide; ?> {
                  background: url(<?php echo base_url('file/slide/'.$slide[0]->slide_image) ?>) 50% 0 no-repeat;
                  display: inline-block;
                  /*background-size:1090px 320px;*/
                  background-position:center;
                    /*background-size: 1208px 470px;*/
              }
          <?php } else { ?>
            .landing-page .header-back.madu<?php echo $sld->id_slide; ?> {
              background: url(<?php echo base_url('file/slide/'.$sld->slide_image) ?>) 50% 0 no-repeat;
              display: inline-block;
              /*background-size:1208px 470px;*/
              background-position:center;
              /*background-size: 1208px 470px;*/
              
          }
      <?php } ?>
      <?php $i++; } ?>
    </style>
    <style>
        .select2-container .select2-selection--single{
            height:34px !important;
        }
        .select2-container--default .select2-selection--single{
           border: 1px solid #ccc !important; 
           border-radius: 0px !important;
       }
    </style>
</head>
<body class="landing-page">
    <div class="navbar-wrapper">
        <nav style="background: white; padding-bottom: 10px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button style="margin-top: 25px;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <!-- <span class="text-danger"><i class="fa fa-shopping-cart"></i></span> -->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo base_url('') ?>">
                        <img style="margin-top: 8px;" width="70px" height="70px" src="<?php echo base_url('./assets/images/bee_logo.png') ?>">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul style="margin-top: 28px;" class="nav navbar-nav">
                        <li>
                            <form action="<?php echo base_url('')?>" action="GET">
                                <div class="form-group input-container">
                                    <input type="text" value="<?php if(isset($_GET['item'])){ echo $_GET['item'];} else {echo '';} ?>" placeholder="Cari barang..." class="form-control mytext" name="item" id="text2">
                                    <input value="<?php if(isset($_GET['category'])){ echo $_GET['category'];} else {echo '';} ?>" type="hidden" name="category">
                                    <!-- <input type="hidden" name="city"> -->
                                    <!-- <input type="hidden" name="shop"> -->
                                    <select name="city" class="form-control select2">
                                        <option value="">Pilih Kota</option>
                                        <?php
                                            foreach($city as $p){
                                                $selected = "";
                                                if($_GET['city'] == $p->city_id){
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="'.$p->city_id.'" '.$selected.'>'.$p->city_name.'</option>';  
                                            }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-warning" style="padding: 0px;"><i class="fa fa-search icon"></i></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="detail_cart">
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="ibox-content col-lg-10 col-lg-offset-1">
        <div id="inSlider" class="carousel carousel-fade" data-ride="carousel" style="margin-top: 75px; height: 320px;">
            <ol class="carousel-indicators" style="padding-right: 0px;">
                <?php $i=0; foreach($slide as $isl){ ?>
                    <?php if($i == 0){ ?>
                        <li data-target="#inSlider" data-slide-to="<?php echo $i ?>" class="active"></li>
                    <?php } else { ?>
                        <li data-target="#inSlider" data-slide-to="<?php echo $i ?>"></li>
                    <?php } ?>
                    <?php $i++; } ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php $i=0; foreach($slide as $sl){ ?>
                        <?php if($i == 0){ ?>
                            <div class="item active" style="border-radius: 10px; height: 320px;">
                                <!-- Set background for slide in css -->
                                <div style="border-radius: 10px; height: 320px;" class="header-back madu<?php echo $slide[0]->id_slide; ?>"></div>
                            </div>
                        <?php } else { ?>
                            <div class="item" style="border-radius: 10px; height: 320px;">
                                <!-- Set background for slide in css -->
                                <div style="border-radius: 10px; height: 320px;" class="header-back madu<?php echo $sl->id_slide; ?>"></div>
                            </div>

                        <?php } ?>
                        <?php $i++; } ?>
                    </div>
                    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <h4 class="text-center m">
                                <center><h2><b>KATEGORI</b></h2></center>
                            </h4>
                            <div class="slick_demo_2">
                                <?php foreach($category as $p){ ?>
                                    <div style="margin-left: 15px;">
                                        <a href="<?php echo base_url('?item='.(isset($_GET['item'])? $_GET['item']:'').'&category='.$p->id_category.'&city='.(isset($_GET['city'])? $_GET['city']:'')) ?>">
                                            <div class="containerctg">
                                                <img height="100px" src="<?php echo base_url('./file/product_category/'.$p->category_image) ?>">
                                                <div class="contentctr">
                                                    <strong><p style="margin-bottom: -10px;margin-left: -12px;"><?php echo $p->category_name ?></p></strong>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <center><h2><b>VIDEO TERBARU</b></h2></center>

                            <div class="slick_video">
                            <?php foreach($video as $p){ ?>
                                <div style="margin-left: 15px;">
                                    <a href="<?php echo base_url('?item='.(isset($_GET['item'])? $_GET['item']:'').'&video='.$p->id_video.'&city='.(isset($_GET['city'])? $_GET['city']:'')) ?>">
                                        <div>
                                            <img height="120px" src="<?php echo base_url('./file/video/'.$p->video_image) ?>">
                                            <div class="contentctr" style="margin-left: 15px;">
                                                <strong><p style="margin-bottom: -10px;margin-left: -12px; max-width: 180px;white-space: normal;text-align: center;"><?php echo $p->video_name.'<br><center><h6 style="margin-left: -12px;color:orange;">'.$p->video_owner.'</h6></center>' ?></p></strong>
                                            </div>
                                            <br>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <center><h2><b>DONASI</b></h2></center>

                        <div class="slick_video">
                            <?php foreach($donasi as $p){ ?>
                                <div style="margin-left: 15px;">
                                    <a href="<?php echo base_url('?item='.(isset($_GET['item'])? $_GET['item']:'').'&category='.$p->id_donasi.'&city='.(isset($_GET['city'])? $_GET['city']:'')) ?>">
                                        <div>
                                            <img height="150px" src="<?php echo base_url('./file/donasi/'.$p->donasi_image) ?>">
                                            <div class="contentctr" style="margin-left: 15px;">
                                                <strong><p style="margin-bottom: -10px;margin-left: -12px; max-width: 230px;white-space: normal;text-align: center;"><?php echo $p->donasi_name.'<br><center><h6 style="margin-left: -12px;color:orange;">'.$p->donasi_owner.'</h6></center>' ?></p></strong>
                                            </div>
                                            <br>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <?php
            function searchForid($id, $listP){
                foreach($listP as $key => $val){
                    if($val['id'] === $id){
                        return $key;
                    }
                }
                return NULL;
            }
            $search_item = isset($_GET['item']) == 1 ? $_GET['item'] : "";
            $search_category = isset($_GET['category']) == 1 ? $_GET['category'] : "";
            $search_city = isset($_GET['city']) == 1 ? $_GET['city'] : "";
             ?>
             <?php if ($search_item == "" && $search_category == "" && $search_city=="") { ?>
                <div class="ibox-content col-lg-10 col-lg-offset-1">
                    <?php foreach($productctg as $ptc){ ?>
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3><b><?php echo $ptc->nama_category ?></b></h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                $this->db->select("prod.*, os.city_id as id_city_shop, ctg.category_name as namecot, os.olshop_name as osname, ct.city_name as osdress, user.no_phone as no_wa, user.id_user as id_user");
                                $this->db->from("tbl_product prod");
                                $this->db->join("tbl_category ctg", "ctg.id_category=prod.id_category", "left");
                                $this->db->join("tbl_olshop os", "os.id_olshop=prod.id_olshop", "left");
                                $this->db->join("tbl_user user", "user.id_user=os.id_user", "left");
                                $this->db->join("city as ct", "ct.city_id=os.city_id", "left");
                                $this->db->where("prod.id_category", $ptc->id_category);
                                $this->db->order_by("prod.product_name", "asc");
                                $this->db->order_by("prod.product_price", "asc");
                                
                                $listProduct = $this->db->get()->result();
                                // print_r($listProduct);
                                // echo '<pre>',print_r($listProduct,1),'</pre>';
                                ?>
                                <?php $i=1; foreach ($listProduct as $p) { ?>
                                    <div class="table-responsive" style="padding: 5px;">
                                        <table style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td width="110px">
                                                        <img style="width: 100px; height: auto; max-width: 400px;" src="<?php echo base_url('./file/product/'.$p->product_image) ?>">
                                                    </td>
                                                    <td class="desc">
                                                        <h3>
                                                            <a href="<?php echo base_url('landingpage/detailProduk').'?id='.$p->id_product ?>" class="text-warning">
                                                                <p><b><?php echo $p->product_name?></b></p>
                                                            </a>
                                                        </h3>

                                                        <h4>
                                                            <?php
                                                            if($setcheck[0]->show_price == 1){
                                                                echo 'Rp. '.number_format($p->product_price, 2);
                                                            } else {
                                                                echo 'Rp. '.number_format(0, 0);
                                                                // echo '<a href=""> <p><i class="fa fa-phone"></i></a> Hubungi</p>';
                                                            }
                                                            ?>
                                                        </h4>
                                                        <dl class="small m-b-none">
                                                            <!-- <dt>Description lists</dt> -->
                                                            <dd class="text-muted"><strong><a class="text-danger" href="<?php echo base_url('landingpage/detailToko').'?id='.$p->id_olshop ?>"><?php echo $p->osname ?></a></strong> - <?php echo $p->osdress ?></dd>
                                                        </dl>
                                                    </td>
                                                        <button style="margin-left: 5px; margin-top: 20px;" 
                                                        class="btn btn-warning pull-right add_cart" 
                                                        data-productid="<?php echo $p->id_product ?>" 
                                                        data-olshopid="<?php echo $p->id_olshop ?>" 
                                                        data-osname="<?php echo $p->osname ?>" 
                                                        data-userid="<?php echo $p->id_user ?>" 
                                                        data-productname="<?php echo $p->product_name ?>" 
                                                        data-productprice="<?php echo $p->product_price ?>" 
                                                        data-nomorwa="<?php echo $p->no_wa ?>" 
                                                        data-productimage="<?php echo $p->product_image ?>" 
                                                        data-productdesc="<?php echo $p->product_description ?>"><i class="fa fa-cart-plus"></i> Tambah</button>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php $i++; } ?>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                <?php } else if($search_item != "" || $search_category != "" || $search_city!="") { ?>
                    <?php
                                $nama_category = "";
                                $nama_city = "";
                                $nama_item = "";

                                if($search_category != ""){
                                    $this->db->select("*");
                                    $this->db->from("tbl_category");
                                    $this->db->where('id_category', $search_category);
                                    $nm_ctg = $this->db->get()->result();
                                    $nama_category = "Kategori : ".$nm_ctg[0]->category_name.",";
                                }

                                if($search_city != ""){
                                    $this->db->select("*");
                                    $this->db->from("city");
                                    $this->db->where('city_id', $search_city);
                                    $nm_cty = $this->db->get()->result();
                                    $nama_city = "Kota : ".$nm_cty[0]->city_name;
                                }
                                $this->db->select("prod.*, ct.category_name as nama_kategori, os.olshop_name as osname, cty.city_name as osdress, usr.id_user as id_user, usr.no_phone as no_wa");
                                $this->db->from("tbl_product prod");
                                $this->db->join("tbl_category ct", "ct.id_category = prod.id_category", "left");
                                $this->db->join("tbl_olshop os", "os.id_olshop = prod.id_olshop", "left");
                                $this->db->join("tbl_user usr", "usr.id_user = os.id_user", "left");
                                $this->db->join("city cty", "cty.city_id=os.city_id", "left");
                                if($search_item !=""){
                                    $list_search_item = explode(",",$search_item);
                                    if(sizeof($list_search_item)==1){
                                        $this->db->like("prod.product_name", $search_item);
                                    }else if(sizeof($list_search_item)>1){
                                        $this->db->like("prod.product_name", $list_search_item[0]);
                                        for($i=1;$i<sizeof($list_search_item);$i++){
                                            $this->db->or_like("prod.product_name", $list_search_item[$i]);
                                        }
                                        $this->db->order_by("os.id_olshop", "ASC");
                                        $this->db->order_by("prod.product_price", "ASC");
                                    }
                                    $nama_item = "Item : ".$search_item.",";
                                }
                                if($search_category !=""){
                                    $this->db->where("prod.id_category", $search_category);
                                }
                                if($search_city !=""){
                                    $this->db->where("os.city_id", $search_city);
                                }
                                $list_ctg_item = $this->db->get()->result();
                                // echo $this->db->last_query();
                            ?>
                            <div class="ibox-content col-lg-10 col-lg-offset-1">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3><?php echo $nama_item.' '.$nama_category.' '.$nama_city; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($list_ctg_item) { ?>
                                            <?php foreach($list_ctg_item as $p){ ?>
                                                <div class="table-responsive" style="padding: 5px;">
                                                    <table style="table-layout: fixed;">
                                                        <tbody>
                                                            <tr>
                                                                <td width="110px">
                                                                    <img style="width: 100px; height: auto; max-width: 400px;" src="<?php echo base_url('./file/product/'.$p->product_image) ?>">
                                                                </td>
                                                                <td class="desc">
                                                                    <h3>
                                                                        <a href="<?php echo base_url('landingpage/detailProduk').'?id='.$p->id_product ?>" class="text-warning">
                                                                            <p><b><?php echo $p->product_name ?></b></p>
                                                                        </a>
                                                                    </h3>
                                                                    <h4>
                                                                        <?php
                                                                        if($setcheck[0]->show_price == 1){
                                                                            echo 'Rp.'.number_format($p->product_price, 2);
                                                                        } else {
                                                                            echo '<a href=""> <p><i class="fa fa-phone"></i></a> Hubungi</p>';
                                                                        }
                                                                        ?>
                                                                    </h4>
                                                                    <dl class="small m-b-none">
                                                                        <dd class="text-muted"><strong><a class="text-danger" href=""><?php echo $p->osname ?></a></strong> - <?php echo $p->osdress ?></dd>
                                                                    </dl>
                                                                </td>
                                                                <button style="margin-left: 5px; margin-top: 20px;" 
                                                                class="btn btn-warning pull-right add_cart" 
                                                                data-productid="<?php echo $p->id_product ?>" 
                                                                data-olshopid="<?php echo $p->id_olshop ?>" 
                                                                data-osname="<?php echo $p->osname ?>" 
                                                                data-userid="<?php echo $p->id_user ?>" 
                                                                data-productname="<?php echo $p->product_name ?>" 
                                                                data-productprice="<?php echo $p->product_price ?>" 
                                                                data-nomorwa="<?php echo $p->no_wa ?>" 
                                                                data-productimage="<?php echo $p->product_image ?>" 
                                                                data-productdesc="<?php echo $p->product_description ?>"><i class="fa fa-cart-plus"></i> Tambah</button>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            Data tidak ditemukan ...
                                        <?php } ?>
                <?php } ?>
                    <!-- Tampil Per product -->
                        <!-- Modal Login -->
                        <div class="modal inmodal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header gradient">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h6 class="modal-title" id="title-quis"><label id="label_id">Login</label></h6>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('product/add_product') ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-7">
                                                    <input style="margin-bottom: 10px;" type="password" class="form-control" name="password" id="password" placeholder="Email" required>
                                                    <a href="<?php echo base_url('register') ?>">Register</a> / <a href="#">Forgot Password</a>
                                                </div>
                                            </div>                    
                    <!-- <div class="pull-right">
                    <a style="margin-bottom: 80px;" href="#">Register</a> - <a href="#">Forgot Password</a>
                </div> -->
                <div class="form-group" style="text-align: center;">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success"> Login </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/js/jquery-2.1.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/wow/wow.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/slick/slick.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/select2/select2.full.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
        header = document.querySelector( '.navbar-default' ),
        didScroll = false,
        changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

<script>
    $(document).ready(function(){


        // $('.slick_demo_1').slick({
        //     dots: true
        // });

        // $('.slick_demo_2').slick({
        //     infinite: true,
        //     variableWidth: true,
        //     slidesToShow: 3,
        //     slidesToScroll: 1,
        //     centerMode: true,
        //     responsive: [
        //     {
        //         breakpoint: 1024,
        //         settings: {
        //             slidesToShow: 3,
        //             slidesToScroll: 3,
        //             infinite: true,
        //             dots: true
        //         }
        //     },
        //     {
        //         breakpoint: 600,
        //         settings: {
        //             slidesToShow: 2,
        //             slidesToScroll: 2
        //         }
        //     },
        //     {
        //         breakpoint: 480,
        //         settings: {
        //             slidesToShow: 1,
        //             slidesToScroll: 1
        //         }
        //     }
        //     ]
        // });

        // $('.slick_demo_3').slick({
        //     infinite: true,
        //     speed: 500,
        //     fade: true,
        //     cssEase: 'linear',
        //     adaptiveHeight: true
        // });


            $('.slick_demo_1').slick({
                dots: true
            });

            $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: true,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slick_video').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: true,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slick_demo_3').slick({
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true
            });

        $('.add_cart').click(function(){
            var id_product    = $(this).data("productid");
            var id_user    = $(this).data("userid");
            var id_olshop    = $(this).data("olshopid");
            var osname    = $(this).data("osname");
            var product_name  = $(this).data("productname");
            var product_price = $(this).data("productprice");
            var product_image = $(this).data("productimage");
            var product_description = $(this).data("productdesc");
            var no_wa = $(this).data("nomorwa");
            var qty      = $('#' + id_product).val();
            // var quantity      = $('#' + product_id).val();
            $.ajax({
                url : "<?php echo site_url('cartitems/addCart');?>",
                method : "POST",
                data : {id_product: id_product, id_user: id_user, id_olshop: id_olshop, osname: osname, product_name: product_name, product_price: product_price, product_image: product_image, product_description: product_description, no_wa: no_wa, qty: qty},
                success: function(data){
                    // console.log(data);
                    $('#detail_cart').html(data);
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-bottom-full-width'
                    };
                    toastr.success('Sukses menambahkan produk ke chart.!');
                }
            });
        });

        $('#detail_cart').load("<?php echo site_url('cartitems/load_cart');?>");

    });

</script>
<script>
    $('.select2').select2();
</script>
</body>
</html>