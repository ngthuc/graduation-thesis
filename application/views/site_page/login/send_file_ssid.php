<!DOCTYPE html>
<html lang="en" >
  <head>
    <script src="<?=base_url('public/themes/login_standard/js/jquery.min.js');?>" charset="utf-8"></script>
    <script>
      function sendAjax(subfolder) {
        $.ajax({
            type: "post",
            url: "<?=base_url('public/filemanager/auth.php?method=post');?>",
            cache: false,
            data: {subfolder : subfolder},
            success: function(json){
              var obj = jQuery.parseJSON(json);
              // alert(obj['CODE']);
              if(obj['CODE']=='200') {
                window.location.replace("<?=base_url('home'); ?>");
              } else if(obj['CODE']=='404') {
                window.location.replace("<?=base_url('canbo/send_ssid'); ?>");
              } else if(obj['CODE']=='500') {
                window.location.replace("<?=base_url(); ?>");
              }
            }
        });
      }
    </script>
  </head>
  <body onload="sendAjax('<?=$sub_folder;?>');"></body>
</html>
