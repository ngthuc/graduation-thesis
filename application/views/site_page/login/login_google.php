<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login with Google</title>

    <script src="https://apis.google.com/js/api:client.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url('public/themes/login_standard/js/jquery.min.js');?>" charset="utf-8"></script>

    <script>
      var googleUser = {};
      var startApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '342172836917-qa6ng9v5egrcc3822oq5rvvotqmbmrbj.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignin(document.getElementById('customBtn'));
        });
      };

      function attachSignin(element) {
        // console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
              document.getElementById('name').innerText = "Signed in: " +
                  googleUser.getBasicProfile().getName();
              // alert(googleUser.getBasicProfile().getName() + ' - ' + googleUser.getBasicProfile().getEmail());
              callAjaxAuth(googleUser.getBasicProfile().getName(),googleUser.getBasicProfile().getEmail());
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
      }

      function callAjaxAuth(name,email) {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('auth');?>",
            cache: false,
            data : {
                name : name,
                email : email
            },
            success: function(json){
              var obj = jQuery.parseJSON(json);
              alert(obj['MESSAGE']);
              // $(callback).html(
              //   '<div class="alert alert-'+obj['STATUS']+'" id="alert-out">'+obj['MESSAGE']+'</div>'
              // );
              // location.reload(true);
            }
        });
      }

      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          // console.log('User signed out.');
          alert('User signed out.');
        });
      }
    </script>

    <style type="text/css">
      #customBtn {
        display: inline-block;
        background: white;
        color: #444;
        width: 190px;
        border-radius: 5px;
        border: thin solid #888;
        box-shadow: 1px 1px 1px grey;
        white-space: nowrap;
      }
      #customBtn:hover {
        cursor: pointer;
      }
      span.label {
        font-family: serif;
        font-weight: normal;
      }
      span.icon {
        background: url('<?php echo base_url('public/images/g-normal.png'); ?>') transparent 5px 50% no-repeat;
        display: inline-block;
        vertical-align: middle;
        width: 42px;
        height: 42px;
      }
      span.buttonText {
        display: inline-block;
        vertical-align: middle;
        padding-left: 42px;
        padding-right: 42px;
        font-size: 14px;
        font-weight: bold;
        /* Use the Roboto font that is loaded in the <head> */
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>
  <body>
    <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
    <div id="gSignInWrapper">
      <span class="label">Sign in with:</span>
      <div id="customBtn" class="customGPlusSignIn">
        <span class="icon"></span>
        <span class="buttonText">Google</span>
      </div>
    </div>
    <div id="name"></div>
    <script>startApp();</script>
    <a href="#" onclick="signOut();">Sign out</a>
  </body>
</html>
