<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tài khoản
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Danh sách tài khoản</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách các tài khoản</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="alert-ajax">
            <!-- Alert by Ajax -->
          </div>
          <table class="table table-bordered table-striped" id="datatables">
            <thead>
            <tr>
              <th>STT</th>
              <th>Tên tài khoản</th>
              <th>Tên đầy đủ</th>
              <th>Email</th>
              <th>Quyền hạn</th>
              <th>Trạng thái</th>
              <th>Cập nhật</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 1;
            foreach ($accounts as $key => $row) {
            echo '<tr>
              <td>'.$stt.'</td>
              <td>'.$row['USERID'].'</td>
              <td>'.$row['USERFULLNAME'].'</td>
              <td>'.$row['USEREMAIL'].'</td>
              <td>';
              if($row['USERROLE'] == 'admin') {
                echo 'Quản trị viên';
              } else if($row['USERROLE'] == 'user') {
                echo 'Người dùng';
              } else {
                echo '<i>Chưa xác định</i>';
              }
              echo '</td>
              <td>';
              if($row['USERSTATUS'] == 'deny') {
                echo '<button type="button" class="btn bg-maroon">Bị từ chối</button>';
              } else if($row['USERSTATUS'] == 'approved') {
                echo '<button type="button" class="btn bg-olive">Được cấp phép</button>';
              } else {
                echo '<button type="button" class="btn bg-navy">Đang chờ</button>';
              }
              echo '</td>
              <td>
                <a href="'.base_url('canbo/admin/accounts/edit_account/'.$row['USERID']).'" class="btn btn-primary"><b class="fa fa-edit"></b></a>
                <button type="button" value="'.$row['USERID'].'" class="btn btn-danger ondelete"><b class="fa fa-trash"></b></button>
              </td>
            </tr>';
            $stt++;
            }
            ?>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  <!-- /.col -->
  </div>
<!-- /.row -->
</section>

<!-- DataTables 1.10.16 -->
  <!-- Include DataTables 1.10.16 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.css'); ?>"/>
    <script type="text/javascript" src="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.js'); ?>"></script>
  <!-- Include DataTables 1.10.16 -->
  <!-- Using DataTables -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('.datatables').DataTable({
          "language" : {
            "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
        }
      });
    });
    </script>
  <!-- Using DataTables -->
<!-- DataTable 1.10.16 -->

<!-- load ajax to delete -->
<script type="text/javascript">
$(function(){
  $('.ondelete').on('click', function(){
    // alert($(this).attr('value'));
    var url = "<?php echo base_url('canbo/admin/accounts/delete_account')?>";
    var id = $(this).attr('value');
    var callback = "#alert-ajax";
    load_ajax(url,id,callback);
  });
});

function load_ajax(url,id,callback){
    $.ajax({
        url : url,
        type : "post",
        dateType:"text",
        data : {
            uid : id
        },
    success : function (result){
      //alert(result);
      var obj = jQuery.parseJSON(result);
      $(callback).html(
        '<div class="alert alert-'+obj['STATUS']+'" id="alert-out">'+obj['MESSAGE']+'</div>'
      );
      location.reload(true);
    }
  });
}
</script>
