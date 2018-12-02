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

      // Signin
      var startApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '342172836917-qa6ng9v5egrcc3822oq5rvvotqmbmrbj.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignin(document.getElementById('Google_Auth'));
        });
      };

      function attachSignin(element) {
        // console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
              // document.getElementById('name').innerText = "Signed in: " +
              //     googleUser.getBasicProfile().getName();
              // alert(googleUser.getBasicProfile().getName() + ' - ' + googleUser.getBasicProfile().getEmail());
              callAjaxAuth(googleUser.getBasicProfile().getName(),googleUser.getBasicProfile().getEmail());
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
      }

      // Signup
      var regApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '342172836917-qa6ng9v5egrcc3822oq5rvvotqmbmrbj.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignup(document.getElementById('Reg_Google'));
        });
      };

      function attachSignup(element) {
        // console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
              // document.getElementById('name').innerText = "Signed in: " +
              //     googleUser.getBasicProfile().getName();
              // alert(googleUser.getBasicProfile().getName() + ' - ' + googleUser.getBasicProfile().getEmail());
              callAjaxReg(googleUser.getBasicProfile().getName(),googleUser.getBasicProfile().getEmail());
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
      }

      function callAjaxReg(name,email) {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('canbo/reg');?>",
            cache: false,
            data : {
                name : name,
                email : email
            },
            success: function(json){
              var obj = jQuery.parseJSON(json);
              $(".alert-reg").html('<span>'+obj['MESSAGE']+'</span>');
              window.setTimeout(function(){location.reload()},2000);
            }
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
                $("#alert-info").html('<span>'+obj['MESSAGE']+'</span>');
                window.setTimeout(function(){location.reload()},2000);
              } else {
                string_alert = '<span>Email lạ. <a href="#" onclick="'+"callAjaxReg('"+name+"','"+email+"'"+');">Gửi yêu cầu kích hoạt email ngay!</a></span>';
                $("#alert-info").html(string_alert);
              }
            }
        });
      }

      function callAjaxLogin(){
        $.ajax({
          type: "post",
          url: "<?php echo base_url('canbo/auth')?>",
          cache: false,
          data: $("#signinform").serialize(),
          success: function(json){
            var obj = jQuery.parseJSON(json);
            $("#alert-info").html('<span>'+obj['MESSAGE']+'</span>');
            window.setTimeout(function(){location.reload()},2000);
          }
        });
      }
    </script>
  </head>
  <body>
    <div class="logmod">
      <div class="logmod__wrapper">
        <!-- <span class="logmod__close">Close</span> -->
        <div class="logmod__container" id="gSignInWrapper">
          <ul class="logmod__tabs">
            <li data-tabtar="lgm-2"><a href="#">Đăng nhập</a></li>
            <li data-tabtar="lgm-1" id="Reg_Google"><a href="#">Đăng ký</a></li>
            <!-- <li data-tabtar="lgm-2"></li> -->
          </ul>
          <div class="logmod__tab-wrapper">
            <div class="logmod__tab lgm-1">
              <div class="logmod__heading">
                <span class="logmod__heading-subtitle">Tạo một tài khoản <strong>với Google</strong></span>
                <div class="alert-reg"></div>
              </div>
              <div class="logmod__alter">
                <div class="logmod__alter-container">
                  <a href="#" class="connect googleplus">
                    <div class="connect__icon">
                      <i class="fa fa-google-plus"></i>
                    </div>
                    <div class="connect__context">
                      <span>Tạo một tài khoản <strong>với Google</strong></span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="logmod__tab lgm-2">
              <div class="logmod__heading">
                <span class="logmod__heading-subtitle">Nhập tài khoản và mật khẩu <strong>để đăng nhập</strong></span>
                <div id="alert-info" class="alert-reg"></div>
              </div>
              <div class="logmod__form">
                <!-- Only Debug -->
                <!-- <form accept-charset="utf-8" id="signinform" method="post" class="simform" action="<?php echo base_url('auth')?>"> -->
                <!-- End Debug -->
                <form accept-charset="utf-8" id="signinform" method="post" class="simform">
                  <div class="sminputs">
                    <div class="input full">
                      <label class="string optional" for="user-name">Tên đăng nhập*</label>
                      <input class="string optional" maxlength="255" name="username" id="user-name" placeholder="Username" type="text" size="50" />
                    </div>
                  </div>
                  <div class="sminputs">
                    <div class="input full">
                      <label class="string optional" for="user-pw">Mật khẩu *</label>
                      <input class="string optional" maxlength="255" name="password" id="user-pw" placeholder="Password" type="password" size="50" />
                      <span class="hide-password">Hiện</span>
                    </div>
                  </div>
                  <div class="simform__actions">
                    <!-- <input class="sumbit" name="commit" type="sumbit" value="Log In" /> -->
                    <button class="sumbit" type="button" id="commit" name="commit">Đăng nhập</button>
                    <!-- <a href="#" onclick="signOut();">Sign out</a> -->
                  </div>
                </form>
              </div>
              <div class="logmod__alter customGPlusSignIn" id="Google_Auth">
                <div class="logmod__alter-container">
                  <div class="connect googleplus">
                    <div class="connect__icon">
                      <i class="fa fa-google-plus"></i>
                    </div>
                    <div class="connect__context">
                      <span>Đăng nhập với <strong>Google</strong></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>regApp();</script>
    <script>startApp();</script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?=base_url('public/js/index.js');?>"></script>
    <script src="<?=base_url('public/themes/login_standard/js/jquery.min.js');?>" charset="utf-8"></script>
    <script src="<?php echo base_url('public/libraries/notify.js/notify.min.js'); ?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#commit").click(function(){
          // alert($("#signinform").serialize());
          callAjaxLogin();
        });
        $( "#signinform" ).keypress(function( event ) {
          if ( event.which == 13 ) {
             //code here
             //13 represents Enter key
             callAjaxLogin();
          }
        });
      });
    </script>
  </body>
</html>
