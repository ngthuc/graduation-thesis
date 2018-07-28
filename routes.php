<?php
// chèn các thư viện
// include('src/config.php');
// include('src/functions.php');

// bắt đầu phiên làm việc
// session_start();

?>
<!doctype html>
<html>
<head>
<?php
// header
// include('public/header.php');
?>
</head>
<body id="page-header">
<?php
// navbar
// include('public/navbar.php');
?>

<?php
// login form
// include('src/login_form.php');
?>

<!-- Load subview -->
<div class="con">
  <div class="container home-mobile">
    <?php
      if(isset($_GET['page'])) {
        echo $_GET['page'];
        // if($_GET['page'] == 'inventory') {
        // }
      }
      // if(isset($_SESSION['user'])) {
      //   if(isset($_GET['page'])) {
      //     if($_GET['page'] == 'inventory') {
      //       // Kho...
      //       include('src/inventory.php');
      //     } else if($_GET['page'] == 'add_product') {
      //       // Thêm sản phẩm...
      //       include('src/add_product.php');
      //     } else if($_GET['page'] == 'edit_product') {
      //       // Sửa sản phẩm...
      //       include('src/edit_product.php');
      //     } else if($_GET['page'] == 'admin') {
      //       // Thêm người dùng
      //       include('src/admin.php');
      //     } else if($_GET['page'] == 'login') {
      //       // Đăng nhập
      //       include('src/login.php');
      //     } else if($_GET['page'] == 'logout') {
      //       // Đăng xuất
      //       include('src/logout.php');
      //     } else if($_GET['page'] == $_SESSION['user']['username']) {
      //       // Profile
      //       include('src/profile.php');
      //     } else {
      //       include('public/404.php');
      //       echo '<meta http-equiv="refresh" content="3;url='.$base_url.'">';
      //     }
      //   } else if((isset($_SESSION['user'])) && ($_SESSION['user']['level'] == 'user')) {
      //     include('src/dashboard.php');
      //   } else if((isset($_SESSION['user'])) && (($_SESSION['user']['level'] == 'owner') || ($_SESSION['user']['level'] == 'admin'))) {
      //     include('src/admin_dashboard.php');
      //   } else include('public/404.php');
      // } else if(isset($_GET['page']) && ($_GET['page'] == 'forget_password')) {
      //   include('src/reset_password_request.php');
      // } else if(isset($_GET['page']) && ($_GET['page'] == 'reset_password')) {
      //   include('src/reset_password_response.php');
      // } else include('src/login.php');
    ?>
  </div>
</div>
<!-- End subview -->

</body>

<!-- Begin Footer -->
<footer>
<!-- <div class="footer"> -->
  <div class="container">
    <div class="col-md-12 contact">Luận Văn Tốt Nghiệp | Kỹ thuật phần mềm</div>
    <div class="col-md-12 contact">2018 @ <a href="https://ngthuc.com/" target="_blank">ngthuc.com</a> </div>
  </div>
<!-- </div> -->
</footer>
<!-- End Footer -->
</html>
