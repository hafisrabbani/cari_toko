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
        <h2>Master User</h2>
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="active"><strong><a>User</a></strong></li>
        </ol>
    </div>
</div>
<!-- <?php echo $this->session->userdata('id_role'); ?> -->
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <?php if($this->session->userdata('nama_role') == 'SUPERADMIN'){ ?>
                    <!-- <button class="btn btn-outline btn-info dim" id="btn_add_data">
                        <i class="fa fa-plus"></i> Tambah User
                    </button> -->
                    <button id="btn_add_data" class="btn btn-info " type="button"><i class="fa fa-plus"></i> Tambah User</button>
                </div> <?php } ?>
                <div class="ibox-content">
                    <?php
                    // echo $this->session->userdata('nama_role')
                        if($this->session->userdata('nama_role') == "SUPERADMIN"){
                            echo "TRUE";
                        } else {
                            echo "FALSE";
                        }
                     ?>
                    <div class="table-responsive">
                    <table id="table_user" class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                        <th width="5%"><center>No</center></th>
                        <th><center>Nama Lengkap</center></th>
                        <th><center>Username</center></th>
                        <th><center>Email</center></th>
                        <th><center>No Hp</center></th>
                        <th><center>Role</center></th>
                        <th><center>Status</center></th>
                        <?php if($this->session->userdata('nama_role') == 'SUPERADMIN'){?>

                        <th width="15%"><center>Aksi</center></th>
                    <?php } ?>
                    </tr>
                   </thead>
                    <tbody>
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
                <h6 class="modal-title" id="title-quis"><label id="label_id">Tambah User</label></h6>
            </div>
            <div class="modal-body">
                <form id="formAddUser" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" name="id_user" id="id_user" required>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No Hp</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_phone" id="no_phone" placeholder="Nomor Hp" required>
                        </div>
                    </div>
                                  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Role</label>
                        <div class="col-sm-7">
                            <select class="form-control select2" name="id_role" id="id_role" required>
                                <option value="">Pilih Role</option>
                                <?php
                                    foreach ($role as $p) {
                                        echo '<option value="'.$p->id_role.'">'.$p->role_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password" id="password-user" placeholder="Password Baru">
                            <span toggle="#password-user" class="fa fa-fw fa-eye field-icon toggle-password-user"></span>
                            <sup id="note_password"></sup>
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

<script>
    $("document").ready(function(){
        var sess = "<?php echo $this->session->userdata("nama_role"); ?>";
        if (sess == "SUPERADMIN") {
            var visible = true;
        } else {
            var visible = false;
        }
        var table_user = $("#table_user").dataTable({
            processing: true,
            select: false,
            scrollX: true,

            ajax: {
                url : "<?= base_url('user/get_data_user') ?>",
                dataType : "JSON",
                type : "GET",
                dataSrc : function (data){
                    var returnDataUser = new Array();
                    if(data.status == "success"){
                        $.each(data["data"], function(i, item){
                            var status = item['status'];
                               if(status == 1){
                                var data_status = "ACTIVE";
                               } else {
                                var data_status = "NONACTIVE";
                               }
                            var sessionAdmin = "<?php echo $this->session->userdata('nama_role') ?>";
                            if(sessionAdmin == 'SUPERADMIN'){
                                var editBtn = "<center><button id='btn_edit' data-id_user='"+item["id_user"]+"' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i> Edit</button>&nbsp;"+
                                            "<button id='btn_delete' data-id_user='"+item["id_user"]+"' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> Delete</button></center>";

                            } else {
                               var editBtn = "";
                               
                            }
                            returnDataUser.push({
                                "no" : (i+1),
                                "full_name" : item["full_name"],
                                "username" : item["username"],
                                "email" : item["email"],
                                "no_phone" : item["no_phone"],
                                "nama_role" : item["nama_role"],
                                "status" : data_status,
                                "action" : editBtn
                            });
                        });
                    }
                    return returnDataUser;
                }
            },
            columns : [
                {data : "no"},
                {data : "full_name"},
                {data : "username"},
                {data : "email"},
                {data : "no_phone"},
                {data : "nama_role"},
                {data : "status"},
                {data : "action"}
            ],
            columnDefs : [{
                "targets" : [7],
                "visible" : visible
            }]
        });
    });

    $(document).on("click", "#btn_add_data", function(e){
        $('#formAddUser')[0].reset();
        $("#id_user").val("");
        $("#note_password").html("");
        $("#modalAdd").modal("show");
    });

    $(document).on("click", "#btn_edit", function(e){
        e.preventDefault();
        $('#formAddUser')[0].reset();
        var id_user = $(this).data("id_user");
        $.ajax({
            "async": true,
            "crossDomain": true,
            "url": "<?= base_url('user/get_data_user') ?>/"+id_user,
            "method": "GET",
        }).done(function (response) {
            var data = JSON.parse(response);
            $("#id_user").val(data.data[0].id_user);
            // $("#span_id").html(data.data[0].photo);
            $("#username").val(data.data[0].username);
            $("#full_name").val(data.data[0].full_name);
            $("#email").val(data.data[0].email);
            $("#no_phone").val(data.data[0].no_phone);
            $("#id_role").val(data.data[0].id_role).change();
            $("#status").val(data.data[0].status).change();
            $("#note_password").html("Jika tidak mengubah password, kolom ini kosongkan saja");
            $('#label_id').text("Edit User");
            $("#modalAdd").modal("show");

        });
    });
    

    $(document).on("submit", "#formAddUser", function(e){
        e.preventDefault();
        var id_user = $("#id_user").val();
        var url = (id_user == "" ? "addUSer" : "editUser");
        var formData = new FormData($(this)[0]);
        $.ajax({
            "crossDomain": true,
            "url": "<?= base_url('user') ?>/"+url,
            "method": "POST",
            "processData": false,
            "contentType":false,
            "data": formData,
        }).done(function (response) {
            var data = JSON.parse(response)
            var message = data.message;
            if(data.status == "success"){
                $("#modalAdd").modal("hide");
                swal({
                    title: "Success",
                    text: message.toUpperCase(),
                    type: "success",
                    confirmButtonColor: "#a5dc86",
                    confirmButtonText: "Close",
                }, function(isConfirm){
                    $("#table_user").DataTable().ajax.reload();
                });
                
            } else {
                swal("Failed", message, "warning");
            }
        });
    });

    $(document).on("click", ".toggle-password-user", function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

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
<!-- <script type="text/javascript">
    $("#myselect").on("change", function() {
    $("#" + $(this).val()).show().siblings().hide();
    })
</script> -->
<script>
    $('.select2').select2({
        width: '100%',
        dropdownParent: $("#modalAdd")

    });
</script>