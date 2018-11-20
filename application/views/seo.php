<!-- Init and setup responsive -->
  <?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $default_name = 'SPSIM | Hệ thống quản lý profile viên chức khoa CNTT&TT';
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Init and setup responsive -->

<!-- Tite site -->
  <title><?php echo isset($title) ? $title : $default_name; ?></title>
<!-- Tite site -->

<!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo ((get_system('default','favicon') != NULL) || (get_system('default','favicon') != '')) ? get_system('default','favicon') : 'https://ngthuc.github.io/src/public/resources/images/logo/logo-without-name.png'; ?>">
<!-- Favicon -->

<!-- Search Engine Optimization | SEO -->
  <meta name="keywords" content="<?php echo ((get_system('default','keywords') != NULL) || (get_system('default','keywords') != '')) ? get_system('default','keywords') : $default_name; ?>">
  <meta name="description" content="<?php echo ((get_system('default','description') != NULL) || (get_system('default','description') != '')) ? get_system('default','description') : $default_name; ?>">
  <meta property="og:site_name" content="<?php echo ((get_system('default','site_name') != NULL) || (get_system('default','site_name') != '')) ? get_system('default','site_name') : $default_name; ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo isset($title) ? $title : $default_name; ?>">
  <meta property="og:description" content="<?php echo ((get_system('default','description') != NULL) || (get_system('default','description') != '')) ? get_system('default','description') : $default_name; ?>">
  <meta property="og:url" content="<?php echo ((get_system('default','url') != NULL) || (get_system('default','url') != '')) ? get_system('default','url') : base_url(); ?>">
<!-- Search Engine Optimization | SEO -->

<!-- Signature -->
  <meta name="author" content="Nguyên Thức" />
  <link rel="author" href="https://ngthuc.com/">
<!-- Signature -->
