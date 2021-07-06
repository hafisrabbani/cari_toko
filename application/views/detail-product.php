<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ilmi Shop - Landing Page</title>
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

    <!-- Fancybox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
    

    <style>
        .slideshow {
            /*background-image: url("assets/img/landing/background car.jpg");*/
            background-repeat: no-repeat;
            background-size: 1900px 700px;
            background-position: center;
        }
    </style>
    <style>
        .slick_demo_2 .ibox-content {
            margin: 0 10px;
        }
        .mytext {
            width: 520px;
        }
        #text2 {
          color: orange;
        }
        input[type="text"]{
            font-size:14px;
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
        /*img.rounded-corners {
          border-radius: 30px;
        }*/
        html, body {
            height: 50%;
        }

        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: #eee;
            border-color: #ffffff;
        }
        /*body {
            overflow: hidden;
          }*/
    </style>
    <style type="text/css">
        <?php $i=0; foreach($slide as $sld){ ?>
            <?php if($i == 0){ ?>
                .landing-page .header-back.madu<?php echo $slide[0]->id_slide; ?> {
                  background: url(<?php echo base_url('file/slide/'.$slide[0]->slide_image) ?>) 50% 0 no-repeat;
        }
            <?php } else { ?>
                .landing-page .header-back.madu<?php echo $sld->id_slide; ?> {
              background: url(<?php echo base_url('file/slide/'.$sld->slide_image) ?>) 50% 0 no-repeat;
                }
            <?php } ?>
        <?php $i++; } ?>
    </style>
</head>
<body class="landing-page">
<div class="navbar-wrapper">
        <nav style="background: white; padding-bottom: 10px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button style="margin-top: 25px;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo base_url('landingpage') ?>">
                        <img style="margin-top: 8px;" width="70px" height="70px" src="<?php echo base_url('./assets/images/bee_logo.png') ?>">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul style="margin-top: 25px;" class="nav navbar-nav">
                        <li>
                            <div class="form-group input-container">
                                <input style="margin-top: 1px;" type="text" placeholder="Cari madu ..." class="form-control mytext" name="top-search" id="text2">
                                <button type="button" class="btn btn-warning" style="padding: 0px;"><i class="fa fa-search icon"></i></button>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="detail_cart">
                        <!-- Call id to show li class "Cart icon" -->
                    </ul>
                </div>
            </div>
        </nav>
</div>

<div class="col-lg-10 col-lg-offset-1" style="margin-top: 100px;">

<div class="ibox product-detail">
    <!-- <div class="ibox-content"> -->

        <div class="row">
            <div class="col-md-5">


                <div class="product-images">
                    <div>
                        <!-- <div class="image-imitation"> -->
                            <img style="width: 100%; height: auto; max-width: 400px;" src="<?php echo base_url('./file/product/'.$product[0]->product_image) ?>">
                            <!-- <?php echo $product[0]->id_product ?> -->
                        <!-- </div> -->
                    </div>
                </div>

            </div>
            <div class="col-md-7">

                <h2 class="font-bold m-b-xs">
                    <?php echo $product[0]->product_name ?>
                </h2>
                <!-- <small>Many desktop publishing packages and web page editors now.</small> -->
                <div class="m-t-md">
                    <h2 class="product-main-price"><?php echo 'Rp. '.number_format($product[0]->product_price, 2) ?>
                        <!-- <small class="text-muted">Exclude Tax</small>  -->
                    </h2>
                </div>
                <dl class="small m-t-md">
                    <dt>Deskripsi</dt>
                    <dd style="text-align: justify;"><?php echo $product[0]->product_description ?></dd>
                </dl>
                        <br/>

                <div>
                            <button 
                            class="btn btn-warning btn-sm add_cart" 
                            data-productid="<?php echo $product[0]->id_product ?>" 
                            data-olshopid="<?php echo $product[0]->id_olshop ?>" 
                            data-osname="<?php echo $product[0]->osname ?>" 
                            data-userid="<?php echo $product[0]->id_user ?>" 
                            data-productname="<?php echo $product[0]->product_name ?>" 
                            data-productprice="<?php echo $product[0]->product_price ?>" 
                            data-nomorwa="<?php echo $product[0]->no_wa ?>" 
                            data-productimage="<?php echo $product[0]->product_image ?>" 
                            data-productdesc="<?php echo $product[0]->product_description ?>">
                            <i class="fa fa-cart-plus"></i> Tambah</button>
                            <?php
                                if(substr($product[0]->no_wa, 0,2) == "08"){
                                    $product[0]->no_wa = substr($product[0]->no_wa, 1);
                                    $product[0]->no_wa = "62".$product[0]->no_wa;
                                }
                            ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $product[0]->no_wa?>&text=Saya%20tertarik%20untuk%20berlangganan%20KIRIM.EMAIL" style="margin-left: 10px; margin-right: 10px;" class="btn btn-info btn-sm"><i class="fa fa-whatsapp"></i> WhatsApp</a>
                        <a type="submit" href="https://www.google.com/" class="btn btn-success btn-sm"><i class="fa fa-share"></i> Share </a>
                    </div>
                </div>



            </div>
        </div>

    <!-- </div> -->
    <!-- <div class="ibox-footer">
        <span class="pull-right">
            Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
        </span>
        The generated Lorem Ipsum is therefore always free
    </div> -->
</div>

</div>



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


        $('.slick_demo_1').slick({
            dots: true
        });

        $('.slick_demo_2').slick({
            infinite: true,
            variableWidth: true,
            slidesToShow: 3,
            slidesToScroll: 1,
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
            var id_olshop = $(this).data("olshopid");
            var osname = $(this).data("osname");
            var id_user    = $(this).data("userid");
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
                data : {id_product: id_product, id_olshop: id_olshop, osname: osname, id_user: id_user, product_name: product_name, product_price: product_price, product_image: product_image, product_description: product_description, no_wa: no_wa, qty: qty},
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

</body>
</html>
