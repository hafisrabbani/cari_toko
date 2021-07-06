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
        <h2>Tambah Product</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>Tambah Product</a></strong></li>
        </ol>
    </div>
</div>
<!-- <?php print_r($additionaltools); ?> -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
    Large Modal
</button> -->
<?php
// echo $this->session->userdata('id_olshop');
// echo $this->session->userdata('nama_role');
// echo $this->session->userdata('fullname');
// print_r($this->session->userdata());
 ?>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-info" href="" style="margin-bottom: 15px;" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah</a>
            <div class="ibox float-e-margins">
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
                <div class="ibox-content">
                <?php $i=1; foreach ($product as $p) { ?>
                    <br/>
                    <div class="ibox-content gradient" style="background-color:#1ab394; color:white; margin-bottom: 15px;">
                        No. <?php echo $i ?> <?php echo $p->is_seen == 1 ? '<i class="fa fa-eye"></i> Aktif' : '<i class="fa fa-eye-slash"></i> Nonaktif'; ?>
                    </div>

                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                                    <tr>
                                                <center>
                                                <a data-fancybox data-caption="<?php echo $p->product_name ?>" href="<?php echo base_url('./file/product/'.$p->product_image) ?>"><img class="img-thumbnail" src="<?php echo base_url('./file/product/'.$p->product_image) ?>" width="170px" height="180px"></a>
                                            </center>
                                            <br/>
                                            <center>
                                            <h3>
                                                <a href="#" class="text-navy">
                                                    <?php echo $p->product_name ?>
                                                </a>
                                            </h3>
                                            </center>
                                        <td class="desc">
                                            <div class="m-t-sm">
                                                <a href="" data-target="#modalEdit<?php echo $p->id_product ?>" data-toggle="modal" class="text-muted"><i class="fa fa-edit"></i> Edit</a>
                                                |
                                                <a id="btn_delete" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                            </div>
                                        </td>
                                        <dl class="small m-b-none" style="margin-left: 20px; margin-right: 20px;">
                                            <dt>Deskripsi Produk</dt>
                                            <dd style="text-align:justify"><?php echo $p->product_description ?></dd>
                                        </dl>
                                        <td>
                                            <h4>
                                                <?php echo 'Rp.'.number_format($p->product_price, 2) ?>
                                            </h4>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                <?php $i++; } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php print_r($category) ?> -->
<div class="modal inmodal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header gradient">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h6 class="modal-title" id="title-quis"><label id="label_id">Tambah Produk</label></h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('product/add_product') ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Nama produk" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-7">
                            <select select class="form-control" name="id_category" id="id_category" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                    foreach ($category as $ct) {
                                        echo '<option value="'.$ct->id_category.'">'.$ct->category_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Produk</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="product_image" id="product_image" placeholder="">
                            <!-- <span id="span_id"></span> -->
                            <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <textarea type="text" rows="8" class="form-control" name="product_description" id="product_description" placeholder="Deskripsi" required></textarea>
                            <!-- <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Deskripsi" required> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Harga" required>
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

<?php foreach ($product as $p) { ?>
<div class="modal inmodal fade" id="modalEdit<?php echo $p->id_product ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header gradient">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h6 class="modal-title" id="title-quis"><label id="label_id">Edit Product</label></h6>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('product/edit_product/'.$p->id_product); ?>" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id_product" value="<?php echo $p->id_product ?>">
                            <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $p->product_name ?>" placeholder="Judul" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-7">
                            <select select class="form-control" name="id_category" id="id_category" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                    foreach ($category as $ctg) {
                                        $selected = "";
                                        if($ctg->id_category == $p->id_category){
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$ctg->id_category.'" '.$selected.'>'.$ctg->category_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gambar Produk</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" value="<?php echo $p->product_image ?>" name="product_image" id="product_image" placeholder="">
                            <!-- <span id="span_id"></span> -->
                            <small class="text-danger">*Gambar ukuran maksimal 2mb</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <!-- <input type="text" class="form-control" name="product_description" id="product_description" value="<?php echo $p->product_description ?>" placeholder="Deskripsi" required> -->
                            <textarea type="text" rows="8" class="form-control" name="product_description" id="product_description" placeholder="Deskripsi" required><?php echo $p->product_description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="product_price" id="product_price" value="<?php echo $p->product_price?>" placeholder="Harga" required>
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
<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
                <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
            <div class="modal-body">
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
                            </tr>
                       </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Gambar a</td>
                                <td>Judul a</td>
                                <td> desc</td>
                                <td> ada</td>
                                <td> detail</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Gambar a</td>
                                <td>Judul a</td>
                                <td> desc</td>
                                <td> ada</td>
                                <td> detail</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Gambar a</td>
                                <td>Judul a</td>
                                <td> desc</td>
                                <td> ada</td>
                                <td> detail</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#table_slide").dataTable();
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