<html>
<head>
  <!-- Load seo -->
  <?php $this->load->view('seo'); ?>

  <!-- Load header custom -->
  <?php $this->load->view('site_page/themes/basic_template/components/header'); ?>
</head>

<body>

<div id="cv" class="border content">
    <?php $this->load->view('site_page/themes/basic_template/person_info',$data_subview); ?>

    <hr>
    <?php $this->load->view('site_page/themes/basic_template/components/menu',$data_subview); ?>
    <hr>

	   <?php $this->load->view('site_page/themes/basic_template/list_info',$data_subview); ?>
</div>

<!-- Load footer -->
<?php $this->load->view('site_page/themes/basic_template/components/footer'); ?>

</body>
</html>
<!-- cool stuff -->
