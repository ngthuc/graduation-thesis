<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">THANH CÔNG CỤ</li>
      <li>
        <a href="<?php echo base_url('~'.$_SESSION['user']['USERID']); ?>">
          <i class="fa fa-home"></i> <span>Xem trang chủ</span>
        </a>
      </li>
      <li<?php echo ($this->uri->segment(3) == '') ? ' class="active"' : ''; ?>>
        <a href="<?php echo base_url('canbo/admin'); ?>">
          <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
        </a>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'category') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-tags"></i> <span>Thể loại</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/category/'); ?>">
              <i class="fa fa-circle-o"></i> Danh sách thể loại
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_new') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/category/add_new'); ?>">
              <i class="fa fa-circle-o"></i> Thêm thể loại
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'infomation') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Thông tin cán bộ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/infomation/'); ?>">
              <i class="fa fa-circle-o"></i> Danh mục thông tin
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'update_person') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/infomation/update_person'); ?>">
              <i class="fa fa-circle-o"></i> Thông tin cá nhân
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_timeline') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/infomation/add_timeline'); ?>">
              <i class="fa fa-circle-o"></i> Thông tin loại 1
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_time') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/infomation/add_time'); ?>">
              <i class="fa fa-circle-o"></i> Thông tin loại 2
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_decentralization') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/infomation/add_decentralization'); ?>">
              <i class="fa fa-circle-o"></i> Thông tin loại 3
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'article') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> <span>Bài viết</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/article/'); ?>">
              <i class="fa fa-circle-o"></i> Danh sách bài viết
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_new_article') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/article/add_new_article'); ?>">
              <i class="fa fa-circle-o"></i> Thêm bài viết
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_new_page') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/article/add_new_page'); ?>">
              <i class="fa fa-circle-o"></i> Thêm trang mới
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'multimedia') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-file"></i> <span>Đa phương tiện</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/multimedia/'); ?>">
              <i class="fa fa-file"></i> Trình quản lý tệp tin
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'pictures') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/multimedia/pictures'); ?>">
              <i class="fa fa-file-picture-o"></i> Thư viện ảnh
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'themes') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-television"></i> <span>Giao diện</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/themes/'); ?>">
              <i class="fa fa-list"></i> Danh sách giao diện
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'menu') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/themes/menu'); ?>">
              <i class="fa fa-navicon"></i> Thanh điều hướng
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'list_info') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/themes/menu'); ?>">
              <i class="fa fa-user"></i> Thông tin hiển thị
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'accounts') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/accounts/'); ?>">
              <i class="fa fa-users"></i> Danh sách tài khoản
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'add_new') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/accounts/add_new'); ?>">
              <i class="fa fa-user-plus"></i> Thêm tài khoản
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(3) == 'settings') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Quản lý chung</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(4) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/settings'); ?>">
              <i class="fa fa-cog"></i> Các thiết lập cơ bản
            </a>
          </li>
          <li<?php echo ($this->uri->segment(4) == 'domains') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('canbo/admin/settings/domains'); ?>">
              <i class="fa fa-list-alt"></i> Tên miền được cấp phép
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
