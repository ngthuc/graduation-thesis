<!DOCTYPE html>
<html>
<head>
<?php
$data_header_standard = array(
  'title' => 'Login Page'
);

$data_header = isset($header) ? $header : $data_header_standard;

$this->load->view('header_site',$data_header);

isset($_SESSION['access']) ? (($_SESSION['access'] == 'admin') ? redirect(base_url('admin'), 'refresh') : redirect(base_url(), 'refresh')) : '';
?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>">
      <b>Admin</b>LTE
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="loginForm" method="post">
      <div class="form-group has-feedback" id="alert-login">
        <!-- Alert by Ajax -->
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" id="loginBtn" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<!-- Load ajax -->
<script type="text/javascript">
  // Login
  $(document).ready(function(){
    $("form").submit(function(){
      var url="<?php echo base_url('login_processing')?>";
      var form="#loginForm";
      var callback="#alert-login";
      makeAjaxCall(url, form, callback);
    });
  });

  $(document).on("keypress", function(e){
        if(e.which == 13){
          var url="<?php echo base_url('login_processing')?>";
          var form="#loginForm";
          var callback="#alert-login";
          makeAjaxCall(url, form, callback);
        }
    });
</script>
</body>
</html>
