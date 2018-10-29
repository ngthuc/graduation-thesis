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
              <input type="text" class="form-control" name="title_slider_1" id="title_slider_1" value="<?php echo (isset($mostview[0]['ARTICLETITLE'])) ? $mostview[0]['ARTICLETITLE'] : null; ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_1" id="url_slider_1" value="<?php
              echo (isset($mostview[0]['ARTICLETITLE'])) ? base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_vi($mostview[0]['ARTICLETITLE']).'.html') : null;
              ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_1" id="img_slider_1" value="<?php echo (isset($mostview[0]['ARTICLETITLE'])) ? $mostview[0]['ARTICLEIMAGE'] : null; ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
            </div>
            <div class="form-group">
              <label for="slider_2">Ảnh 2</label>
              <input type="hidden" name="id_slider_2" value="1537843186">
              <input type="text" class="form-control" name="title_slider_2" id="title_slider_2" value="<?php echo (isset($mostview[1]['ARTICLETITLE'])) ? $mostview[1]['ARTICLETITLE'] : null; ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_2" id="url_slider_2" value="<?php
              echo (isset($mostview[1]['ARTICLETITLE'])) ? base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_vi($mostview[1]['ARTICLETITLE']).'.html') : null;
              ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_2" id="img_slider_2" value="<?php echo (isset($mostview[1]['ARTICLETITLE'])) ? $mostview[1]['ARTICLEIMAGE'] : null; ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
            </div>
            <div class="form-group">
              <label for="slider_3">Ảnh 3</label>
              <input type="hidden" name="id_slider_3" value="1537843187">
              <input type="text" class="form-control" name="title_slider_3" id="title_slider_3" value="<?php echo (isset($mostview[2]['ARTICLETITLE'])) ? $mostview[2]['ARTICLETITLE'] : null; ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_3" id="url_slider_3" value="<?php
              echo (isset($mostview[2]['ARTICLETITLE'])) ? base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_vi($mostview[2]['ARTICLETITLE']).'.html') : null;
              ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_3" id="img_slider_3" value="<?php echo (isset($mostview[2]['ARTICLETITLE'])) ? $mostview[2]['ARTICLEIMAGE'] : null; ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
            </div>
            <div class="form-group">
              <label for="slider_4">Ảnh 4</label>
              <input type="hidden" name="id_slider_4" value="1537843188">
              <input type="text" class="form-control" name="title_slider_4" id="title_slider_4" value="<?php echo (isset($mostview[3]['ARTICLETITLE'])) ? $mostview[3]['ARTICLETITLE'] : null; ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_4" id="url_slider_4" value="<?php
              echo (isset($mostview[3]['ARTICLETITLE'])) ? base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_vi($mostview[3]['ARTICLETITLE']).'.html') : null;
              ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_4" id="img_slider_4" value="<?php echo (isset($mostview[3]['ARTICLETITLE'])) ? $mostview[3]['ARTICLEIMAGE'] : null; ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
            </div>
            <div class="form-group">
              <label for="slider_5">Ảnh 5</label>
              <input type="hidden" name="id_slider_5" value="1537843189">
              <input type="text" class="form-control" name="title_slider_5" id="title_slider_5" value="<?php echo (isset($mostview[4]['ARTICLETITLE'])) ? $mostview[4]['ARTICLETITLE'] : null; ?>" placeholder="Nhập tiêu đề ảnh"/>
              <input type="text" class="form-control" name="url_slider_5" id="url_slider_5" value="<?php
              echo (isset($mostview[4]['ARTICLETITLE'])) ? base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_vi($mostview[4]['ARTICLETITLE']).'.html') : null;
              ?>" placeholder="Nhập liên kết nội dung của ảnh"/>
              <input type="text" class="form-control image" name="img_slider_5" id="img_slider_5" value="<?php echo (isset($mostview[4]['ARTICLETITLE'])) ? $mostview[4]['ARTICLEIMAGE'] : null; ?>" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
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

<!-- Load ajax -->
<script type="text/javascript">
  $(document).ready(function(){
   $("form").submit(function(){
     // alert($("#customize").serialize());
     var url="<?php echo base_url('admin/settings/update_slideshow')?>";
     var form="#customize";
     var callback="#alert-ajax";
     makeAjaxCall(url, form, callback);
   });
  });
</script>
