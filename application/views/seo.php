<!-- Init and setup responsive -->
  <?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Init and setup responsive -->

<!-- Tite site -->
  <title><?php echo isset($title) ? $title : 'Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước'; ?></title>
<!-- Tite site -->

<!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo ((get_media('theme','favicon') != NULL) || (get_media('theme','favicon') != '')) ? get_media('theme','favicon') : 'https://ngthuc.github.io/src/public/resources/images/logo/logo-without-name.png'; ?>">
<!-- Favicon -->

<!-- Search Engine Optimization | SEO -->
  <meta name="keywords" content="<?php echo ((get_media('theme','keywords') != NULL) || (get_media('theme','keywords') != '')) ? get_media('theme','keywords') : 'Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước'; ?>">
  <meta name="description" content="<?php echo ((get_media('theme','description') != NULL) || (get_media('theme','description') != '')) ? get_media('theme','description') : 'Website thông tin Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước, Sóc Trăng'; ?>">
  <meta property="og:site_name" content="<?php echo ((get_media('theme','site_name') != NULL) || (get_media('theme','site_name') != '')) ? get_media('theme','site_name') : 'Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước'; ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo isset($title) ? $title : 'Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước'; ?>">
  <meta property="og:description" content="<?php echo ((get_media('theme','description') != NULL) || (get_media('theme','description') != '')) ? get_media('theme','description') : 'Website thông tin Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước, Sóc Trăng'; ?>">
  <meta property="og:url" content="<?php echo ((get_media('theme','url') != NULL) || (get_media('theme','url') != '')) ? get_media('theme','url') : base_url(); ?>">
<!-- Search Engine Optimization | SEO -->

<!-- Signature -->
  <meta name="author" content="Nguyên Thức" />
  <link rel="author" href="https://ngthuc.com/">
<!-- Signature -->
