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
        <h2>Tambah Slide</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>Tambah Slide</a></strong></li>
        </ol>
    </div>
</div>
<!-- <?php print_r($additionaltools); ?> -->

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
                <div class="ibox-title">
                    <a class="btn btn-info" href="" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="table_slide" class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th width="5%"><center>No</center></th>
                                    <th><center>Gambar Slide</center></th>
                                    <th><center>Judul Slide</center></th>
                                    <th><center>Deskripsi Slide</center></th>
                                    <th><center>Status</center></th>
                                    <th width="15%"><center>Action</center></th>
                                    <!-- <th><center>Status</center></th> -->
                                    <!-- <th><center>Keterangan</center></th> -->
                                    <!-- <?php if($this->session->userdata('nama_role') == 'SUPERADMIN'){?> -->
                                    <!-- <?php } ?> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // if($additionaltools){
                                $i=1;
                                foreach ($slide as $p) {
                                    echo '<tr>';
                                    echo '<td>'.$i.'</td>';
                                    echo '<td>'.'<a data-fancybox data-caption="'.$p->slide_image.'" href="'.base_url('./file/slide/'.$p->slide_image).'">'.'<center>'.'<img class="img-thumbnail" src="'.base_url('./file/slide/'.$p->slide_image).'" width="170px" height="180px">'.'</center>'.'</a>'.'</td>';
                                        // echo '<td>'.'<center>'.'<img width="100" height="80" src="'.base_url('./file/slide/'.$p->slide_image).'">'.'</center>'.'</td>';
                                    echo '<td>'.$p->slide_title.'</td>';
                                    echo '<td>'.$p->slide_description.'</td>';
                                        // echo '<td>'.$p->gambar.'</td>';
                                    if($p->is_seen == 1){
                                        echo '<td>'.'Aktif'.'</td>';
                                    } else {
                                        echo '<td>'.'Nonaktif'.'</td>';
                                    }

                                        // echo '<td>'.$p->information.'</td>';
                                    echo '<td>'.'<center>'.'<a href="" data-toggle="modal" class="btn btn-warning" data-target="#modalEdit'.$p->id_slide.'">Edit</a>'.'</center>'.'</td>';
                                    echo '</tr>';
                                    $i++;
                                }
                                // } else {
                                //     echo "";
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header gradient">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h6 class="modal-title" id="title-quis"><label id="label_id">Tambah Slide</label></h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('slideshow/add_slide') ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Judul Slide</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="slide_title" id="slide_title" placeholder="Judul" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Slide</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="slide_image" id="slide_image" placeholder="">
                            <!-- <span id="span_id"></span> -->
                            <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="slide_description" id="slide_description" placeholder="Deskripsi" required>
                        </div>
                    </div>              
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="is_seen" name="is_seen" required>
                                <option value="">Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                    </div>
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

<?php foreach ($slide as $p) { ?>
    <div class="modal inmodal fade" id="modalEdit<?php echo $p->id_slide ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header gradient">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h6 class="modal-title" id="title-quis"><label id="label_id">Edit Slide</label></h6>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('slideshow/edit_slide/'.$p->id_slide); ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judul Slide</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="id_slide" value="<?php echo $p->id_slide ?>">
                                <input type="text" class="form-control" name="slide_title" id="slide_title" value="<?php echo $p->slide_title ?>" placeholder="Judul" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gambar Slide</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" value="<?php echo $p->slide_image ?>" name="slide_image" id="slide_image" placeholder="">
                                <!-- <span id="span_id"></span> -->
                                <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Deskripsi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="slide_description" id="slide_description" value="<?php echo $p->slide_description ?>" placeholder="Deskripsi" required>
                            </div>
                        </div>              
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="is_seen" name="is_seen" required>
                                    <option value="">Pilih Status</option>
                                    <option value="1" <?php if($p->is_seen == 1){echo "selected";} ?>>Aktif</option>
                                    <option value="0" <?php if($p->is_seen == 0){echo "selected";} ?>>Nonaktif</option>
                                </select>
                            </div>
                        </div>
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
<?php } ?>

<script>
    $(document).ready(function(){
        $("#table_slide").dataTable({
            scrollX:        true,
            scrollCollapse: true,
            paging:         true
        });
    });
</script>
<script>
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
<script>
    $('.select2').select2({
        width: '100%',
        dropdownParent: $("#modalAdd")

    });
</script>