<?php if(!isset($page)) { ?>
  <section id="clients" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>Bài viết
          <small>Thể loại <?php echo $category_name; ?></small></h2>
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
        <?php foreach ($articles as $key => $row): ?>
          <h4>
            <a href="<?php echo base_url('~'.$user.'/'.convert_url($row['ARTICLETITLE']).'.html'); ?>">
              <?php echo $row['ARTICLETITLE']; ?>
            </a>
            <br>
          </h4>
        <?php endforeach; ?>
        <script type="text/javascript">
          // Login
          $(document).ready(function(){
            $.ajax({
                type: "post",
                url: "<?php echo base_url('article/count_view/'.$page['ARTICLEID'])?>",
                cache: false,
                data:{
                  id : <?php echo $page['ARTICLEID'];?>
                },
                success: function(){
                  console.log('Success!');
                  // $.notify('Success!','success');
                }
            });
          });
        </script>
<?php } else if (count($articles) > 0) {
  echo '<div class="row">';
  $i = 1;
  foreach ($articles as $key => $row) {
    if(get_div_number($i)) {
      echo '<div class="col-lg-3 about-img">
        <img src="'.$row['ARTICLEIMAGE'].'" alt="" style="width: 100%; height: 342px">
      </div>

      <div class="col-lg-3 content">
        <h2><a href="'.base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_url($row['ARTICLETITLE']).'.html').'">'.$row['ARTICLETITLE'].'</a></h2>
        <h3>'.$row['ARTICLEDESCRIPTION'].'</h3>
        <hr />
        <p>
          <i>'; echo $this->lang->line('publish_at').' '.$row['ARTICLECREATIONDATE'].' '.$this->lang->line('by'); echo '
            <a href="'; echo base_url($this->lang->line('article').'/'.$this->lang->line('author').'/'.$row['USERID']); echo '">
              '; echo $row['USERID']; echo '</a>
              |
              '; echo $this->lang->line('View'); ?>: <?php echo ($row['ARTICLECOUNT'] == NULL) ? 0 : $row['ARTICLECOUNT']; echo '
          </i>
        </p>
      </div>';
    } else {
      echo '<div class="col-lg-3 content">
        <h2><a href="'.base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_url($row['ARTICLETITLE']).'.html').'">'.$row['ARTICLETITLE'].'</a></h2>
        <h3>'.$row['ARTICLEDESCRIPTION'].'</h3>
        <hr />
        <p>
          <i>'; echo $this->lang->line('publish_at').' '.$row['ARTICLECREATIONDATE'].' '.$this->lang->line('by'); echo '
            <a href="'; echo base_url($this->lang->line('article').'/'.$this->lang->line('author').'/'.$row['USERID']); echo '">
              '; echo $row['USERID']; echo '</a>
              |
              '; echo $this->lang->line('View'); ?>: <?php echo ($row['ARTICLECOUNT'] == NULL) ? 0 : $row['ARTICLECOUNT']; echo '
          </i>
        </p>
      </div>

      <div class="col-lg-3 about-img">
        <img src="'.$row['ARTICLEIMAGE'].'" alt="" style="width: 100%; height: 342px">
      </div>';
    }
    $i++;
  }
  // Pagination
  echo '<div class="col-lg-12">';
  $params = (isset($uri_segment)) ? config_pagination_customize_reveal($base_url,$uri_segment) : config_pagination_customize_reveal($base_url);
  echo create_pagination($base_url,$total_records,$limit_per_page,$params);
  echo '</div>';

  echo '</div>';
} else {
  echo '<section id="clients" class="wow fadeInUp">
    <div class="container">
      <h1>Thông báo</h1><hr />
      <div class="alert alert-info"><i>Chưa có bài viết</i></div>
    </div>
  </section>';
} ?>
</div>
</section>
