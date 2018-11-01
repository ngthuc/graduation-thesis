<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Trang
    <small>Thêm mới</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
          <h3 class="box-title">Thêm mới một trang</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="add-post" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label for="title_post">Tiêu đề bài viết</label>
                  <input type="hidden" name="id" id="id" value="<?php echo time(); ?>">
                  <input type="hidden" name="type" id="type" value="page">
                  <input type="hidden" name="timestamp" id="timestamp" value="<?php echo date('Y-m-d H:m:s'); ?>">
                  <input type="text" class="form-control" name="title_post" id="title_post" placeholder="Nhập tiêu đề bài viết">
                  <label for="post_content">Nội dung bài viết</label>
                  <center>
                    <textarea name="post_content" id="post_content"></textarea>
                  </center>
                </div>
                <div class="col-sm-4">
                  <label for="category">Thể loại</label>
                  <select class="form-control select2" style="width: 100%;" name="category" required>
                    <?php
                      foreach ($parent_cate as $key => $row) {
                      echo '<option value="'.$row['CATEID'].'">';
                        for($i=1;$i<=$row['CATELEVEL'];$i++) {
                          if($i==1) echo '';
                          else echo '|---';
                        }
                        echo $row['CATENAME'].'</option>
                        ';
                      }
                    ?>
                  </select>
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Nhập mô tả bài viết">
                  <hr>
                  <button type="submit" class="form-control btn btn-primary">Lưu & xuất bản</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <!-- <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu & xuất bản</button>
          </div> -->
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<?php // var_dump($parent_cate); ?>

<!-- Load javascript -->
<script type="text/javascript">
  makeTinymce('textarea');

  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#add-post").serialize());
      var url="<?php echo base_url('admin/article/add_new_processing')?>";
      var form="#add-post";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
