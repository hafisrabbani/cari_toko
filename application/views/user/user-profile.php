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

<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="ibox float-e-margins">
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
                <div class="ibox-content">
                    <div class="jumbotron">
                        <div class="row">
                            <form action="<?php echo base_url('profile/update_profile/').$this->session->userdata('id_user'); ?>" method="POST" role="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="full_name" required="" value="<?php echo $user[0]->full_name ?>" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="<?php echo $user[0]->username ?>" required="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $user[0]->email ?>" required="" placeholder="xxx@xmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Hp</label>
                                        <input type="text" class="form-control" name="no_phone" value="<?php echo $user[0]->no_phone ?>" required="" placeholder="No Hp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="txtPassword" type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input id="txtConfirmPassword" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <input id="btnSubmit" type="submit" class="btn btn-sm btn-primary" value="SIMPAN">
                                                <a href="<?php echo base_url('account') ?>" class="btn btn-sm btn-info">KEMBALI</a>
                                                <input type="reset" value="RESET" class="btn btn-sm btn-warning" />
                                        </div>
                                    </div>
                                </div>
                            </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                text: 'Data berhasil diubah',
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
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                // alert("Passwords do not match.");
                swal({
                    title: 'Gagal',
                    text: 'Password tidak cocok',
                    type: 'error'
                });
                return false;
            }
            return true;
        });
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