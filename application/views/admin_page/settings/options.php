<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cài đặt trang web
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Cài đặt</li>
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
          <h3 class="box-title">Các thiết lập cơ bản</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="default" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="site_name">Tên trang web</label>
              <input type="hidden" name="key[]" value="site_name">
              <input type="text" class="form-control" name="value[]" id="site_name" value="<?php echo get_system('default','site_name'); ?>" placeholder="Nhập tên trang web">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="short_name">Tên hiển thị</label>
                  <input type="hidden" name="key[]" value="short_name">
                  <input type="text" class="form-control" name="value[]" id="short_name" value="<?php echo get_system('default','short_name'); ?>" placeholder="Nhập tên hiển thị">
                </div>
                <div class="col-md-4">
                  <label for="phone">Điện thoại</label>
                  <input type="hidden" name="key[]" value="phone">
                  <input type="text" class="form-control" name="value[]" id="phone" value="<?php echo get_system('default','phone'); ?>" placeholder="Nhập số điện thoại">
                </div>
                <div class="col-md-4">
                  <label for="email">Email</label>
                  <input type="hidden" name="key[]" value="email">
                  <input type="email" class="form-control" name="value[]" id="email" value="<?php echo get_system('default','email'); ?>" placeholder="Nhập địa chỉ email">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="address">Địa chỉ liên hệ</label>
              <input type="hidden" name="key[]" value="address">
              <input type="text" class="form-control" name="value[]" id="address" value="<?php echo get_system('default','address'); ?>" placeholder="Nhập địa chỉ liên hệ">
            </div>
            <div class="form-group">
              <label for="keywords">Các từ khóa</label>
              <input type="hidden" name="key[]" value="keywords">
              <input type="text" class="form-control" name="value[]" id="keywords" value="<?php echo get_system('default','keywords'); ?>" placeholder="Nhập từ khóa">
            </div>
            <div class="form-group">
              <label for="description">Mô tả trang web</label>
              <input type="hidden" name="key[]" value="description">
              <input type="text" class="form-control" name="value[]" id="description" value="<?php echo get_system('default','description'); ?>" placeholder="Nhập mô tả">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="url">Địa chỉ website</label>
                  <input type="hidden" name="key[]" value="url">
                  <input type="text" class="form-control" name="value[]" id="url" value="<?php echo get_system('default','url'); ?>" placeholder="Nhập URL">
                </div>
                <div class="col-md-4">
                  <label for="version">Phiên bản website</label>
                  <input type="hidden" name="key[]" value="version">
                  <input type="text" class="form-control" name="value[]" id="version" value="<?php echo get_system('default','version'); ?>" placeholder="Nhập số phiên bản">
                </div>
                <div class="col-sm-4">
                  <label for="limit_per_page">Số bài/trang</label>
                  <input type="hidden" name="key[]" value="limit_per_page">
                  <input type="text" class="form-control" name="value[]" id="limit_per_page" value="<?php echo get_system('default','limit_per_page'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="favicon">Logo</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="hidden" name="key[]" value="favicon">
                  <input type="text" class="form-control" name="value[]" id="logo" value="<?php echo get_system('default','favicon'); ?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                </div>
                <div class="col-sm-4">
                  <!-- Trigger the modal with a button -->
                  <button type="button" id="fancybox" class="form-control" data-toggle="modal" data-target="#selectFile">Duyệt ảnh</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- Modal -->
<div id="selectFile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý tệp tin</h4>
      </div>
      <div class="modal-body">
        <iframe  width="100%" height="350" frameborder="0" src="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=logo"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
  function close_window() {
    parent.$.fancybox.close();
  }

  function responsive_filemanager_callback(field_id){
    // console.log(field_id);
    var url=jQuery('#'+field_id).val();
    // alert('update '+field_id+" with "+url);
    //your code
  }
  // Update
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#default").serialize());
      var url="<?php echo base_url('canbo/admin/settings/update_default_processing')?>";
      var form="#default";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
