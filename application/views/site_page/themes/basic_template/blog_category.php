<?php if(!isset($page)) { ?>
  <section id="clients" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h1>Thể loại
          <span style="color:red;"><i><?php echo $category['CATENAME']; ?></i></span></h1>
        <hr>
<?php } ?>

<?php if(isset($page)) { ?>
  <section id="clients" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2><?php echo $page['ARTICLETITLE']; ?></h2>
        <hr>
        <p>
          <i>Đăng tải lúc <?php echo $page['ARTICLECREATIONDATE']; ?> bởi
            <a href="<?php echo base_url('~'.$user); ?>">
              <?php echo $page['USERID']; ?>
            </a>
          </i>
        </p>
        <hr>
        <!-- Post Content -->
        <?php echo '<p>'.$page['ARTICLECONTENT'].'</p>';; ?>
        <hr>
        <h4>
          Cùng thể loại
          <a href="<?=base_url('~'.$user.'/'.convert_url($category['CATENAME']).'_'.$category['CATEID']);?>">
            <?=$category['CATENAME'];?>
          </a>
        </h4>
        <?php foreach ($articles as $key => $row): ?>
          <h4>
            * <a href="<?php echo base_url('~'.$user.'/'.convert_url($row['ARTICLETITLE']).'_'.$category['CATEID'].'_'.$row['ARTICLEID'].'.html'); ?>">
              <?php echo $row['ARTICLETITLE']; ?>
            </a>
          </h4>
        <?php endforeach; ?>
<?php } else if (count($articles) > 0) {
  foreach ($articles as $key => $row) {
    echo '<div class="about-img">
      <img src="'.$row['ARTICLEIMAGE'].'" alt="" style="width: 50%; height: 342px">
    </div>

    <div class="content">
      <h2><a href="'.base_url('~'.$user.'/'.convert_url($row['ARTICLETITLE']).'_'.$category['CATEID'].'_'.$row['ARTICLEID'].'.html').'">'.$row['ARTICLETITLE'].'</a></h2>
      <h3>'.$row['ARTICLEDESCRIPTION'].'</h3>
      <hr />
      <p>
        <i>Đăng tải lúc '.$row['ARTICLECREATIONDATE'].' bởi
          <a href="'.base_url('~'.$user).'">'.$row['USERID'].'</a>
        </i>
      </p>
      <hr />
    </div>';
  }
  // Pagination
  // echo '<div class="col-lg-12">';
  // $params = (isset($uri_segment)) ? config_pagination_customize_reveal($base_url,$uri_segment) : config_pagination_customize_reveal($base_url);
  // echo create_pagination($base_url,$total_records,$limit_per_page,$params);
  // echo '</div>';

  echo '</div>';
} else {
  echo '<section id="clients" class="wow fadeInUp">
    <div class="container">
      <h3>Thông báo</h3><hr />
      <div class="alert alert-info"><i>Chưa có bài viết</i></div>
    </div>
  </section>';
} ?>
</div>
</section>
