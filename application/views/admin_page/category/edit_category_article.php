<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thể loại
    <small>Chỉnh sửa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
              <input type="hidden" name="type" id="type" value="article">
              <input type="hidden" name="id" id="id" value="<?php echo $category['CATEID']; ?>">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $category['USERID']; ?>">
              <input type="hidden" name="level_cate" id="level_cate" value="<?php echo $category['CATELEVEL']; ?>">
              <input type="text" class="form-control" name="name_cate" id="name_cate" value="<?php echo $category['CATENAME']; ?>" placeholder="Nhập tên thể loại">
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
              <label for="href">Thẻ liên kết (tùy chọn)</label>
              <input type="text" class="form-control" name="href" id="href" value="<?php echo $category['CATEHREF']; ?>" placeholder="Nhập thẻ liên kết">
            </div>
            <div class="form-group">
              <label for="policy">Quyền xem</label><br>
              <input type="radio" name="policy" value="public"<?php echo ($category['CATEPOLICY']=='public') ? ' checked' : ''; ?>> Công cộng <br>
              <!-- <input type="radio" name="policy" value="private"<?php echo ($category['CATEPOLICY']=='private') ? ' checked' : ''; ?>> Riêng tư <br> -->
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
      var url="<?php echo base_url('canbo/admin/category/edit_category_processing')?>";
      var form="#edit-category";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
