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
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignin(document.getElementById('Google_Auth'));
        });
      };

      function attachSignin(element) {
        console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
              // document.getElementById('name').innerText = "Signed in: " +
              //     googleUser.getBasicProfile().getName();
              // alert(googleUser.getBasicProfile().getName() + ' - ' + googleUser.getBasicProfile().getEmail());
              console.log(googleUser.getBasicProfile().getName());
              
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
              var string_alert;
              if(obj['STATUS']=='success') {
                string_alert = '<span>'+obj['MESSAGE']+'</span>';
              } else {
                string_alert = '<span>Anonymous account. <a href="#">Submit an identity request now!</a></span>';
              }
              $("#alert-info").html(string_alert);
              // location.reload(true);
            }
        });
      }

      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          // console.log('User signed out.');
          alert('User signed out.');
          console.log(googleUser.getBasicProfile().getName());
        });
      }
    </script>
  </head>
  <body>
    <div class="logmod">
      <div class="logmod__wrapper">
        <span class="logmod__close">Close</span>
        <div class="logmod__container">
          <ul class="logmod__tabs">
            <li data-tabtar="lgm-2"><a href="#">Login</a></li>
            <li data-tabtar="lgm-2"></li>
            <!-- <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li> -->
          </ul>
          <div class="logmod__tab-wrapper">
            <!-- <div class="logmod__tab lgm-1">
              <div class="logmod__heading">
                <span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
              </div>
              <div class="logmod__form">
                <form accept-charset="utf-8" action="#" class="simform">
                  <div class="sminputs">
                    <div class="input full">
                      <label class="string optional" for="user-name">Email*</label>
                      <input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
                    </div>
                  </div>
                  <div class="sminputs">
                    <div class="input string optional">
                      <label class="string optional" for="user-pw">Password *</label>
                      <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="text" size="50" />
                    </div>
                    <div class="input string optional">
                      <label class="string optional" for="user-pw-repeat">Repeat password *</label>
                      <input class="string optional" maxlength="255" id="user-pw-repeat" placeholder="Repeat password" type="text" size="50" />
                    </div>
                  </div>
                  <div class="simform__actions">
                    <input class="sumbit" name="commit" type="sumbit" value="Create Account" />
                  </div>
                </form>
              </div>
              <div class="logmod__alter">
                <div class="logmod__alter-container">
                  <a href="#" class="connect googleplus">
                    <div class="connect__icon">
                      <i class="fa fa-google-plus"></i>
                    </div>
                    <div class="connect__context">
                      <span>Create an account with <strong>Google+</strong></span>
                    </div>
                  </a>
                </div>
              </div>
            </div> -->
            <div class="logmod__tab lgm-2">
              <div class="logmod__heading">
                <span class="logmod__heading-subtitle">Enter your email and password <strong>to sign in</strong></span>
                <div id="alert-info"></div>
              </div>
              <div class="logmod__form">
                <form accept-charset="utf-8" action="#" class="simform">
                  <div class="sminputs">
                    <div class="input full">
                      <label class="string optional" for="user-name">Email*</label>
                      <input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
                    </div>
                  </div>
                  <div class="sminputs">
                    <div class="input full">
                      <label class="string optional" for="user-pw">Password *</label>
                      <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="password" size="50" />
                      <span class="hide-password">Show</span>
                    </div>
                  </div>
                  <div class="simform__actions">
                    <input class="sumbit" name="commit" type="sumbit" value="Log In" />
                    <a href="#" onclick="signOut();">Sign out</a>
                  </div>
                </form>
              </div>
              <div id="gSignInWrapper">
                <div class="logmod__alter customGPlusSignIn" id="Google_Auth">
                  <div class="logmod__alter-container">
                    <div class="connect googleplus">
                    <!-- <a href="#" class="connect googleplus"> -->
                      <div class="connect__icon">
                        <i class="fa fa-google-plus"></i>
                      </div>
                      <div class="connect__context">
                        <span>Sign in with <strong>Google+</strong></span>
                      </div>
                    <!-- </a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>startApp();</script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?=base_url('public/js/index.js');?>"></script>
    <script src="<?php echo base_url('public/themes/login_standard/js/jquery.min.js');?>" charset="utf-8"></script>
  </body>
</html>
