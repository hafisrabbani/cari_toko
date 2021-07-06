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
<!-- <?php print_r($product) ?> -->
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
<?php if($olshop || $this->session->userdata('nama_role') == 'SUPERADMIN' || $this->session->userdata('nama_role') == 'MEMBER'){ ?>
<div class="wrapper wrapper-content animated fadeIn">
    <a class="btn btn-info" href="" style="margin-bottom: 15px;" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah</a>
    <div class="row">
        <?php foreach($product as $p){ ?>
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">
                        <!-- <div class="product-imitation"> -->
                            <a data-fancybox data-caption="<?php echo $p->product_name ?>" href="<?php echo base_url('./file/product/'.$p->product_image) ?>"><img class="img-thumbnail" src="<?php echo base_url('./file/product/'.$p->product_image) ?>">
                            </a>
                        <!-- </div> -->
                            
                            <span class="product-price pull-right">
                                Rp. <?php echo number_format($p->product_price, 0) ?>
                            </span>
                        <div class="product-desc">
                            <!-- <small class="text-muted">Category</small> -->
                            <a href="#" class="product-name"> <?php echo $p->product_name ?></a>
                            <small class="text-muted"><?php echo $p->osname ?> |</small>
                            <small class="text-muted"><?php echo $p->namecot ?></small>
                            <!-- <div class="small m-t-xs">
                                <?php echo substr($p->product_description, 0, 200) ?>
                            </div> -->
                            <div class="m-t-sm">
                                <center>
                                    
                                <a href="" data-target="#modalEdit<?php echo $p->id_product ?>" data-toggle="modal" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <a id="btn_delete" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php } else { ?>
    <div class="wrapper wrapper-content">
                <div class="middle-box text-center animated fadeInRightBig">
                    <h3 class="font-bold">Tidak ada produk yang ditemukan</h3>
                    <div class="error-desc">
                        Untuk menambahkan produk, silahkan mengisi form toko terlebih dahulu.
                        <br/><a href="<?php echo base_url('olshop') ?>" class="btn btn-warning m-t">Tambahkan toko</a>
                    </div>
                </div>
            </div>
        <?php } ?>
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