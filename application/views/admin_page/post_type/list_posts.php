<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bài viết
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Danh sách bài viết</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách các bài viết</h3>
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
              <th>Tên bài viết</th>
              <th>Thể loại</th>
              <th>Tác giả</th>
              <th>Kiểu đăng</th>
              <!-- <th>Lượt xem</th> -->
              <th>Cập nhật</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stt = 1;
            foreach ($articles as $key => $post) {
              // code...
              $category = $this->Mcategory->getById($post['CATEID']);
              $author = $this->Musers->getNameById($post['USERID']);
              echo '<tr>
                <td>'.$stt.'</td>
                <td>'.$post['ARTICLETITLE'].'</td>
                <td>'.$category['CATENAME'].'</td>
                <td>'.$author['USERFULLNAME'].'</td>
                <td>'.(($post['ARTICLETYPE']=='page') ? 'Trang' : 'Bài viết').'</td>
                <!--td>'.$post['ARTICLECOUNT'].'</td-->
                <td>
                  <a href="'.base_url('canbo/admin/article/'.$post['ARTICLEID']).'" class="btn btn-primary"><b class="fa fa-edit"></b></a>
                  <button type="button" value="'.$post['ARTICLEID'].'" class="btn btn-danger ondelete"><b class="fa fa-trash"></b></button>
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
    var url = "<?php echo base_url('canbo/admin/article/delete_post')?>";
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
            post_id : id
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
