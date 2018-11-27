<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thể loại
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
          <h3 class="box-title">Thêm một thể loại thông tin</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="add-category" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="name_cate">Tên thể loại</label>
              <input type="hidden" name="type" value="info">
              <input type="text" class="form-control" name="name_cate" id="name_cate" placeholder="Nhập tên thể loại">
            </div>
            <div class="form-group">
              <label for="href">Thẻ liên kết (tùy chọn)</label>
              <input type="text" class="form-control" name="href" id="href" placeholder="Nhập thẻ liên kết">
            </div>
            <div class="form-group">
              <label for="policy">Quyền xem</label><br>
              <input type="radio" name="policy" value="public" checked> Công cộng <br>
              <!-- <input type="radio" name="policy" value="private"> Riêng tư <br> -->
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
<!-- Load ajax -->
<script type="text/javascript">
  // Login
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#add-category").serialize());
      var url="<?php echo base_url('canbo/admin/category/add_new_processing')?>";
      var form="#add-category";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
