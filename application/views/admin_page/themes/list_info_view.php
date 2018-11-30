<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cài đặt thứ tự hiển thị
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Sort</li>
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
          <h3 class="box-title">Thiết lập thông tin hiển thị</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="customize-options" method="post">
          <div class="box-body">
            <a href="<?=base_url('canbo/admin/category/add_new_info');?>" class="btn btn-primary"> Thêm mới </a>
            <hr>
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <table class="table table-bordered table-striped" id="datatables">
              <thead>
                <tr>
                  <th>Vị trí hiện tại</th>
                  <th>Thể loại</th>
                  <th>Cập nhật</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($category as $key => $row_cate) {
                    // code...
                    echo '<tr>
                      <td>'.$row_cate['CATEPOSITION'].'</td>
                      <td>'.$row_cate['CATENAME'].'</td>
                      <td>
                        <button type="submit" data-id="'.$row_cate['CATEID'].'" data-position="'.(intval($row_cate['CATEPOSITION'])-1).'" class="btn btn-success"><span class="fa fa-arrow-up"></span></button>
                        <button type="submit" data-id="'.$row_cate['CATEID'].'" data-position="'.(intval($row_cate['CATEPOSITION'])+1).'" class="btn btn-info"><span class="fa fa-arrow-down"></span></button>
                        <a href="'.base_url('canbo/admin/category/edit_category_info/'.$row_cate['CATEID']).'" class="btn btn-primary"><span class="fa fa-cog"></span></button>
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
        url : "<?php echo base_url('canbo/admin/themes/update_category')?>",
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
