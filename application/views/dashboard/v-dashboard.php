
<div class="wrapper wrapper-content animated fadeInRight">
  <?php if($this->session->flashdata("success")){ ?>
  <div class="row">
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
        <?php
            echo strtoupper($this->session->flashdata("success"));
            unset($_SESSION["success"]);
        ?>
    </div>
  <?php } ?>
      <div class="col-lg-3">
          <div class="widget style1 navy-bg">
              <div class="row">
                  <div class="col-xs-4">
                      <i class="fa fa-user fa-5x"></i>
                  </div>
                  <div class="col-xs-8 text-right">
                      <span> Member Aktif </span>
                      <h2 class="font-bold"><?php echo $total_user->jumlah ?></h2>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3">
          <div class="widget style1 lazur-bg">
              <div class="row">
                  <div class="col-xs-4">
                      <i class="fa fa-cube fa-5x"></i>
                  </div>
                  <div class="col-xs-8 text-right">
                      <span> Total Produk </span>
                      <h2 class="font-bold"><?php echo $total_produk->jumlah ?></h2>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3">
          <div class="widget style1 red-bg">
              <div class="row">
                  <div class="col-xs-4">
                      <i class="fa fa-cubes fa-5x"></i>
                  </div>
                  <div class="col-xs-8 text-right">
                      <span> Total Category </span>
                      <h2 class="font-bold"><?php echo $total_category->jumlah ?></h2>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="exampleTbl" class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
                <tr>
                <th width="5%">No</th>
                <th>Username</th>
                <th>Periode</th>
                <!-- <th>Tanggal</th> -->
                <th width="15%">Total Man Hour</th>
                <!-- <th>Cost Control & Activity</th> -->
                <!-- <th>Status</th> -->
            </tr>
           </thead>
            <tbody>
              <?php
              $i=1;
              foreach ($approve as $p) {
                # code...
              
                echo '<tr>';
                  echo '<td>'.$i.'</td>';
                  echo '<td>'.$p->nameuse.'</td>';
                  echo '<td>'.date("d F Y", strtotime($p->date_start))." s/d ".date("d F Y", strtotime($p->date_end)).'</td>';
                  echo '<td>'.$p->sttms.'</td>';
                echo '</tr>';
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("#exampleTbl").dataTable();
    });
</script>