<!-- Dành cho thông tin có dạng từ năm này đến năm khác (thể loại cấp 1) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin cá nhân
    <small>Chính sửa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Thông tin cá nhân</li>
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
          <h3 class="box-title">Chỉnh sửa thông tin cá nhân</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="edit-person" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $info['INFOID']; ?>">
              <input type="hidden" name="policy" value="public">
              <label for="type">Loại</label>
              <select class="form-control" name="type">
                <option value="dob"<?=($info['INFOTYPE']=='dob') ? ' selected' : '';?>>Sinh nhật</option>
                <option value="gender"<?=($info['INFOTYPE']=='gender') ? ' selected' : '';?>>Giới tính</option>
                <option value="email"<?=($info['INFOTYPE']=='email') ? ' selected' : '';?>>Email</option>
                <option value="phone"<?=($info['INFOTYPE']=='phone') ? ' selected' : '';?>>Điện thoại</option>
                <option value="website"<?=($info['INFOTYPE']=='website') ? ' selected' : '';?>>Website</option>
                <option value="address"<?=($info['INFOTYPE']=='address') ? ' selected' : '';?>>Địa chỉ</option>
                <option value="infomations"<?=($info['INFOTYPE']=='infomations') ? ' selected' : '';?>>Thông tin khác</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Sinh nhật</label>
                <input type="date" class="form-control" name="dob" id="dob" value="<?=($info['INFOTYPE']=='dob') ? $info['INFODATE'] : '';?>" placeholder="Nhập sinh nhật">
                <p><i style="color:red">Khả dụng với loại sinh nhật</i></p>
              </div>
              <div class="col-md-6">
                <label>Giới tính</label>
                <select class="form-control" name="gender">
                  <option value="Male"<?=($info['INFOTYPE']=='gender' && $info['INFOCONTENT'] == 'Male') ? ' selected' : '';?>> Nam </option>
                  <option value="Female"<?=($info['INFOTYPE']=='gender' && $info['INFOCONTENT'] == 'Female') ? ' selected' : '';?>> Nữ </option>
                  <option value="Other"<?=($info['INFOTYPE']=='gender' && $info['INFOCONTENT'] == 'Other') ? ' selected' : '';?>> Khác </option>
                </select>
                <p><i style="color:red">Khả dụng với loại giới tính</i></p>
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?=($info['INFOTYPE']=='email') ? $info['INFOCONTENT'] : '';?>" placeholder="Nhập email">
              <p><i style="color:red">Khả dụng với loại email</i></p>
            </div>
            <div class="form-group">
              <label>Thông tin</label>
              <input type="text" class="form-control" name="content" id="content" value="<?=($info['INFOTYPE']!='dob' || $info['INFOTYPE']!='gender' || $info['INFOTYPE']!='email') ? $info['INFOCONTENT'] : '';?>" placeholder="Nhập thông tin">
              <p><i style="color:red">Khả dụng với các loại còn lại</i></p>
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
      // alert($("#edit-person").serialize());
      var url="<?php echo base_url('canbo/admin/infomation/edit_info_processing/');?>";
      var form="#edit-person";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
