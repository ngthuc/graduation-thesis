<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Giao diện
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Danh sách giao diện</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách các giao diện</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <form id="change-theme" method="post" action="<?php echo base_url('canbo/admin/themes/update_themes');?>"> -->
          <form id="change-theme" method="post">
            <div id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <table class="table table-bordered table-striped" id="datatables">
              <thead>
              <tr>
                <th>STT</th>
                <th>Tên giao diện</th>
                <th>Ảnh thu nhỏ</th>
                <th>Cập nhật</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $stt = 1;
              foreach ($themes_info as $key => $info) {
                // code...
                echo '<tr>
                  <td>'.$stt.'</td>
                  <td>'.$info['SYSTEMTITLE'].'</td>
                  <td>
                    <a href="#imageReview" class="openImageDialog" data-toggle="modal" data-picture="'.base_url($info['SYSTEMDATA']).'">
                      <img src="'.base_url($info['SYSTEMDATA']).'" width="200px" />
                    </a>
                  </td>
                  <td>
                    <button class="onchange btn ';
                    if(get_system('theme','theme') == $info['SYSTEMTITLE']) {
                      echo 'btn-primary';
                    } else {
                      echo 'btn-default';
                    }
                    echo '" name="theme" type="submit" value="'.$info['SYSTEMTITLE'].'"><b class="fa fa-check-square-o"></b> ';
                    if(get_system('theme','theme') == $info['SYSTEMTITLE']) {
                      echo 'Đang kích hoạt</button>';
                    } else {
                      echo 'Kích hoạt</button>';
                    }
                    echo '
                  </td>
                </tr>';
                $stt++;
              }
              ?>
              </tfoot>
            </table>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  <!-- /.col -->
  </div>
<!-- /.row -->
</section>

<div class="modal fade" id="imageReview" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Đóng</span>
            </button>
            <h4 class="modal-title">Ảnh xem trước</h4>
          </div>
          <div class="modal-body">
              <img id="imageTarget" src="" width="100%">
          </div>
        </div>
    </div>
</div>

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

<style media="screen">
  table, th, td {
    text-align: center;
  }
</style>

<script type="text/javascript">
  $(document).on("click", ".openImageDialog", function () {
    var imageData = $(this).data('picture');
    $(".modal-body #imageTarget").attr("src", imageData);
  });

  // Update
  $(function(){
    $('.onchange').on('click', function(){
      // alert($(this).attr('value'));
      var url = "<?php echo base_url('canbo/admin/themes/update_themes');?>";
      var theme = $(this).attr('value');
      var callback = "#alert-ajax";
      // alert(url + ' - ' + theme + ' - ' + callback);
      load_ajax(url,theme,callback);
    });
  });

  function load_ajax(url,theme,callback){
      $.ajax({
          url : url,
          type : "post",
          dateType:"text",
          data : {
              theme : theme
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
