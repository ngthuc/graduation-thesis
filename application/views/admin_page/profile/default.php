<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin tài khoản
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
            <div class="form-group">
              <label for="user_id">Tên tài khoản</label>
              <input type="text" class="form-control" name="uid" id="uid" value="<?php echo $user['USERID']; ?>" placeholder="Nhập tên tài khoản" readonly>
            </div>
            <div class="form-group">
              <label for="fullname">Tên đầy đủ</label>
              <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $user['USERFULLNAME']; ?>" placeholder="Nhập tên đầy đủ" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['USEREMAIL']; ?>" placeholder="Nhập địa chỉ email" required>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Email liên quan</label>
                <input type="email" class="form-control" value="<?php echo $user['SUBEMAIL']; ?>" disabled>
              </div>
              <div class="col-md-6">
                <label>Quyền hạn</label>
                <input type="text" class="form-control" value="<?php echo ($user['USERROLE']=='admin') ? 'Quản trị viên' : (($user['USERROLE']=='user') ? 'Người dùng' : ''); ?>" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <label>Trường</label>
                <select class="form-control" name="school" id="school" required>
                  <?php
                    $schools = $this->Mschool->getList('sort','SCHNICKNAME','ASC');
                    foreach ($schools as $key => $school) {
                      // code...
                      if($user['SCHID']==$school['SCHID']) {
                        echo '<option value="'.$school['SCHID'].'" selected>'.$school['SCHNAME'].'</option>';
                      } else {
                        echo '<option value="'.$school['SCHID'].'">'.$school['SCHNAME'].'</option>';
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-4">
                <label>Khoa/viện/phòng ban</label>
                <select class="form-control" name="faculty" id="faculty" required>
                  <?php
                    $faculties = $this->Mfaculty->getList('sort','FACNICKNAME','ASC');
                    foreach ($faculties as $key => $faculty) {
                      // code...
                      if($user['FACID']==$faculty['FACID']) {
                        echo '<option value="'.$faculty['FACID'].'" selected>'.$faculty['FACNAME'].'</option>';
                      } else {
                        echo '<option value="'.$faculty['FACID'].'">'.$faculty['FACNAME'].'</option>';
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-4">
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
      // alert($("#edit-profile").serialize());
      var url="<?php echo base_url('canbo/admin/profile/edit_profile')?>";
      var form="#edit-profile";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
