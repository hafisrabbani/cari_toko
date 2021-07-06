<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ilmi Shop - Checkout</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon_honey.png') ?>" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Touchspin -->
    <link href="<?php echo base_url('assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet">

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

    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/sweetalert.css'); ?>">
    

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
        input[type=number] {
          text-align:center;
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
                                <input type="text" placeholder="Cari madu ..." class="form-control mytext" name="top-search" id="text2">
                                <button type="button" class="btn btn-warning" style="padding: 0px;"><i class="fa fa-search icon"></i></button>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="<?php echo base_url() ?>">Home</a></li>
                        <li><a class="page-scroll" href="#category">Kategori</a></li>
                        <li><a class="page-scroll" href="#product">Produk</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                        <?php if($this->cart->total() == 0){?>
                        <?php echo ""; }else { ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" href="#s" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="label label-warning"><?php echo $this->cart->total_items() ?></span></a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <!-- <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a> -->
                                        <div class="media-body">
                                            <small class="text-warning">Total</small>
                                            <strong>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></strong>. <br>
                                        </div>
                                    </div>
                                </li>
                                <!-- <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <a href="<?php echo base_url('checkout/clear_cart') ?>" target="_blank"><i class="fa fa-check fa-fw"></i> Reset</a>
                                            
                                        </div>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
</div>

<div class="col-lg-6 col-lg-offset-3" style="margin-top: 100px;">
    <!-- <form action="<?php echo base_url('checkout/pesan') ?>" method="post" role="form"> -->
    <div class="row">
    <div class="table-responsive m-t">
        <table class="table invoice-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;
                    foreach ($this->cart->contents() as $items) { 
                       echo '<tr>';

                       echo '<td>'.'<img src="'.base_url('./file/product/'.$items['product_image']).'" style="width: 62px;">'.
                       '<div>'.'<strong>'.$items['name'].'</strong>'.'</div>'.'</td>';

                       echo '<input type="hidden" name="product_name'.$items['id'].'" value="'.$items['name'].'">'; //post nama produk
                       echo '<td>'.'<input style="max-width:100%;" width="100px" min="0" class="touchspin1 choose" type="number" readonly value="'.$items['qty'].'">'.'</td>';

                       echo '<td>'.'<span class="prc">'.$items['price'].'</span>'.'</td>';
                       $total_harga_produk = $items['qty'] * $items['price'];
                       echo '<td>'.'<span class="total">'.$total_harga_produk.'</span>'.'</td>';
                       echo '<input type="hidden" name="total_price'.$items['id'].'" class="totalhide" value="'.$total_harga_produk.'">'; //post total harga
                       echo '<td>'.'<a class="btn btn-xs btn-danger delete" id="'.$items['rowid'].'"><i class="fa fa-trash"></i> HAPUS</a>'.'</td>';
                       // echo '<td>'.'<input class="form-control total" type="text" readonly value="'.$total_harga_produk.'">'.'</td>';
                       echo '</tr>';
                       $i++;
                    }

                ?>
            </tbody>
        </table>
        <!-- <?php echo '<pre>',print_r($this->cart->contents(),1),'</pre>'; ?> -->
        <input width="100px" min="0" class="touchspin1 choose" type="number" readonly>
    </div>
        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>Total :</strong></td>
                <!-- <td><?php echo 'Rp. '.$this->cart->format_number($this->cart->total(), 2); ?></td> -->
                <td><span id="sum"></span></td>
            </tr>
            </tbody>
        </table>
                <a href="<?php echo base_url('checkout/clear_cart') ?>"><button class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button></a>
        <!-- <form action="<?php echo base_url('checkout/pesan') ?>" method="post" role="form"> -->
            <div class="well m-t">
                <!-- <strong>Comments</strong> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="order_name" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="order_phone" placeholder="Nomor Handphone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="order_address" placeholder="Alamat ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="well m-t">
                <center><button type="submit" class="btn btn-warning"><img src="https://web.whatsapp.com/img/favicon/1x/favicon.png"> Pesan</button></center>
            </div>
        <!-- </form> -->
        <!-- <a href="https://api.whatsapp.com/send?phone=+6281357977554&text=Ilmi Madu ALami"><i class="fa fa-phone"></i>Chat</a>
        <div style="position:fixed;left:20px;bottom:20px;">
<a href="https://api.whatsapp.com/send?phone=+628123456789&text=Halo">
<button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
<img src="https://web.whatsapp.com/img/favicon/1x/favicon.png"> Whatsapp Kami</button></a>
</div> -->
    </div>row
<!-- </form> -->
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
<script src="<?php echo base_url('assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/wow/wow.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/slick/slick.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>

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
    });

</script>
<script>
    function myFunction() {
      window.open("https://www.w3schools.com");
    }
</script>
<!-- <script>
    $(".input").on('input', function(){
        var jml_data = "<?php echo sizeof($this->cart->contents()); ?>";
        for(i = 1; i<=jml_data; i++){
        var x = document.getElementById('jml'+i).value;
        x = parseFloat(x);

        var y = document.getElementById('hrg'+i).value;
        y = parseFloat(y);
        // console.log(i);
        document.getElementById('result'+i).value = x * y;
        }
    });
</script> -->
<script>
    calc_total();
    $(".choose").on('change', function(){
      var parent = $(this).closest('tr');
      var price  = parseFloat($('.prc',parent).text());
      var choose = parseFloat($('.choose',parent).val());

      $('.totalhide',parent).val(choose*price);
      // $('.total',parent).text(choose*price);
      // new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(number)
      $('.total',parent).text(Number(choose*price).toFixed(2));

      // (new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(number));

      calc_total();
    });

    function calc_total(){
      var sum = 0;
      $(".total").each(function(){
        sum += parseFloat($(this).text());
      });
      $('#sum').text("Rp."+sum.toFixed(2));
    }
</script>
<script>
    $(".touchspin1").TouchSpin({
        buttondown_class: 'btn btn-white',
        buttonup_class: 'btn btn-white'
    });
</script>
<script>
    $('.add').click(function () {
    $(this).prev().val(+$(this).prev().val() + 1);
    });
    $('.sub').click(function () {
        if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
    });
</script>
<script>
    $(document).on('click', '.remove_product', function(){
        var row_id = $(this).attr("id");
        if(confirm("Lanjutkan menghapus?")){
            $.ajax({
                url: "<?php echo base_url('checkout/remove_product') ?>",
                method: "POST",
                data: {row_id:row_id},
                success: function(data){
                    alert("Berhasil menghapus");
                    $()
                }
            })
        } else {
            return false;
        }
    });
</script>
<script>
    function hapusCart(id){
        var hapus = confirm("Apakah anda yakin ingin menghapus?");
        if(hapus){
            window.location = "<?php echo base_url('checkout/remove_product/') ?>"+id;
        }
    }
</script>
<script>
     $(document).ready(function(){
         $(".delete").click(function(e){
            e.preventDefault(); 
            $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>checkout/remove",
              cache: false,
              data: {rowid:$(this).attr("id")}, // since, you need to delete post of particular id
              success: function(isconfirm) {
                 // if (isconfirm){
                 //    alert("Success");
                 // } else {
                 //     alert("ERROR");
                 // }
                 location.reload(true);
               }
           });
        });
    });
</script>
</body>
</html>
