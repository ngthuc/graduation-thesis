<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bài viết
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
              <th>Tên thông tin</th>
              <th>Mô tả</th>
              <th>Thông tin</th>
              <th>Thể loại</th>
              <th>Kiểu</th>
              <th>Quyền xem</th>
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
                <td>'.$stt.'</td>
                <td>'.$info['INFOTITLE'].'</td>
                <td>'.(($info['INFOTYPE'] == 'person') ? '<i class="fa fa-fw '.$info['INFODESCRIPTION'].'"></i>' : $info['INFODESCRIPTION']).'</td>
                <td>'.$info['INFOCONTENT'].'</td>
                <td>'.$name_category['CATENAME'].'</td>
                <td>'.$info['INFOTYPE'].'</td>
                <td>'.$info['INFOPOLICY'].'</td>
                <td>
                  <a href="'.base_url('canbo/admin/infomation/'.$info['INFOID']).'" class="btn btn-primary"><b class="fa fa-edit"></b></a>
                  <button type="button" value="'.$info['INFOID'].'" class="btn btn-danger ondelete"><b class="fa fa-trash"></b></button>
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
