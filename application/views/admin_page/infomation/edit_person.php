<!-- Dành cho thông tin có dạng từ năm này đến năm khác (thể loại cấp 1) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin cá nhân
    <small>Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
        <form role="form" id="add-person" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <input type="hidden" name="policy" value="public">
              <label for="type">Loại</label>
              <select class="form-control" name="type">
                <option value="dob">Sinh nhật</option>
                <option value="gender">Giới tính</option>
                <option value="email">Email</option>
                <option value="phone">Điện thoại</option>
                <option value="website">Website</option>
                <option value="address">Địa chỉ</option>
                <option value="info">Thông tin khác</option>
              </select>
            </div>
            <div class="form-group">
              <label>Sinh nhật</label>
              <input type="date" class="form-control" name="dob" id="dob" placeholder="Nhập sinh nhật">
            </div>
            <div class="form-group">
              <label>Sinh nhật</label>
              <input type="text" class="form-control" name="content" id="content" placeholder="Nhập thông tin">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="form-control btn btn-primary">Lưu </button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- Load javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#add-person").serialize());
      var url="<?php echo base_url('canbo/admin/infomation/add_new_processing');?>";
      var form="#add-person";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
