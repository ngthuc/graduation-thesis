<!DOCTYPE html>
<html>
<head>
	<?php
		// $this->load->view('seo');
		// isset($_SESSION['user']) ? has_role($_SESSION['user'],'admin') ? redirect(base_url('admin'), 'refresh') : redirect(base_url(), 'refresh') : '';
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/themes/login_standard/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/themes/login_standard/css/my-login.css'); ?>">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="<?php echo base_url('public/themes/login_standard/img/logo.jpg'); ?>">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Đăng nhập</h4>
							<form method="POST" id="loginForm">
								<div class="form-group">
									<label for="username">Tài khoản</label>
									<input id="username" type="text" class="form-control" name="username" required autofocus>
								</div>
								<div class="form-group">
									<label for="password">Mật khẩu</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>
								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Đăng nhập
									</button>
								</div>
								<!-- <div class="margin-top20 text-center">
									Bạn chưa có tài khoản? <a href="register.html">Đăng ký</a>
								</div> -->
							</form>
						</div>
					</div>
					<div class="footer">
						Bản quyền khoa CNTT&TT, trường Đại học Cần Thơ &copy; 2018
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url('public/themes/login_standard/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/themes/login_standard/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/themes/login_standard/js/my-login.js'); ?>"></script>
	<script src="<?php echo base_url('public/libraries/notify.js/notify.min.js'); ?>"></script>

	<!-- Load ajax -->
	<script type="text/javascript">
	  // Login
	  $(document).ready(function(){
	    $("#loginForm").submit(function(){
				// alert($("#loginForm").serialize());
				$.ajax({
 					 type: "post",
 					 url: "<?php echo base_url('login')?>",
 					 cache: false,
 					 data: $("#loginForm").serialize(),
 					 success: function(json){
 						 var obj = jQuery.parseJSON(json);
 						 $.notify(obj['MESSAGE'],obj['STATUS']);
 						 location.reload(true);
 					 }
 			 });
	    });
	  });
	</script>
</body>
</html>
