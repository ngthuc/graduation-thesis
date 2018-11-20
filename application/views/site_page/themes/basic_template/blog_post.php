<?php if (count($article) > 0) { ?>
  <section id="clients" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2><?php echo $article['ARTICLETITLE']; ?></h2>
        <hr>
        <!-- Date/Time - Author - Counting -->
        <p>
          <i><?php echo $this->lang->line('publish_at'); ?>
            <?php echo $article['ARTICLECREATIONDATE']; ?>
            <?php echo $this->lang->line('by'); ?>
            <a href="<?php echo base_url($this->lang->line('article').'/'.$this->lang->line('author').'/'.$article['USERID']); ?>">
              <?php echo $article['USERID']; ?></a>
              |
              <?php echo $this->lang->line('View'); ?>: <?php echo ($article['ARTICLECOUNT'] == NULL) ? 0 : $article['ARTICLECOUNT']; ?>
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
      <?php foreach ($articles as $key => $row): ?>
        <h4>
          <a href="<?php echo base_url($this->lang->line('article').'/'.$this->lang->line('post').'/'.convert_url($row['ARTICLETITLE']).'.html'); ?>">
            <?php echo $row['ARTICLETITLE']; ?>
          </a>
          <br>
        </h4>
      <?php endforeach; ?>
    </div>
  </section>

  <script type="text/javascript">
    // Login
    $(document).ready(function(){
      $.ajax({
          type: "post",
          url: "<?php echo base_url('article/count_view/'.$article['ARTICLEID'])?>",
          cache: false,
          data:{
            id : <?php echo $article['ARTICLEID'];?>
          },
          success: function(){
            console.log('Success!');
            // $.notify('Success!','success');
          }
      });
    });
  </script>
<?php } else {
  echo '<section id="clients" class="wow fadeInUp">
    <div class="container">
      <h1>Thông báo</h1><hr />
      <div class="alert alert-warning"><i>Không tìm thấy bài viết</i></div>
    </div>
  </section>';
} ?>
