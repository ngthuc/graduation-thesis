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
        <form role="form" id="add-post" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="content">Thông tin</label>
              <input type="hidden" name="type" id="type" value="person">
              <input type="hidden" name="policy" id="policy" value="public">
              <select name="title" id="title" class="form-control" onchange="remove_class();">
                <option>-- Chọn một thông tin --</option>
                <option value="name">Họ tên</option>
                <option value="position">Vị trí công tác</option>
                <option value="birthday">Ngày sinh</option>
                <option value="gender">Giới tính</option>
                <option value="email">Email</option>
                <option value="phone">Điện thoại</option>
                <option value="address">Địa chỉ</option>
                <option value="website">Website</option>
                <option value="avatar">Hình ảnh</option>
              </select>
              <div id="normal" class="hidden">
                <input type="text" class="form-control" name="content" placeholder="Nhập thông tin">
              </div>
              <div id="birthday" class="hidden">
                <input type="date" class="form-control" name="date">
              </div>
              <div id="gender" class="hidden">
                <input type="radio" name="content" value="Male"> Nam <br>
                <input type="radio" name="content" value="Female"> Nữ <br>
              </div>
              <div class="row hidden" id="avatar">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="image" id="image" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                </div>
                <div class="col-sm-6">
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

  function remove_class() {
    $('#normal').addClass('hidden');
    $('#birthday').addClass('hidden');
    $('#gender').addClass('hidden');
    $('#avatar').addClass('hidden');
    var x = document.getElementById("title").value;
    if(x==='birthday') {
      $('#birthday').removeClass('hidden');
    } else if(x==='gender') {
      $('#gender').removeClass('hidden');
    } else if(x==='avatar') {
      $('#avatar').removeClass('hidden');
    } else {
      $('#normal').removeClass('hidden');
    }
  }

  function responsive_filemanager_callback(field_id){
  	// console.log(field_id);
    var url=jQuery('#'+field_id).val();
  	// $("#review").attr("src", url);
  	//your code
  }
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#add-post").serialize());
      var url="<?php echo base_url('canbo/admin/infomation/add_person_processing'); ?>";
      var form="#add-post";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
