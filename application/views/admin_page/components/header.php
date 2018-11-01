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
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
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
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['USERFULLNAME']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

              <p>
                <?php if(isset($_SESSION['user'])) echo $_SESSION['user']['USERFULLNAME']; ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url($this->lang->line('article').'/'.$this->lang->line('user').'/'.$_SESSION['user']['USERID']); ?>" class="btn btn-default btn-flat">Profile</a>
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
        }
    });
    // });
  }
}
</script>
