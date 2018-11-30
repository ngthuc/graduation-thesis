<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Điều hướng
    <small>Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Thêm điều hướng</li>
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
          <h3 class="box-title">Thêm một điều hướng</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="add-menu" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="name">Tên điều hướng</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên điều hướng">
            </div>
            <div class="form-group">
              <label for="link">Đường dẫn</label>
              <input type="text" class="form-control" name="link" id="link" placeholder="Nhập đường dẫn liên kết">
            </div>
            <div class="form-group">
              <label for="parent">Lớp cha</label>
              <select class="form-control select2" style="width: 100%;" name="parent">
                <option selected="selected" value="0">-- <i>Điều hướng gốc</i> --</option>
                <?php
                // foreach ($categories as $key => $row) {
                // echo '<option value="'.$row['MENUID'].'">';
                //   for($i=1;$i<=$row['MENULEVEL'];$i++) {
                //     if($i==1) echo '';
                //     else echo '|---';
                //   }
                //   echo $row['MENUNAME'].'</option>
                //   ';
                // }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="type">Kiểu</label><br>
                <input type="radio" name="type" value="primary" checked> Điều hướng chính
                <input type="radio" name="type" value="submenu"> Điều hướng trang con
              </label>
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
      // alert($("#add-menu").serialize());
      var url="<?php echo base_url('canbo/admin/themes/add_menu_processing');?>";
      var form="#add-menu";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
