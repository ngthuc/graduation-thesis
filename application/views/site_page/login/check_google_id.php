<?php (isset($_SESSION['user'])) ? redirect(base_url('canbo/check_ssid')) : ''; ?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Login/Sign-In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?=base_url('public/css/style.css');?>">
    <script src="https://apis.google.com/js/api:client.js"></script>

    <script>
      var googleUser = {};

      var startApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '342172836917-qa6ng9v5egrcc3822oq5rvvotqmbmrbj.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin'
          });
          attachSignin(document.getElementById('Google_Auth'));
        });
      };

      function attachSignin(element) {
        // console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
              callAjaxAuth(googleUser.getBasicProfile().getName(),googleUser.getBasicProfile().getEmail());
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
      }

      function callAjaxAuth(name,email) {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('canbo/auth');?>",
            cache: false,
            data : {
                name : name,
                email : email
            },
            success: function(json){
              var obj = jQuery.parseJSON(json);
              var string_alert;
              if(obj['STATUS']=='success') {
                // success
                window.setTimeout(function(){location.reload()},0);
              } else {
                window.location.href = "<?=base_url('canbo/login');?>";
              }
            }
        });
      }
    </script>
  </head>
  <body onload="checkgsid();">
    <div id="gSignInWrapper">
      <div class="logmod__alter customGPlusSignIn" id="Google_Auth"></div>
    </div>
    <script>startApp();</script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?=base_url('public/js/index.js');?>"></script>
    <script src="<?=base_url('public/themes/login_standard/js/jquery.min.js');?>" charset="utf-8"></script>
    <script type="text/javascript">
      function checkgsid(){
        $('#Google_Auth').click();
      }
    </script>
  </body>
</html>
