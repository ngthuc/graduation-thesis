<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Đổi mật khẩu
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Tài khoản</li>
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
          <h3 class="box-title">Tài khoản: <?php echo $user['USERID']; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="new-pwd" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="newpwd">Mật khẩu mới</label>
              <input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="Nhập mật khẩu mới" required>
            </div>
            <div class="form-group">
              <label for="repeat">Nhập lại mật khẩu mới</label>
              <input type="password" class="form-control" name="repeat" id="repeat" placeholder="Nhập lại mật khẩu mới" required>
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
  // Login
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("form").serialize());
      var url="<?php echo base_url('canbo/admin/profile/newpwd_processing')?>";
      var form="form";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
