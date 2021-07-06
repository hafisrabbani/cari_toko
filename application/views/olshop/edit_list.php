<style>
    .select2-container .select2-selection--single{
        height:34px !important;
    }
    .select2-container--default .select2-selection--single{
       border: 1px solid #ccc !important; 
       border-radius: 0px !important; 
   }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Toko</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>Tambah Product</a></strong></li>
        </ol>
    </div>
</div>
<?php
// echo $this->session->userdata('id_user');
// print_r($olshop);
?>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
    <div class="row">
        <div class="col-lg-6">
            <!-- <div class="widget-head-color-box p-lg text-center" style="background-image: url('file/olshop/shop1.jpg') "> -->
            <div class="widget-head-color-box p-lg text-center" style="background: #EEA236;">
                <div class="m-b-md">
                <h2 class="font-bold no-margins">
                    <?php
                    echo $olshop[0]->full_name;
                        // print_r($olshop);
                    ?>
                </h2>
                <?php if($olshop){ ?>
                    <small>Founder of: <?php echo $olshop[0]->olshop_name ?></small>
                <?php } ?>
                </div>
                <?php if($olshop[0]->olshop_image != "") {?>
                <!-- <a data-fancybox data-caption="<?php echo $olshop[0]->olshop_name ?>" href="<?php echo base_url('./file/olshop/'.$olshop[0]->olshop_image) ?>"> -->
                    <img class="img-thumbnail" src="<?php echo base_url('./file/olshop/'.$olshop[0]->olshop_image) ?>" id="imgId">
                <!-- </a> -->
                <?php } else { ?>
                <img src="<?php echo base_url('assets/images/no_image.jpg') ?>" class="img-circle circle-border m-b-md" width="50%" alt="olshop images" id="imgId">
                <?php } ?>
                <div>
                    <span><?php echo $total_produk->jumlah ?> Produk</span> |
                    <span>350 Terjual</span> |
                    <!-- <span>610 Followers</span> -->
                    <span>Bergabung pada : <?php echo date("d-F-Y", strtotime($olshop[0]->created_at)) ?></span>
                </div>
            </div>
        </div>
        <br/>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form action="<?php echo base_url('olshop/update_shop/').$this->input->get('id'); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Toko</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id_user" value="<?php echo $olshop[0]->id_user ?>">
                                <input type="text" name="olshop_name" class="form-control" value="<?php echo $olshop[0]->olshop_name ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="olshop_image" id="olshop_name" class="form-control" onchange="readURL(this)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select name="province_id" class="form-control select2" id="p_id" onchange="loadCity(); loadSubdistrict()">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                        foreach ($province as $p) {
                                            $selected = "";
                                            if($p->province_id == $olshop[0]->province_id){
                                                $selected = 'selected';
                                            }
                                            echo '<option value="'.$p->province_id.'" '.$selected.'>'.$p->nama_provinsi.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kota</label>
                            <div class="col-sm-10">
                                <select name="city_id" id="cityArea" class="form-control select2" onchange="loadSubdistrict()">
                                <option value=""> Pilih Kota</option>
                                <?php
                                $province_id = $olshop[0]->province_id;
                                $city = $this->db->get_where('city', array('province_id' => $province_id));
                                    foreach ($city->result() as $ct) {
                                        $selected = "";
                                        if($ct->city_id == $olshop[0]->city_id){
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$ct->city_id.'" '.$selected.'>'.$ct->city_name.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <select name="subdistrict_id" id="subdistrictArea" class="form-control select2">
                                    <option value=""> Pilih Kecamatan</option>
                                    <?php
                                        $city_id = $olshop[0]->city_id;
                                        $subdistrict = $this->db->get_where('subdistrict', array('city_id' => $city_id));
                                        foreach($subdistrict->result() as $sbs){
                                            $selected = "";
                                            if($sbs->subdistrict_id == $olshop[0]->subdistrict_id){
                                                $selected = 'selected';
                                            }
                                            echo '<option value="'.$sbs->subdistrict_id.'" '.$selected.'>'.$sbs->subdistrict_name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- <script>
    $(document).ready(function(){
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format:'dd/mm/yyyy'
        });
    });

</script> -->
<script>
    $(document).ready(function(){
        const flashData = $('.flash-data').data('flashdata');
        // alert(flashData);
        if( flashData != "") {
            swal({
                title: '' + flashData,
                text: 'Data berhasil ditambahkan',
                type: 'success'
            });
        } else{

        }

    });
</script>
<script>
    $('.select2').select2({
        width: '100%',
        dropdownParent: $("#modalAdd")

    });
</script>

<script>
    $(document).on("click", "#btn_delete", function(e){
        var id_user = $(this).data("id_user");
        swal({
            title: "Are you sure want to delete ?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm){
            if(isConfirm){
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "<?= base_url('user/delete_data_user') ?>",
                    "method": "POST",
                    "data": {
                        "id_user": id_user
                    }
                }
                
                $.ajax(settings).done(function (response) {
                    var data = JSON.parse(response)
                    var message = data.message;
                    if(data.status == "success"){
                        swal({
                            title: "Success",
                            text: message,
                            type: "success",
                            confirmButtonColor: "#a5dc86",
                            confirmButtonText: "Close",
                        }, function(isConfirm){
                            $("#table_user").DataTable().ajax.reload();
                        });
                    } else {
                        swal("Gagal menghapus data.", message.toUpperCase(), "warning");
                    }
                });   
            }
        });
    });
</script>
<script>
    $('.select2').select2();
</script>
<script>
    function loadCity(){
                var province = $("#p_id").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>olshop/cityList",
                    data:"province_id=" + province,
                    success: function(html)
                    { 
                       $("#cityArea").html(html);
                    }
                }); 
            }

            function loadSubdistrict(){
                var city = $("#cityArea").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>olshop/subdistrictList",
                    data:"city_id=" + city,
                    success: function(html)
                    { 
                        $("#subdistrictArea").html(html);
                    }
                }); 
            }
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgId')
                .attr('src', e.target.result)
                .width(500)
                .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>