<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['USERFULLNAME']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php echo ($this->uri->segment(2) == '') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/index.html'); ?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/index2.html'); ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'category') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-list-alt"></i> <span>Thể loại</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(3) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/category/'); ?>">
              <i class="fa fa-circle-o"></i> Danh sách thể loại
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'add_new') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/category/add_new'); ?>">
              <i class="fa fa-circle-o"></i> Thêm thể loại
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'article') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-list-alt"></i> <span>Bài viết</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(3) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/article/'); ?>">
              <i class="fa fa-circle-o"></i> Danh sách bài viết
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'add_new') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/article/add_new'); ?>">
              <i class="fa fa-circle-o"></i> Thêm bài viết
            </a>
          </li>
        </ul>
      </li>
      <li<?php echo ($this->uri->segment(2) == 'filemanager') ? ' class="active"' : ''; ?>>
        <a href="<?php echo base_url('admin/filemanager'); ?>">
          <i class="fa fa-list-alt"></i> <span>Quản lý tệp</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Layout Options</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/layout/top-nav.html'); ?>"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/layout/boxed.html'); ?>"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/layout/fixed.html'); ?>"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/layout/collapsed-sidebar.html'); ?>"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/widgets.html'); ?>">
          <i class="fa fa-th"></i> <span>Widgets</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Charts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/charts/chartjs.html'); ?>"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/charts/morris.html'); ?>"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/charts/flot.html'); ?>"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/charts/inline.html'); ?>"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>UI Elements</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/UI/general.html'); ?>"><i class="fa fa-circle-o"></i> General</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/UI/icons.html'); ?>"><i class="fa fa-circle-o"></i> Icons</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/UI/buttons.html'); ?>"><i class="fa fa-circle-o"></i> Buttons</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/UI/sliders.html'); ?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/UI/timeline.html'); ?>"><i class="fa fa-circle-o"></i> Timeline</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/UI/modals.html'); ?>"><i class="fa fa-circle-o"></i> Modals</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/forms/general.html'); ?>"><i class="fa fa-circle-o"></i> General Elements</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/forms/advanced.html'); ?>"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/forms/editors.html'); ?>"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/tables/simple.html'); ?>"><i class="fa fa-circle-o"></i> Simple tables</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/tables/data.html'); ?>"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/calendar.html'); ?>">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/mailbox/mailbox.html'); ?>">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/invoice.html'); ?>"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/profile.html'); ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/login.html'); ?>"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/register.html'); ?>"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/lockscreen.html'); ?>"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/404.html'); ?>"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/500.html'); ?>"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/blank.html'); ?>"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/pages/examples/pace.html'); ?>"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
