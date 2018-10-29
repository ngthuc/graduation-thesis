<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Plugin Trình chiếu
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Slideshow</li>
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
          <h3 class="box-title">Trình chiếu</h3>
        </div>
        <!-- /.box-header -->

        <!-- form start -->
        <form role="form" id="customize" method="post">
          <div class="box-body">
            <div id="alert-ajax"></div>
            <div class="form-group form-inline">
              <label for="data_type">Loại dữ liệu đầu vào</label><br>
              <a href="<?php echo base_url('admin/settings/slideshow');?>" class="form-control btn btn-default" id="default">Mặc định</a>
              <a href="<?php echo base_url('admin/settings/slideshow/latestpost');?>" class="form-control btn btn-success" id="latestpost">Mới nhất</a>
              <a href="<?php echo base_url('admin/settings/slideshow/mostview');?>" class="form-control btn btn-info" id="mostview">Xem nhiều nhất</a>
            </div>
            <div class="form-group">
              <label for="slider_1">Ảnh 1</label>
              <input type="hidden" name="id_slider_1" value="1537843185">
              <input type="text" class="form-control" name="title_slider_1" id="title_slider_1" value="<?php echo get_media_id('slideshow', '1537843185', 'title'); ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_1" id="url_slider_1" value="<?php echo get_media_id('slideshow', '1537843185', 'data'); ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_1" id="img_slider_1" value="<?php echo get_media_id('slideshow', '1537843185', 'link'); ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
              <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=img_slider_1">Duyệt ảnh</button>
            </div>
            <div class="form-group">
              <label for="slider_2">Ảnh 2</label>
              <input type="hidden" name="id_slider_2" value="1537843186">
              <input type="text" class="form-control" name="title_slider_2" id="title_slider_2" value="<?php echo get_media_id('slideshow', '1537843186', 'title'); ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_2" id="url_slider_2" value="<?php echo get_media_id('slideshow', '1537843186', 'data'); ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_2" id="img_slider_2" value="<?php echo get_media_id('slideshow', '1537843186', 'link'); ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
              <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=img_slider_2">Duyệt ảnh</button>
            </div>
            <div class="form-group">
              <label for="slider_3">Ảnh 3</label>
              <input type="hidden" name="id_slider_3" value="1537843187">
              <input type="text" class="form-control" name="title_slider_3" id="title_slider_3" value="<?php echo get_media_id('slideshow', '1537843187', 'title'); ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_3" id="url_slider_3" value="<?php echo get_media_id('slideshow', '1537843187', 'data'); ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_3" id="img_slider_3" value="<?php echo get_media_id('slideshow', '1537843187', 'link'); ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
              <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=img_slider_3">Duyệt ảnh</button>
            </div>
            <div class="form-group">
              <label for="slider_4">Ảnh 4</label>
              <input type="hidden" name="id_slider_4" value="1537843188">
              <input type="text" class="form-control" name="title_slider_4" id="title_slider_4" value="<?php echo get_media_id('slideshow', '1537843188', 'title'); ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_4" id="url_slider_4" value="<?php echo get_media_id('slideshow', '1537843188', 'data'); ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_4" id="img_slider_4" value="<?php echo get_media_id('slideshow', '1537843188', 'link'); ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
              <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=img_slider_4">Duyệt ảnh</button>
            </div>
            <div class="form-group">
              <label for="slider_5">Ảnh 5</label>
              <input type="hidden" name="id_slider_5" value="1537843189">
              <input type="text" class="form-control" name="title_slider_5" id="title_slider_5" value="<?php echo get_media_id('slideshow', '1537843189', 'title'); ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_5" id="url_slider_5" value="<?php echo get_media_id('slideshow', '1537843189', 'data'); ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_5" id="img_slider_5" value="<?php echo get_media_id('slideshow', '1537843189', 'link'); ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
              <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=img_slider_5">Duyệt ảnh</button>
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
        <iframe  width="100%" height="350" frameborder="0" src=""></iframe>
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

  $(document).ready(function(){
   $(".showModal").click(function(e){
     e.preventDefault();
     var url = $(this).attr("data-href");
     $("#selectFile iframe").attr("src", url);
     $("#selectFile").modal("show");
     // alert(url);
   });
   $("form").submit(function(){
     // alert($("#customize").serialize());
     var url="<?php echo base_url('admin/settings/update_slideshow')?>";
     var form="#customize";
     var callback="#alert-ajax";
     makeAjaxCall(url, form, callback);
   });
  });
</script>
