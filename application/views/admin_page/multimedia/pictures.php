<style media="screen">
input:checked ~ label {
  opacity: 0.5;
}

label.checked {
    opacity: 0.5;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Plugin Hình ảnh
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Pictures</li>
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
          <h3 class="box-title">Hình ảnh</h3>
          <div id="alert-ajax"></div>
        </div>
        <!-- /.box-header -->

        <!-- form start -->
        <form role="form" id="customize_picture" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="picture">Thêm ảnh</label>
              <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['user']['USERID']; ?>">
              <input type="text" class="form-control image" name="picture" id="picture" value="" placeholder="Chọn ảnh hoặc nhập liên kết ảnh"/>
              <button type="button" id="fancybox" class="form-control" data-toggle="modal" data-target="#selectFile">Duyệt ảnh</button>
            </div>
            <div class="form-group">
              <label for="policy">Quyền xem</label><br>
              <input type="radio" name="policy" value="public" checked> Công cộng <br>
              <input type="radio" name="policy" value="only_me"> Chỉ mình tôi <br>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </form>
        <hr>

        <!-- form pictures list -->
        <form role="form" id="delete_picture" method="post">
          <div class="box-body">
            <div class="form-group">
              <label>Danh sách ảnh</label><br>
              <button type="submit" class="btn btn-danger">Xóa hình ảnh</button>
              <label class="btn btn-warning">
          	    <input class="hidden" type="checkbox" id="delete_all" onClick="checkall(this,'field[]')"/>
                Chọn xóa tất cả hình ảnh
              </label>
            </div>
            <div class="form-group row">
              <?php
                $i=1;
                foreach ($lastupdate as $key => $pic) {
                  // code...
                  echo '<div class="col-md-3">
                    <input type="checkbox" name="field[]" value="'.$pic['MEDIAID'].'" id="img'.$i.'" name="img'.$i.'" />
                    <label for="img'.$i.'">
                      <img class="img" src="'.$pic['MEDIALINK'].'" alt="Picture" style="width: 98%; height: 196px"/>
                    </label>
                  </div>';
                  $i++;
                }
              ?>
            </div>
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
        <iframe  width="100%" height="350" frameborder="0" src="<?php echo base_url('public/filemanager/dialog.php?type=1&field_id=picture');?>"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
  // Checkall Function for checkbox
  function checkall(source,name) {
    checkboxes = document.getElementsByName(name);
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
  }

  function close_window() {
    parent.$.fancybox.close();
  }

  function responsive_filemanager_callback(field_id){
    // console.log(field_id);
    var url=jQuery('#'+field_id).val();
    // alert('update '+field_id+" with "+url);
    //your code
  }

  $(document).ready(function(){
    /*  support in ie8 */

    $('#img1').click(function () {
        $('label[for=' + this.id + ']').toggleClass('checked');
    });

   // $(".showModal").click(function(e){
   //   // e.preventDefault();
   //   // var url = $(this).attr("data-href");
   //   // $("#selectFile iframe").attr("src", url);
   //   $("#selectFile").modal("show");
   //   // alert(url);
   // });
   $("#customize_picture").submit(function(){
     // alert($("#customize_picture").serialize());
     var url="<?php echo base_url('canbo/admin/multimedia/add_picture');?>";
     var form="#customize_picture";
     var callback="#alert-ajax";
     makeAjaxCall(url, form, callback);
   });
   $("#delete_picture").submit(function(){
     // alert($("#delete_picture").serialize());
     var url="<?php echo base_url('canbo/admin/multimedia/delete_picture');?>";
     var form="#delete_picture";
     var callback="#alert-ajax";
     makeAjaxCall(url, form, callback);
   });
  });
</script>
