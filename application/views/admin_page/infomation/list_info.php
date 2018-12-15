<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Danh mục thông tin </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh mục thông tin</h3>
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
              <th>Thông tin</th>
              <th>Ngày</th>
              <th>Nội dung</th>
              <th>Thể loại</th>
              <th>Kiểu & Quyền xem</th>
              <th>Cập nhật</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 1;
            foreach ($infomations as $key => $info) {
              // code...
              $name_category = $this->Mcategory->getInfoCateNameById($info['CATEID']);
              echo '<tr>
                <td>'.$stt.'</td>';
              echo '<td>'.$info['INFOTITLE'].'</td>';
              echo (isset($info['INFODATE'])) ? '<td>'.$info['INFODATE'].'</td>' : '<td>-</td>';
              echo (isset($info['INFOCONTENT'])) ? '<td>'.$info['INFOCONTENT'].'</td>' : '<td>-</td>';
              echo (isset($name_category['CATENAME'])) ? '<td>'.$name_category['CATENAME'].'</td>' : '<td>-</td>';
              echo '<td>'.$info['INFOTYPE'].'/'.$info['INFOPOLICY'].'</td>
                <td>';
              if($info['INFOPUBLICATIONORPERSON'] == 2) {
                echo '<a href="'.base_url('canbo/admin/infomation/person/'.$info['INFOID']).'" class="btn btn-primary"><b class="fa fa-edit"></b></a>';
              } else {
                echo '<a href="'.base_url('canbo/admin/infomation/info/'.$info['INFOID']).'" class="btn btn-primary"><b class="fa fa-edit"></b></a>';
              }
              echo '<button type="button" value="'.$info['INFOID'].'" class="btn btn-danger ondelete"><b class="fa fa-trash"></b></button>
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
    var url = "<?php echo base_url('canbo/admin/infomation/delete_info');?>";
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
            info_id : id
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
