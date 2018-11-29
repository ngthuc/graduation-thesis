<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin
    <small>Chỉnh sửa thông tin</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Chỉnh sửa thông tin</li>
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
          <h3 class="box-title">Chỉnh sửa thông tin: <?php echo $info['INFOTITLE']; ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="edit-info" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $info['INFOID']; ?>">
              <input type="hidden" name="policy" value="public">
              <label for="category">Thể loại</label>
              <select class="form-control select2" style="width: 100%;" name="category" required>
                <?php
                  foreach ($cate as $key => $row) {
                    echo ($info['CATEID'] == $row['CATEID']) ? '<option value="'.$row['CATEID'].'" selected>'.$row['CATENAME'].'</option>' : '<option value="'.$row['CATEID'].'">'.$row['CATENAME'].'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="name_info">Tên thông tin</label>
              <input type="text" class="form-control" name="name_info" id="name_info" value="<?=$info['INFOTITLE']?>" placeholder="Nhập tên thông tin" required>
            </div>
            <div class="form-group">
              <label>Thời gian</label><br>
              <div class="col-sm-6">
                Từ
                <?php if($info['INFOTYPE'] != 'education' || $info['INFOTYPE'] != 'distinction' || $info['INFOTYPE'] != 'research' || $info['INFOTYPE'] != 'experience') {
                  echo '<input type="text" class="form-control" name="time" id="time" value="'.get_date_data($info['INFODATE']).'" placeholder="Nhập năm bắt đầu" required>';
                } else {
                  echo '<input type="date" class="form-control" name="time" id="time" value="'.$info['INFODATE'].'" placeholder="Nhập năm bắt đầu" required>';
                }
                ?>
              </div>
              <div class="col-sm-6">
                đến
               <?=($info['INFOTYPE'] == 'research' || $info['INFOTYPE'] == 'experience') ? '<input type="text" class="form-control" name="to_year" id="to_year" value="'.get_date_data($info['INFODATE'],1).'" placeholder="Nhập năm kết thúc (chỉ yêu cầu nếu trình bày theo năm - năm)">' : '<input type="text" class="form-control" name="to_year" id="to_year" placeholder="Nhập năm kết thúc (chỉ yêu cầu nếu trình bày theo năm - năm)">'; ?>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="content">Nội dung thông tin</label>
                  <textarea name="content" id="content" value="<?=$info['INFOCONTENT']?>" width="100%"></textarea>
                </div>
                <div class="col-md-4">
                  <label for="type">Loại</label>
                  <select class="form-control" name="type">
                    <!-- Hiển thị timeline -->
                    <option value="education"<?=($info['INFOTYPE']=='education') ? ' selected' : '';?>>Giáo dục/Học vị</option>
                    <option value="distinction"<?=($info['INFOTYPE']=='distinction') ? ' selected' : '';?>>Sự phân biệt</option>
                    <!-- Hiển thị kiểu year-year -->
                    <option value="research"<?=($info['INFOTYPE']=='research') ? ' selected' : '';?>>Nghiên cứu</option>
                    <option value="experience"<?=($info['INFOTYPE']=='experience') ? ' selected' : '';?>>Kinh nghiệm</option>
                    <!-- Hiển thị kiểu công bố -->
                    <option value="isi"<?=($info['INFOTYPE']=='isi') ? ' selected' : '';?>>Công bố: ISI/Scopus</option>
                    <option value="journal"<?=($info['INFOTYPE']=='journal') ? ' selected' : '';?>>Công bố: Journal, book chapter</option>
                    <option value="edited"<?=($info['INFOTYPE']=='edited') ? ' selected' : '';?>>Công bố: Edited book</option>
                    <option value="conference"<?=($info['INFOTYPE']=='conference') ? ' selected' : '';?>>Công bố: Conference, workshop</option>
                    <option value="report"<?=($info['INFOTYPE']=='report') ? ' selected' : '';?>>Công bố: Technical report</option>
                    <option value="thesis"<?=($info['INFOTYPE']=='thesis') ? ' selected' : '';?>>Công bố: Thesis</option>
                    <!-- Hiển thị kiểu dịch vụ -->
                    <option value="workshop"<?=($info['INFOTYPE']=='workshop') ? ' selected' : '';?>>Dịch vụ: Workshop Organization</option>
                    <option value="reviewer"<?=($info['INFOTYPE']=='reviewer') ? ' selected' : '';?>>Dịch vụ: Program committee member, reviewer</option>
                    <option value="seminars"<?=($info['INFOTYPE']=='seminars') ? ' selected' : '';?>>Dịch vụ: Invited seminars</option>
                    <option value="doctor"<?=($info['INFOTYPE']=='doctor') ? ' selected' : '';?>>Dịch vụ: Ph.D. Defense Committee</option>
                  </select>
                  <!-- <label for="avatar_post">Ảnh minh họa (tùy chọn)</label><br>
                  <div class="col-sm-6">
                    <img id="review" src="<?php echo base_url('spsim_media/default-image.jpg'); ?>" style="width: 150px" alt="Ảnh thu nhỏ">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="image" id="image" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                    <button type="button" id="fancybox" class="form-control" data-toggle="modal" data-target="#selectFile">Duyệt ảnh</button>
                  </div> -->
                  <div class="col-sm-12">
                    <hr>
                    <button type="submit" class="form-control btn btn-primary">Lưu </button>
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
      // alert($("#add-info").serialize());
      var url="<?php echo base_url('canbo/admin/infomation/edit_info_processing');?>";
      var form="#edit-info";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
