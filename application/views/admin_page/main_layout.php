<!DOCTYPE html>
<html>
<head>
<?php
$data_header_standard = array(
  'title' => 'Admin Page'
);

$data_header = isset($header) ? $header : $data_header_standard;

$this->load->view('seo',$data_header);

$this->load->view('admin_page/header_site');

// (isset($_SESSION['user']) && has_role($_SESSION['user'],'admin')) ? '' : redirect(base_url(), 'refresh');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Top header column. contains the logo and menubar -->
  <?php $this->load->view('admin_page/components/header'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin_page/components/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php isset($data_subview) ? $this->load->view($subview,$data_subview) : $this->load->view($subview); ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Bottom footer column. contains the copyright, version and more things -->
  <?php $this->load->view('admin_page/components/footer'); ?>

  <!-- Control Sidebar -->
  <?php $this->load->view('admin_page/components/control_sidebar'); ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
</body>
</html>
