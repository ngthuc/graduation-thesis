<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tài khoản
    <small>Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Thêm tài khoản</li>
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
          <h3 class="box-title">Thêm một tài khoản mới</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="add-account" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="user_id">Tên tài khoản</label>
              <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Nhập tên tài khoản" required>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
              <label for="fullname">Tên đầy đủ</label>
              <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nhập tên đầy đủ">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email" required>
            </div>
            <div class="form-group">
              <label for="permissions">Quyền hạn</label>
              <select class="form-control" name="permissions">
                <option value="admin" selected>Quản trị viên</option>
                <option value="user">Người dùng</option>
              </select>
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
      var url="<?php echo base_url('canbo/admin/accounts/add_new_processing')?>";
      var form="#add-account";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
