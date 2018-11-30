<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Start include -->
      <!-- Load seo -->
      <?php $this->load->view('seo',$data_subview); ?>

      <!-- Load bootstrap & jquery -->
      <link rel="stylesheet" type="text/css" href="<?=base_url('public/libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css'); ?>">
      <script src="<?=base_url('public/libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js'); ?>" charset="utf-8"></script>
      <script src="<?=base_url('public/libraries/jquery-3.2.1/jquery-3.2.1.min.js'); ?>" charset="utf-8"></script>
    <!-- End include -->
  </head>
  <body>
    <!-- Thanh dieu huong/Menu Bar -->
    <?php $this->load->view('site_page/themes/basic_template/components/menu',$data_subview); ?>

    <!-- Noi dung hien thi -->
    <?php $this->load->view($subview,$data_subview); ?>
  </body>
</html>
