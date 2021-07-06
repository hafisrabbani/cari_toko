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
        <h2>Tambah Kategori</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>Tambah Kategori</a></strong></li>
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
                    <table id="table_category" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th width="5%"><center>No</center></th>
                                <th><center>Gambar Category</center></th>
                                <th><center>Nama Kategori</center></th>
                                <th><center>Deskripsi Kategori</center></th>
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
                                    $i=1;
                                    foreach ($category as $p) {
                                        echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.'<a data-fancybox data-caption="'.$p->category_image.'" href="'.base_url('./file/product_category/'.$p->category_image).'">'.'<center>'.'<img class="img-thumbnail" src="'.base_url('./file/product_category/'.$p->category_image).'" width="170px" height="180px">'.'</center>'.'</a>'.'</td>';
                                        // echo '<td>'.'<center>'.'<img width="100" height="80" src="'.base_url('./file/slide/'.$p->slide_image).'">'.'</center>'.'</td>';
                                        echo '<td>'.$p->category_name.'</td>';
                                        echo '<td>'.substr($p->category_description, 0, 150).'...'.'</td>';
                                        if($p->is_seen == 1){
                                            echo '<td>'.'Aktif'.'</td>';
                                        } else {
                                            echo '<td>'.'Nonaktif'.'</td>';
                                        }

                                        // echo '<td>'.$p->information.'</td>';
                                        echo '<td>'.'<center>'.'<a href="" data-toggle="modal" class="btn btn-xs btn-warning" data-target="#modalEdit'.$p->id_category.'"><i class="fa fa-edit"></i>Edit</a>'.'</center>'.'</td>';
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

<div class="modal inmodal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header gradient">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h6 class="modal-title" id="title-quis"><label id="label_id">Tambah Kategori</label></h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('category/add_category') ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Kategori</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Nama kategori" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Kategori</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="category_image" id="category_image" placeholder="">
                            <!-- <span id="span_id"></span> -->
                            <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <!-- <input type="text" class="form-control" name="category_description" id="category_description" placeholder="Deskripsi" required> -->
                            <textarea type="text" rows="6" class="form-control" name="category_description" id="category_description" placeholder="Deskripsi"></textarea>
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

<?php foreach($category as $p){ ?>
<div class="modal inmodal fade" id="modalEdit<?php echo $p->id_category?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header gradient">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h6 class="modal-title" id="title-quis"><label id="label_id">Edit Kategori</label></h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('category/edit_category/'.$p->id_category) ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Kategori</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $p->category_name ?>" placeholder="Nama kategori" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Kategori</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="category_image" id="category_image" value="<?php echo $p->category_image ?>" placeholder="">
                            <!-- <span id="span_id"></span> -->
                            <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <!-- <input type="text" class="form-control" name="category_description" id="category_description" placeholder="Deskripsi" required> -->
                            <textarea type="text" rows="6" class="form-control" name="category_description" id="category_description" placeholder="Deskripsi"><?php echo $p->category_description ?></textarea>
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
<script>
    $('.select2').select2({
        width: '100%',
        dropdownParent: $("#modalAdd")

    });
</script>
<!-- <script>
  $(document).ready(function() {
    $(".pesan").hide();
    $(".baca_selengkapnya").click(function(){
      $(".pesan").slideDown('slow');
      $(this).hide();
    })
  });
</script> -->