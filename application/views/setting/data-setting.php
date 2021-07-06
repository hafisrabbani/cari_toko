<style type="text/css">
    .select2-close-mask{
        z-index: 99999;
    }
    .select2-dropdown{
        z-index: 99999;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Setting Harga</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>Setting Harga</a></strong></li>
        </ol>
    </div>
</div>
<!-- <?php echo $setting[0]->id_setting ?> -->
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="ibox float-e-margins">
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
                <div class="ibox-content">
                    <form action="<?php echo base_url('setting/update_setting/').$setting[0]->id_setting ?>" method="POST" role="form">
                        <div class="row">
                            <center>
                                <h3>
                                    Harga "<?php if($setting[0]->show_price == 1) { echo "ON"; } else { echo "OFF"; } ?>"
                                </h3>
                                <br>
                                <?php
                                    $checked = "";
                                    if ($setting[0]->show_price == 1){
                                        $checked = "checked";
                                    }
                                ?>
                                <input type="checkbox" name="show_price" class="js-switch" <?php echo $checked ?> />
                                <!-- <?php if($setting[0]->show_price == 1){ ?>
                                    <input type="checkbox" name="show_price" value="1" class="js-switch" checked />
                                <?php } else { ?>
                                    <input type="checkbox" name="show_price" value="1" class="js-switch" />
                                <?php } ?> -->
                            </center>
                        </div>
                        <div class="row">
                            <div class="ibox">
                                <button type="submit" class="btn btn-warning pull-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php print_r($additionaltools); ?> -->
<script>
    $(document).ready(function(){
        const flashData = $('.flash-data').data('flashdata');
        // alert(flashData);
        if( flashData != "") {
            swal({
                title: '' + flashData,
                text: 'Berhasil Mengubah',
                type: 'success'
            });
        } else{

        }

    });
</script>
<script>
    $(document).ready(function(){
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
    });
</script>
<script>
    $('.select2').select2({
        width: '100%',
        dropdownParent: $("#modalAdd")

    });
</script>