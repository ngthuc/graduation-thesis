<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin tài khoản
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
        <form role="form" id="edit-profile" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
              <?php if(check_unit_by_user(get_id_logged())) {
                echo '<div class="alert alert-danger">Vui lòng cập nhập thông tin về đơn vị công tác (trường - khoa/viện - bộ môn)!</div>';
              } ?>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="user_id">Tên tài khoản</label>
                <input type="text" class="form-control" name="uid" id="uid" value="<?php echo $user['USERID']; ?>" placeholder="Nhập tên tài khoản" readonly>
              </div>
              <div class="col-md-6">
                <label for="fullname">Tên đầy đủ</label>
                <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $user['USERFULLNAME']; ?>" placeholder="Nhập tên đầy đủ" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['USEREMAIL']; ?>" placeholder="Nhập địa chỉ email">
              </div>
              <div class="col-md-6">
                <label>Email đăng nhập bổ sung</label>
                <input type="email" class="form-control" name="subemail" value="<?php echo $user['SUBEMAIL']; ?>" placeholder="Nhập địa chỉ email đăng nhập bổ sung">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Vị trí công tác</label>
                <input type="text" class="form-control" name="position" value="<?=$user['USERPOSITION'];?>" placeholder="Nhập vị trí công tác. Ví dụ: Lecturer at Department of Software Engineering">
              </div>
              <div class="col-md-6">
                <label>Quyền hạn</label>
                <input type="text" class="form-control" value="<?php echo ($user['USERROLE']=='admin') ? 'Quản trị viên' : (($user['USERROLE']=='user') ? 'Người dùng' : ''); ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label>Bộ môn/Tổ chuyên ngành</label>
              <select class="form-control" name="department" id="department" required>
                <?php
                  $departments = $this->Mdepartment->getList('sort','DEPTNICKNAME','ASC');
                  foreach ($departments as $key => $department) {
                    // code...
                    if($user['DEPTID']==$department['DEPTID']) {
                      echo '<option value="'.$department['DEPTID'].'" selected>'.$department['DEPTNAME'].'</option>';
                    } else {
                      echo '<option value="'.$department['DEPTID'].'">'.$department['DEPTNAME'].'</option>';
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group" id="avatar">
              <label>Hình ảnh</label>
              <div class="row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="avatar" id="image" value="<?=($user['USERAVATAR']!=null) ? $user['USERAVATAR'] : 'http://spsimct594.tk/spsim_media/user_avatar_default.jpg';?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                </div>
                <div class="col-sm-4">
                  <!-- Trigger the modal with a button -->
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
  function close_window() {
    parent.$.fancybox.close();
  }

  function responsive_filemanager_callback(field_id){
    var url=jQuery('#'+field_id).val();
  }

  // edit profile
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#edit-profile").serialize());
      var url="<?php echo base_url('canbo/admin/profile/edit_profile');?>";
      var form="#edit-profile";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
