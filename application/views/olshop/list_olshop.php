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
        <h2>Data Olshop</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>Data Olshop</a></strong></li>
        </ol>
    </div>
</div>
<!-- <?php print_r($additionaltools); ?> -->

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
                <!-- <div class="ibox-title">
                    <a class="btn btn-info" href="" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah</a>
                </div> -->
                <div class="ibox-content">
                    <div class="table-responsive">
                    <table id="table_category" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th width="5%"><center>No</center></th>
                                <th><center>Gambar Toko</center></th>
                                <th><center>Nama Toko</center></th>
                                <th><center>Alamat Toko</center></th>
                                <th><center>Pemilik</center></th>
                                <th width="15%"><center>Action</center></th>
                            </tr>
                       </thead>
                        <tbody>
                            <?php
                                    $i=1;
                                    foreach ($olshop as $p) {
                                        echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.'<a data-fancybox data-caption="'.'image_'.$p->olshop_name.'" href="'.base_url('./file/olshop/'.$p->olshop_image).'">'.'<center>'.'<img class="img-thumbnail" src="'.base_url('./file/olshop/'.$p->olshop_image).'" width="170px" height="180px">'.'</center>'.'</a>'.'</td>';
                                        echo '<td>'.$p->olshop_name.'</td>';
                                        echo '<td>'.'<b>Provinsi :</b>'.$p->provname.'<br>'.'<b>Kab/Kota :</b>'.$p->ctname.'<br>'.'<b>Kecamatan :</b>'.$p->subname.'</td>';
                                        echo '<td>'.ucwords($p->full_name).'</td>';
                                        echo '<td>'.'<center>'.'<a href="'.base_url('olshop/edit').'?id='.$p->id_olshop.'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>'.'</center>'.'</td>';
                                        echo '</tr>';
                                        $i++;
                                    }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $i=1; foreach($olshop as $p){ ?>
<div class="modal inmodal fade" id="modalEdit<?php echo $i ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header gradient">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h6 class="modal-title" id="title-quis"><label id="label_id">Edit Toko <?php echo $p->olshop_name.' No : '.$i ?></label></h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('olshop/update_shop/'.$p->id_olshop) ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Toko</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="olshop_name" id="olshop_name" value="<?php echo $p->olshop_name ?>" placeholder="Nama kategori" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Toko</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="olshop_image" id="olshop_image" value="<?php echo $p->olshop_image ?>" placeholder="">
                            <!-- <span id="span_id"></span> -->
                            <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Provinsi</label>
                        <div class="col-sm-7">
                            <select id="province_id<?php echo $i ?>" class="form-control" onchange="loadCity(); loadSubdistrict()">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                    foreach ($province as $pv) {
                                        $selected = "";
                                        if($pv->province_id == $olshop[0]->province_id){
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$pv->province_id.'" '.$selected.'>'.$pv->nama_provinsi.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kab/Kota</label>
                        <div class="col-sm-7">
                            <select id="city_id<?php echo $i ?>" class="form-control" onchange="loadSubdistrict()">
                                <option value="">Pilih Kab/Kota</option>
                                <?php
                                    $province_id = $olshop[0]->province_id;
                                    $city = $this->db->get_where('city', array('province_id' => $province_id));
                                    foreach($city->result() as $ct){
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
                        <label class="col-sm-3 control-label">Kecamatan</label>
                        <div class="col-sm-7">
                            <select id="subs_id<?php echo $i ?>" class="form-control">
                                <option value="">Pilih Kecamatan</option>
                                <?php
                                    $city_id = $olshop[0]->city_id;
                                    $subdistrict = $this->db->get_where('subdistrict', array('city_id' => $city_id));
                                    foreach($subdistrict->result() as $sb){
                                        $selected = "";
                                        if($sb->subdistrict_id == $olshop[0]->subdistrict_id){
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$sb->subdistrict_id.'" '.$selected.'>'.$sb->subdistrict_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>             
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="is_seen" name="is_seen" required>
                                <option value="">Pilih Status</option>
                                <option value="1" <?php if($p->is_seen == 1){echo "selected";} ?>>Aktif</option>
                                <option value="0" <?php if($p->is_seen == 0){echo "selected";} ?>>Nonaktif</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group" style="text-align: center;">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>;
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $i++; } ?>

<script>
    $(document).ready(function(){
        $("#table_category").dataTable({
        scrollX:        true,
        scrollCollapse: true,
        paging:         true
        });
    });
</script>
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
<!-- <script>
    function loadCity(){
        var pjg_data = "<?php echo sizeof($olshop) ?>";
        for(j=1; j<=pjg_data; j++){
            var province = $("#province_id"+j).val();
        }
            $.ajax({
                type:'GET',
                url:'<?php echo base_url(); ?>olshop/cityList',
                data:'province_id=' + province,
                success: function(html){
                    for(k=1; k<=pjg_data; k++){
                        $("#city_id"+j).html(html);
                    }
                }
            }); 
    }

    function loadSubdistrict(){
        var pjg_data_sub = "<?php echo sizeof($olshop) ?>";
        for(k=1; k<=pjg_data_sub; k++){
            var city = $("#city_id"+k).val();
            $.ajax({
                type:'GET',
                url:'<?php echo base_url(); ?>olshop/subdistrictList',
                data:'city_id=' + city,
                success: function(html){
                    $("#subdistrict_id"+k).html(html);
                }
            });
        }
    }
</script> -->

<!-- <script>
    var jml_data = "<?php echo sizeof($olshop) ?>";
    // console.log(jml_data);
    for(i=1; i<=jml_data; i++){
        $('#province_id'+i).select2({
            width: '100%',
            dropdownParent: $("#modalEdit"+i)
        });

        $('#city_id'+i).select2({
            width: '100%',
            dropdownParent: $("#modalEdit"+i)
        });

        $('#subs_id'+i).select2({
            width: '100%',
            dropdownParent: $("#modalEdit"+i)
        });
    }
</script> -->