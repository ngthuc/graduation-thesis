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
              <label for="title">Tên thông tin</label>
              <input type="hidden" name="type" id="type" value="person">
              <input type="hidden" name="policy" id="policy" value="public">
              <input type="text" class="form-control" name="title" id="title" placeholder="Nhập tên thông tin">
            </div>
            <div class="form-group">
              <label for="title_eng">Tên thông tin (English)</label>
              <input type="text" class="form-control" name="title_eng" id="title_eng" placeholder="Nhập tên thông tin">
            </div>
            <div class="form-group">
              <label for="category">Thể loại</label>
              <select class="form-control select2" style="width: 100%;" name="category" required>
                <?php
                  foreach ($parent_cate as $key => $row) {
                  echo '<option value="'.$row['CATEID'].'">';
                    for($i=1;$i<=$row['CATELEVEL'];$i++) {
                      if($i==1) echo '';
                      else echo '|---';
                    }
                    echo $row['CATENAME'].'</option>
                    ';
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Icon hiển thị</label>
              <input type="text" class="form-control" name="description" id="description" placeholder="Nhập icon hiển thị (nhập class css)">
            </div>
            <div class="form-group">
              <label for="content">Thông tin</label>
              <input type="text" class="form-control" name="content" id="content" placeholder="Nhập thông tin">
            </div>
            <div class="form-group">
              <label for="content_eng">Thông tin (English)</label>
              <input type="text" class="form-control" name="content_eng" id="content_eng" placeholder="Nhập thông tin">
            </div>
            <div class="form-group">
              <label for="image">Ảnh đại diện</label>
              <div class="row">
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
            <button type="submit" class="btn btn-primary">Lưu & xuất bản</button>
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
      // alert($("#add-post").serialize());
      var url="<?php echo base_url('canbo/admin/infomation/add_new_processing'); ?>";
      var form="#add-post";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
