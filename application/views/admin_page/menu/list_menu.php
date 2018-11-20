<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cài đặt thanh điều hướng
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Menu</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Thiết lập thanh điều hướng</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="customize-options" method="post">
          <div class="box-body">
            <a href="<?=base_url('canbo/admin/themes/add_menu');?>" class="btn btn-primary"> Thêm mới </a>
            <hr>
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <table class="table table-bordered table-striped" id="datatables">
              <thead>
                <tr>
                  <th>Vị trí hiện tại</th>
                  <th>Điều hướng</th>
                  <th>Đường dẫn</th>
                  <th>Cập nhật</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($menu as $key => $row_menu) {
                    // code...
                    echo '<tr>
                      <td>'.$row_menu['MENUPOSITION'].'</td>
                      <td>'.$row_menu['MENUNAME'].'</td>
                      <td>'.$row_menu['MENULINK'].'</td>
                      <td>
                        <button type="submit" data-id="'.$row_menu['MENUID'].'" data-position="'.(intval($row_menu['MENUPOSITION'])-1).'" class="btn btn-success"><span class="fa fa-arrow-up"></span></button>
                        <button type="submit" data-id="'.$row_menu['MENUID'].'" data-position="'.(intval($row_menu['MENUPOSITION'])+1).'" class="btn btn-info"><span class="fa fa-arrow-down"></span></button>
                        <a href="'.base_url('canbo/admin/themes/edit_menu/'.$row_menu['MENUID']).'" class="btn btn-primary"><span class="fa fa-cog"></span></button>
                      </td>
                    </tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <!-- <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div> -->
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- Load ajax -->
<script type="text/javascript">
  // Update
  $(document).ready(function(){
    $(this).on('click', 'button', function(){
      // alert($(this).data("id")+' '+$(this).data("position"));
      // var url="<?php echo base_url('admin/settings/update_options')?>";
      // var form="#customize-options";
      // var callback="#alert-ajax";
      // makeAjaxCall(url, form, callback);
      loadAjaxChangePosition($(this).data("id"),$(this).data("position"));
    });
  });

  function loadAjaxChangePosition(id,position){
    $.ajax({
        url : "<?php echo base_url('canbo/admin/themes/update_menu')?>",
        type : "post",
        dateType:"text",
        data : {
            id : id,
            position : position
        },
        success: function(json){
          var obj = jQuery.parseJSON(json);
          $("#alert-ajax").html('<div class="alert alert-'+obj['STATUS']+'" id="alert-out">'+obj['MESSAGE']+'</div>');
          location.reload();
        }
  });
}
</script>
