<?php if (count($article) > 0) { ?>
  <section id="clients" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2><?php echo $article['ARTICLETITLE']; ?></h2>
        <hr>
        <!-- Date/Time - Author - Counting -->
        <p>
          <i>Đăng tải lúc <?php echo $article['ARTICLECREATIONDATE']; ?> bởi
            <a href="<?php echo base_url('~'.$user); ?>">
              <?php echo $article['USERID']; ?>
            </a>
          </i>
        </p>
        <hr>
      </div>

      <!-- Post Content -->
      <?php if(strpos($article['ARTICLECONTENT'], '.pdf')) {
          if(get_pdf_link($article['ARTICLECONTENT'])) {
            echo '<iframe width="100%" height="700" frameborder="0" scrolling="yes" src="'.get_pdf_link($article['ARTICLECONTENT']).'"></iframe>';
          } else {
            echo '<div class="alert alert-warning"><i>Không tìm thấy tệp PDF</i></div>';
          }
        } else echo '<p>'.$article['ARTICLECONTENT'].'</p>'; ?>
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
    </div>
  </section>

<?php } else {
  echo '<section id="clients" class="wow fadeInUp">
    <div class="container">
      <h1>Thông báo</h1><hr />
      <div class="alert alert-warning"><i>Không tìm thấy bài viết</i></div>
    </div>
  </section>';
} ?>
