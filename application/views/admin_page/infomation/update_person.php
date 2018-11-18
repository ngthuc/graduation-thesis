<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin cá nhân
    <small>Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Bảng điều khiển</li>
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
          <h3 class="box-title">Thêm mới thông tin cá nhân</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="add-info" method="post" action="<?php echo base_url('canbo/admin/infomation/update_person_processing'); ?>">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label>Họ tên</label>
              <input type="hidden" class="form-control" name="title[]" value="name">
              <input type="hidden" class="form-control" name="key[]" value="name">
              <input type="text" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','name');?>" placeholder="Nhập họ tên">
            </div>
            <div class="form-group">
              <label>Vị trí công tác</label>
              <input type="hidden" class="form-control" name="title[]" value="position">
              <input type="hidden" class="form-control" name="key[]" value="position">
              <input type="text" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','position');?>" placeholder="Nhập vị trí công tác">
            </div>
            <div class="form-group">
              <label>Ngày sinh</label>
              <input type="hidden" class="form-control" name="title[]" value="birthday">
              <input type="hidden" class="form-control" name="key[]" value="INFODATE">
              <input type="date" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','birthday');?>">
            </div>
            <div class="form-group">
              <label>Giới tính</label>
              <input type="hidden" class="form-control" name="title[]" value="gender">
              <input type="hidden" class="form-control" name="key[]" value="gender"><br>
              <input type="radio" name="content[]" value="Male"<?php echo (get_info(get_id_logged(),'person','gender') == 'Male') ? ' checked' : '';?>> Nam <br>
              <input type="radio" name="content[]" value="Female"<?php echo (get_info(get_id_logged(),'person','gender') == 'Female') ? ' checked' : '';?>> Nữ <br>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="hidden" class="form-control" name="title[]" value="email">
              <input type="hidden" class="form-control" name="key[]" value="email">
              <input type="text" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','email');?>" placeholder="Nhập địa chỉ email">
            </div>
            <div class="form-group">
              <label>Điện thoại</label>
              <input type="hidden" class="form-control" name="title[]" value="phone">
              <input type="hidden" class="form-control" name="key[]" value="phone">
              <input type="text" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','phone');?>" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="hidden" class="form-control" name="title[]" value="address">
              <input type="hidden" class="form-control" name="key[]" value="address">
              <input type="text" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','address');?>" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
              <label>Website</label>
              <input type="hidden" class="form-control" name="title[]" value="website">
              <input type="hidden" class="form-control" name="key[]" value="website">
              <input type="text" class="form-control" name="content[]" value="<?php echo get_info(get_id_logged(),'person','website');?>" placeholder="Nhập địa chỉ website">
            </div>
            <div class="form-group" id="avatar">
              <label>Hình ảnh</label>
              <input type="hidden" class="form-control" name="title[]" value="avatar">
              <input type="hidden" class="form-control" name="key[]" value="INFOIMAGE">
              <div class="row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="content[]" id="image" value="<?php echo get_info(get_id_logged(),'person','avatar');?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
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
<?php // var_dump($parent_cate); ?>

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
        <iframe  width="100%" height="350" frameborder="0" src="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=image"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Load javascript -->
<script type="text/javascript">
  makeTinymce('textarea');

  function close_window() {
    parent.$.fancybox.close();
  }

  // $('#avatar_post').on("change", function () {
  //   // alert($(this).html());
  //   var imageData = $(this).data('picture');
  //   $("#review").attr("src", imageData);
  // });

  function responsive_filemanager_callback(field_id){
  	// console.log(field_id);
    var url=jQuery('#'+field_id).val();
  	// $("#review").attr("src", url);
  	//your code
  }
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#add-info").serialize());
      // var url="<?php echo base_url('canbo/admin/infomation/update_person_processing'); ?>";
      // var form="#add-post";
      // var callback="#alert-ajax";
      // makeAjaxCall(url, form, callback);
    });
  });
</script>
