<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bài viết
    <small>Chỉnh sửa bài viết</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Chỉnh sửa bài viết</li>
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
          <h3 class="box-title">Chỉnh sửa bài viết: <?php echo '<a href="'.base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_vi($content['ARTICLETITLE']).'.html').'" target="_blank">'.$content['ARTICLETITLE'].'</a>'; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="edit-post" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label for="title_post">Tiêu đề bài viết</label>
                  <input type="hidden" name="post_id" id="post_id" value="<?php echo $content['ARTICLEID']; ?>">
                  <input type="hidden" name="id" id="id" value="<?php echo $content['ARTICLEID']; ?>">
                  <input type="hidden" name="author" id="author" value="<?php echo $content['USERID']; ?>">
                  <input type="hidden" name="count" id="count" value="<?php echo $content['ARTICLECOUNT']; ?>">
                  <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $content['ARTICLECREATIONDATE']; ?>">
                  <input type="text" class="form-control" name="title_post" id="title_post" value="<?php echo $content['ARTICLETITLE']; ?>" placeholder="Nhập tiêu đề bài viết">
                  <label for="post_content">Nội dung bài viết</label>
                  <center>
                    <textarea name="post_content" id="post_content"><?php echo $content['ARTICLECONTENT']; ?></textarea>
                  </center>
                </div>
                <div class="col-sm-4">
                  <label for="category">Thể loại</label>
                  <select class="form-control select2" style="width: 100%;" name="category" required>
                    <?php
                      foreach ($categories as $key => $row) {
                        if($row['CATEID'] == $content['CATEID']) {
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
                  <label for="type">Kiểu đăng</label>
                  <select class="form-control select2" style="width: 100%;" name="type" required>
                    <?php
                      echo '<option value="article"'; echo ($content['ARTICLETYPE'] == 'article') ? ' selected' : ''; echo '>Bài viết</option>
                      <option value="page"'; echo ($content['ARTICLETYPE'] == 'page') ? ' selected' : ''; echo '>Trang</option>';
                    ?>
                  </select>
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" name="description" id="description" value="<?php echo $content['ARTICLEDESCRIPTION']; ?>" placeholder="Nhập mô tả bài viết">
                  <hr>
                  <?php if($content['ARTICLETYPE'] == 'article') { ?>
                  <label for="avatar_post">Ảnh thu nhỏ bài viết</label>
                  <div class="row">
                    <div class="col-md-6">
                      <img id="review" src="<?php echo $content['ARTICLEIMAGE']; ?>" style="width: 150px" alt="Ảnh thu nhỏ">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="avatar_post" id="avatar_post" value="<?php echo $content['ARTICLEIMAGE']; ?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                      <hr>
                      <!-- Trigger the modal with a button -->
                      <button type="button" id="fancybox" class="form-control" data-toggle="modal" data-target="#selectFile">Duyệt ảnh</button>
                    </div>
                  </div>
                  <hr>
                  <?php } ?>
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
        <iframe  width="100%" height="350" frameborder="0" src="<?php echo base_url('public/filemanager/dialog.php?type=1&field_id=avatar_post'); ?>"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Load javascript -->
<script type="text/javascript">
  makeTinymce('textarea');

  function close_window() {
    parent.$.fancybox.close();
  }

  function responsive_filemanager_callback(field_id){
  	// console.log(field_id);
    var url=jQuery('#'+field_id).val();
  	$("#review").attr("src", url);
  	//your code
  }

  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#add-post").serialize());
      var url="<?php echo base_url('admin/posts/edit_post_processing')?>";
      var form="#edit-post";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
