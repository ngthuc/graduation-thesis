<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url('canbo/admin'); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>AD</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <!-- <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                    page and may cause design problems
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li> -->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?=get_avatar_of_user_logged($_SESSION['user']['USERID']); ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['USERFULLNAME']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?=get_avatar_of_user_logged($_SESSION['user']['USERID']); ?>" class="img-circle" alt="User Image">

              <p>
                <?php if(isset($_SESSION['user'])) echo $_SESSION['user']['USERFULLNAME']; ?>
                <br>
                <label class="switch" title="Thay đổi tình trạng hiển thị trang thông tin">
                  <input type="checkbox" id="changeStatusSite" onclick="changeStatusSite();"<?=(get_status_site_of_user_logged($_SESSION['user']['USERID'])==1) ? ' checked' : '';?>>
                  <span class="slider round"></span>
                </label>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url('canbo/admin/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                <a href="<?php echo base_url('canbo/admin/profile/newpwd'); ?>" class="btn btn-default btn-flat">Password</a>
              </div>
              <div class="pull-right">
                <button type="button" id="logoutBtn" class="btn btn-default btn-flat" onclick="confirmLogout();">Sign out</button>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<script type="text/javascript">
// change Status Site
function changeStatusSite() {
  $.ajax({
      type: "post",
      url: "<?php echo base_url('canbo/change_status_site')?>",
      cache: false,
      data:{},
      success: function(){
        location.reload();
      }
  });
}

// Logout
function confirmLogout() {
  if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
    // $('#logoutBtn').on('click', function() {
    $.ajax({
        type: "post",
        url: "<?php echo base_url('canbo/logout')?>",
        cache: false,
        data:{},
        success: function(){
          location.reload();
          window.location.replace("<?=base_url('canbo/destroy_ssid'); ?>");
        }
    });
    // });
  }
}
</script>
