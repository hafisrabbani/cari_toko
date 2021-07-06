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
                    <ul class="nav navbar-nav navbar-right" id="detail_cart">
                        <!-- Call id to show li class "Cart icon" -->
                    </ul>
                </div>
            </div>
        </nav>
</div>

<div class="col-lg-6 col-lg-offset-3" style="margin-top: 100px;">
    <div class="row">
        <a href="<?php echo base_url('checkout/clear_cart') ?>"><button type="button" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</button></a>
        <a href="<?php echo base_url('checkout/clear_cart') ?>"><button type="button" class="btn btn-success pull-right"><i class="fa fa-refresh"></i> Reset</button></a>
    </div>
</div>
<div class="col-lg-6 col-lg-offset-3">
    <div class="row">
        <form action="<?php echo base_url('checkout/pesan/') ?>" method="POST" role="form" target="_blank">
        <div class="well m-t">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nama_pembeli" placeholder="Nama" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone_pembeli" placeholder="Nomor Handphone" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" type="text" name="alamat_pembeli" placeholder="Alamat ..." required></textarea>
                    </div>
                </div>
            </div>
        </div>
        
            <?php
            // print_r($this->cart->contents());
            // print_r($productShop);
            // echo json_encode($productShop);
            // echo json_encode($this->cart->contents());
            $i = 0;
            $j = 1;
            $k=1;
            if($this->cart->contents()){
            foreach ($productShop as $po) {
                // echo '<form action="'.base_url('checkout/pesan/').'" method="post" role="form" target="_blank">';
                // echo $po->id_olshop;
                echo '<br>';
                echo '<div class="table-responsive m-t">';
                    echo '<table style="background: #F5F5F5; border-radius: 5px;" class="table shoping-cart-table">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th style="background: #dbdbdb; border-radius: 5px;">'.'Produk '.'</th>';
                                echo '<th style="background: #dbdbdb; border-radius: 5px;" width="200px">'.'Jumlah'.'</th>';
                                echo '<th style="background: #dbdbdb; border-radius: 5px;">'.'Aksi'.'</th>';
                            echo '</tr>';
                        echo '</thead>';
                foreach ($this->cart->contents() as $p) {
                    if($p['id_olshop'] == $po->id_olshop){
                        $is_show = "";
                        if($setting[0]->show_price == 1){
                            $is_show = number_format($p['price'], 2);

                        } else {
                            $is_show = number_format(0, 0);
                        }
                        echo '<tbody>';
                            echo '<tr>';
                                $total_harga_produk = $p['qty'] * $p['price'];
                                echo '<td>'.'<img src="'.base_url('./file/product/'.$p['product_image']).'" style="width: 62px;">'.
                                    '<div>'.'<strong>'.$p['name'].'</strong>'.'</div>'.'<div style="color:red;">'.'</div>'.'<div class="prc">'.'Rp. '.$is_show.'<i style="color: #F5F5F5; display: none;" class="idrow">'.$p['rowid'].'</i>'.'</div>'.'</div>'.'</td>';
                                echo '<td class="pull-left">'.'<input width="100px" min="0" class="touchspin1 choose" type="number" readonly value="'.$p['qty'].'">'.'</td>';
                                echo '<input type="hidden" name="product_name'.$p['id'].'" value="'.$p['name'].'">'; //post nama produk
                                // echo '<input type="hidden" name="no_wa_olshop'.$p['id'].'" value="'.$p['no_wa'].'">';
                                echo '<input type="hidden" name="total_price'.$p['id'].'" class="totalhide" value="'.$total_harga_produk.'">'; //post total harga
                                echo '<input type="hidden" name="quantity'.$p['id'].'" value="'.$p['qty'].'">';
                                echo '<td>'.'<a class="btn btn-xs btn-danger delete" id="'.$p['rowid'].'"><i class="fa fa-trash"></i> HAPUS</a>'.'</td>';
                                // echo '<td>'.'<a href="'.base_url('checkout/pesan').'?id='.$p['id_olshop'].'">'.'Pesan'.'</a>'.'</td>';
                            echo '</tr>';
                        echo '</tbody>';
                        $j++;
                    }
                }
                        echo '<tfoot>';

                            echo '<tr>';
                                echo '<td colspan="3">'.'<center>'.'<button name="id_olshop" value="'.$po->id_olshop.'" type="submit" class="btn btn-warning"><img src="https://web.whatsapp.com/img/favicon/1x/favicon.png"> Pesan</button>'.'</center>'.'</td>';
                            echo '</tr>';
                        echo '</tfoot>';
                    echo '</table>';
                    echo '<table style="background: #fef29d; border-radius: 5px;" class="table invoice-total">';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td class="pull-left"><strong class="text-danger">Detail Pesanan '.$po->nama_olshop.'</strong></td>';
                    echo '<td class="pull-right"><strong>Total :</strong></td>';
                    // $is_show = "";
                    //     if($setting[0]->show_price == 1){
                    //         $is_show = number_format($p['price'], 2);

                    //     } else {
                    //         $is_show = number_format(0, 0);
                    //     }
                    echo '<td><span id="sum'.$po->id_olshop.'"></span></td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                echo '</div>';
                // echo '</form>';
                $i++;
                $k++;
            }
        }
            ?>
        </form>
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
        $.ajax({
            url:"<?php echo base_url();?>checkout/totalShop",
            method: "POST",
            success:function(data){
                var dataTotal = JSON.parse(data);
                for(i = 0; i < dataTotal.length; i++){
                    var total = dataTotal[i].total;
                    // console.log(total);
                    $('#sum'+dataTotal[i].id_shop).text("Rp."+total.toFixed(2));
                }
            }
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

        $('#detail_cart').load("<?php echo site_url('checkout/load_cart');?>");
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
    // calc_total();
    $(".choose").on('change', function(){
      var parent = $(this).closest('tr');
      var price  = parseFloat($('.prc',parent).text());
      var choose = parseFloat($('.choose',parent).val());
      var row_id = $('.idrow',parent).text();
          $.ajax({
            url:"<?php echo base_url();?>checkout/update_qty",
            method: "POST",
            data:{row_id: row_id, qty: choose},
            success:function(data){
              $('#detail_cart').html(data);
              // console.log(data);
            }
          });

          $.ajax({
            url:"<?php echo base_url();?>checkout/totalShop",
            method: "POST",
            success:function(data){
                var dataTotal = JSON.parse(data);
                for(i = 0; i < dataTotal.length; i++){
                    var total = dataTotal[i].total;
                    console.log(total);
                    $('#sum'+dataTotal[i].id_shop).text("Rp."+total.toFixed(2));
                }
            }
          });

      $('.totalhide',parent).val(choose*price);
      // new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(number)
      // $('.total',parent).text(Number(choose*price).toFixed(2));

      // (new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(number));

      // calc_total();
    });
    
    // function calc_total(){
    //   var sum = 0;
    //   $(".total").each(function(){
    //     sum += parseFloat($(this).text());
    //   });
    //   var jmlh_shop = "<?php echo sizeof($productShop) ?>";
    //   // console.log(jmlh_shop);
    //   for(i = 1; i<=jmlh_shop; i++){
    //   var testSum = $('#sum'+i).text("Rp."+sum.toFixed(2)); //total harga
        
    //     // console.log(testSum);
    //   }
    //   $('#suminput').val(sum.toFixed(2));
    // }
</script>
<script>
var p1 = "success";
</script>
<?php
    function updateqty(){
        // echo "<script>$('.idrow',parent).text();</script>;";
        $a = "document.writeln(p1)";
        echo $a;
        // return "";
    }
?>
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
        var countShop = "<?php echo sizeof($productShop) ?>";
        for(i=1; i<=countShop; i++){
            $('#buttonfirst'+i).click(function(){ 
                $('#button2').trigger('click'); 
            });
        }
    });
</script>
<script>
    submitForms = function(){
    var countShop = "<?php echo sizeof($productShop) ?>";
    for(i=1; i<=countShop; i++){
    document.getElementById("#formfirst"+i).submit();
    }
    document.getElementById("#form2").submit();
}
</script>
</body>
</html>
