<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">THANH CÔNG CỤ</li>
      <li>
        <a href="<?php echo base_url(); ?>">
          <i class="fa fa-home"></i> <span>Xem trang chủ</span>
        </a>
      </li>
      <li<?php echo ($this->uri->segment(2) == '') ? ' class="active"' : ''; ?>>
        <a href="<?php echo base_url('admin'); ?>">
          <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
        </a>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'category') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-tags"></i> <span>Thể loại</span>
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
      <li class="<?php echo ($this->uri->segment(2) == 'posts') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> <span>Bài viết</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(3) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/posts/'); ?>">
              <i class="fa fa-circle-o"></i> Danh sách bài viết
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'add_new_article') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/posts/add_new_article'); ?>">
              <i class="fa fa-circle-o"></i> Thêm bài viết
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'add_new_page') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/posts/add_new_page'); ?>">
              <i class="fa fa-circle-o"></i> Thêm trang mới
            </a>
          </li>
        </ul>
      </li>
      <li<?php echo ($this->uri->segment(2) == 'filemanager') ? ' class="active"' : ''; ?>>
        <a href="<?php echo base_url('admin/filemanager'); ?>">
          <i class="fa fa-file"></i> <span>Quản lý tệp</span>
        </a>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'accounts') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(3) == '') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/accounts/'); ?>">
              <i class="fa fa-users"></i> Danh sách tài khoản
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'add_new') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/accounts/add_new'); ?>">
              <i class="fa fa-user-plus"></i> Thêm tài khoản
            </a>
          </li>
        </ul>
      </li>
      <li class="<?php echo ($this->uri->segment(2) == 'settings') ? 'active ' : ''; ?>treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Quản lý chung</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li<?php echo ($this->uri->segment(3) == 'options') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/settings/options'); ?>">
              <i class="fa fa-cog"></i> Các thiết lập cơ bản
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'menu') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/settings/menu'); ?>">
              <i class="fa fa-navicon "></i> Thiết lập điều hướng
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'themes') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/settings/themes'); ?>">
              <i class="fa fa-television"></i> Giao diện
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'slideshow') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/settings/slideshow'); ?>">
              <i class="fa fa-file-powerpoint-o"></i> Trình chiếu
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'pictures') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/settings/pictures'); ?>">
              <i class="fa fa-file-picture-o"></i> Thư viện ảnh
            </a>
          </li>
          <li<?php echo ($this->uri->segment(3) == 'videos') ? ' class="active"' : ''; ?>>
            <a href="<?php echo base_url('admin/settings/videos'); ?>">
              <i class="fa fa-youtube-play"></i> Thư viện video
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
