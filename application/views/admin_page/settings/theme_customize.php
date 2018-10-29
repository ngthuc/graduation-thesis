<?php $theme = 'bootstrap_blog_theme'; ?>
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                  <h4><?php echo $this->lang->line('text_theme_customize'); ?></h4>
                  <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <form method="post" id="customize">
                    <div id="alert-ajax"></div>
                    <input type="hidden" name="theme" value="bootstrap_blog_theme">
                    <input type="hidden" name="1" value="slider_1">
                    <input type="hidden" name="2" value="slider_2">
                    <input type="hidden" name="3" value="slider_3">
                    <h4>Slider</h4>
                    <div class="form-group row">
                      <label for="slider_1" class="col-4 col-form-label">Ảnh 1</label>
                      <div class="col-8">
                        <input type="text" class="form-control image" name="slider_1" id="slider_1" value="<?php echo get_theme_option('slider_1',$theme); ?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                        <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=slider_1">Duyệt ảnh</button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="slider_2" class="col-4 col-form-label">Ảnh 2</label>
                      <div class="col-8">
                        <input type="text" class="form-control image" name="slider_2" id="slider_2" value="<?php echo get_theme_option('slider_2',$theme); ?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                        <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=slider_2">Duyệt ảnh</button>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="slider_3" class="col-4 col-form-label">Ảnh 3</label>
                      <div class="col-8">
                        <input type="text" class="form-control image" name="slider_3" id="slider_3" value="<?php echo get_theme_option('slider_3',$theme); ?>" placeholder="Chọn ảnh hoặc nhập url ảnh"/>
                        <button type="button" id="fancybox" class="form-control showModal" data-href="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=slider_3">Duyệt ảnh</button>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit_theme'); ?></button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</div>

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
        <!-- <iframe  width="100%" height="350" frameborder="0" src="<?=base_url()?>public/filemanager/dialog.php?type=1&field_id=image"></iframe> -->
        <iframe  width="100%" height="350" frameborder="0" src=""></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Load ajax -->
<script type="text/javascript">
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
   $(".showModal").click(function(e){
     e.preventDefault();
     var url = $(this).attr("data-href");
     $("#selectFile iframe").attr("src", url);
     $("#selectFile").modal("show");
     // alert(url);
   });
  });

  // Update
  $(document).ready(function(){
    $("form").submit(function(){
      // alert($("#customize").serialize());
      var url="<?php echo base_url('article/theme_customize_processing')?>";
      var form="#customize";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
