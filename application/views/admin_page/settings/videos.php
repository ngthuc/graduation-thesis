<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Plugin video
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Video</li>
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
          <h3 class="box-title">Videos</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="customize" method="post">
          <div class="box-body">
            <div id="alert-ajax"></div>
            <input type="hidden" name="1" value="videos_url">
            <h4>Đường dẫn Video clip</h4>
            <div class="form-group">
              <input type="text" class="form-control" name="videos_url" id="videos" value="<?php echo get_media('video','videos_url'); ?>" placeholder="Nhập url videos"/>
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
     var url="<?php echo base_url('admin/settings/update_videos')?>";
     var form="#customize";
     var callback="#alert-ajax";
     makeAjaxCall(url, form, callback);
   });
  });
</script>
