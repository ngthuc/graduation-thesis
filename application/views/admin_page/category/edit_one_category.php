<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thể loại
    <small>Chỉnh sửa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Chỉnh sửa thể loại</li>
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
          <h3 class="box-title">Chỉnh sửa thể loại: <?php echo $category['CATENAME']; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="edit-category" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="name_cate">Tên thể loại</label>
              <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $category['CATEID']; ?>">
              <input type="hidden" name="id" id="id" value="<?php echo $category['CATEID']; ?>">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $category['USERID']; ?>">
              <input type="hidden" name="level_cate" id="level_cate" value="<?php echo $category['CATELEVEL']; ?>">
              <input type="text" class="form-control" name="name_cate" id="name_cate" value="<?php echo $category['CATENAME']; ?>" placeholder="Nhập tên thể loại">
            </div>
            <div class="form-group">
              <label for="eng_name_cate">Tên thể loại (English)</label>
              <input type="text" class="form-control" name="eng_name_cate" id="eng_name_cate" value="<?php echo $category['CATENAME_ENGLISH']; ?>" placeholder="Nhập tên thể loại bằng tiếng Anh">
            </div>
            <div class="form-group">
              <label for="parent_cate">Lớp cha</label>
              <select class="form-control select2" style="width: 100%;" name="parent_cate">
                <?php
                foreach ($categories as $key => $row) {
                  if($row['CATEID'] == $category['CAT_CATEID']) {
                    echo '<option value="'.$row['CATEID'].'" selected>';
                      for($i=1;$i<=$row['CATELEVEL'];$i++) {
                        if($i==1) echo '';
                        else echo '|---';
                      }
                      echo $row['CATENAME'].'</option>';
                  } else {
                    echo '<option value="'.$row['CATEID'].'">';
                      for($i=1;$i<=$row['CATELEVEL'];$i++) {
                        if($i==1) echo '';
                        else echo '|---';
                      }
                      echo $row['CATENAME'].'</option>';
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="type_cate">Kiểu thể loại</label><br>
                <input type="radio" name="type_cate" value="News"<?php echo ($category['CATETYPE']=='News') ? ' checked' : ''; ?>> Tin tức
                <input type="radio" name="type_cate" value="Conservation"<?php echo ($category['CATETYPE']=='Conservation') ? ' checked' : ''; ?>> Bảo tồn
              </label>
            </div>
            <div class="form-group">
              <label for="show_cate">Nổi bật</label><br>
              <input type="checkbox" name="show_cate"<?php echo ($category['CATESHOWMENU']=='1') ? ' checked' : ''; ?>> Hiển thị ra trang chủ
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
      var url="<?php echo base_url('admin/category/edit_category_processing')?>";
      var form="#edit-category";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
