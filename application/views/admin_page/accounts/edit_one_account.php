<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tài khoản
    <small>Chỉnh sửa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Chỉnh sửa tài khoản</li>
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
          <h3 class="box-title">Chỉnh sửa tài khoản: <?php echo $account['USERID']; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="edit-account" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="user_id">Tên tài khoản</label>
              <input type="hidden" class="hidden" name="uid" id="uid" value="<?php echo $account['USERID']; ?>" placeholder="Nhập tên tài khoản" readonly>
              <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $account['USERID']; ?>" placeholder="Nhập tên tài khoản">
            </div>
            <div class="form-group">
              <label for="fullname">Tên đầy đủ</label>
              <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $account['USERFULLNAME']; ?>" placeholder="Nhập tên đầy đủ">
            </div>
            <div class="form-group">
              <label for="permissions">Quyền hạn</label>
              <select class="form-control" name="permissions">
                <option value="admin"<?php echo ($account['USERROLE']=='admin') ? ' selected' : ''; ?>>Quản trị viên</option>
                <option value="user"<?php echo ($account['USERROLE']=='user') ? ' selected' : ''; ?>>Người dùng</option>
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
      var url="<?php echo base_url('admin/accounts/edit_account_processing')?>";
      var form="#edit-account";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
