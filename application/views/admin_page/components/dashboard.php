<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $this->Marticle->getCountPost();?></h3>

          <p>Bài viết</p>
        </div>
        <div class="icon">
          <i class="ion ion-compose"></i><ion-icon name="paper"></ion-icon>
        </div>
        <a href="<?php echo base_url('canbo/admin/article/')?>" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <!-- <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $this->Mcategory->countAll();?><sup style="font-size: 20px"></sup></h3>

          <p>Thể loại</p>
        </div>
        <div class="icon">
          <i class="ion-pricetags"></i>
        </div>
        <a href="<?php echo base_url('canbo/admin/category/')?>" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div> -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $this->Minfo->countInfo(get_id_logged());?></h3>

          <p>Thông tin</p>
        </div>
        <div class="icon">
          <i class="ion-person"></i>
        </div>
        <a href="<?php echo base_url('canbo/admin/infomation/')?>" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $this->Minfo->countPersonInfo(get_id_logged(),'publication');?></h3>

          <p>Công bố</p>
        </div>
        <div class="icon">
          <i class="ion-clipboard"></i>
        </div>
        <a href="<?php echo base_url('canbo/admin/infomation/')?>" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <?php if(has_role(get_role_logged(),'admin')): ?>
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $this->Musers->countAll();?></h3>

          <p>Thành viên</p>
        </div>
        <div class="icon">
          <i class="ion-person-stalker"></i>
        </div>
        <a href="<?php echo base_url('canbo/admin/accounts/')?>" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <?php endif; ?>
      <?php if(has_role(get_role_logged(),'user')): ?>
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $this->Minfo->countPersonInfo(get_id_logged(),'research');?></h3>

          <p>Nghiên cứu</p>
        </div>
        <div class="icon">
          <i class="ion-briefcase"></i>
        </div>
        <a href="<?php echo base_url('canbo/admin/infomation/')?>" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <?php endif; ?>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">

      <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-comments-o"></i>

          <h3 class="box-title">Giao diện đang sử dụng: <b><?php echo get_system('theme','theme');?></b></h3>

          <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
            <div class="btn-group" data-toggle="btn-toggle">
              <a type="button" href="<?php echo base_url('canbo/admin/settings/themes/');?>" class="btn btn-info">
                <i class="fa fa-edit"></i> Thay đổi
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- TO DO List -->
      <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-clipboard"></i>

          <h3 class="box-title">Bài viết mới nhất</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list">
          <?php
            $article = $this->Marticle->getFiveLatestArticle();
            $i = 1;
            foreach ($article as $key => $post) {
              // code...
              echo '<li>
                <span class="handle">'.$i.'</span>
                <a href="'.(base_url('~'.get_id_logged().'/'.convert_url($post['ARTICLETITLE']).'.html')).'"><span class="text">'.$post['ARTICLETITLE'].'</span></a>
              </li>';
              $i++;
            }
          ?>
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <a type="button" href="<?php echo base_url('canbo/admin/article/');?>" class="btn btn-default pull-right"><i class="fa fa-hand-o-right"></i> Xem thêm</a>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-clipboard"></i>

          <h3 class="box-title">Bài viết được xem nhiều</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list">
          <?php
            $article = $this->Marticle->getFiveMostView();
            $i = 1;
            foreach ($article as $key => $post) {
              // code...
              echo '<li>
                <span class="handle">'.$i.'</span>
                <a href="'.(base_url('~'.get_id_logged().'/'.convert_url($post['ARTICLETITLE']).'.html')).'"><span class="text">'.$post['ARTICLETITLE'].'</span></a>
              </li>';
              $i++;
            }
          ?>
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <a type="button" href="<?php echo base_url('canbo/admin/article/');?>" class="btn btn-default pull-right"><i class="fa fa-hand-o-right"></i> Xem thêm</a>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

      <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-clipboard"></i>

          <h3 class="box-title">Tác giả tích cực</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list">
          <?php
            $authors = $this->Marticle->getPopularOfAuthor();
            $i = 1;
            foreach ($authors as $key => $author) {
              // code...
              $user = get_user_by_id($author['USERID']);
              echo '<li>
                <span class="handle">'.$i.'</span>
                <a href="'.(base_url('~'.get_id_logged().'/'.convert_url($author['USERID']))).'"><span class="text">'.$user['USERFULLNAME'].'</span></a>
              </li>';
              $i++;
            }
          ?>
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <a type="button" href="<?php echo base_url('canbo/admin/article/');?>" class="btn btn-default pull-right"><i class="fa fa-hand-o-right"></i> Xem thêm</a>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-clipboard"></i>

          <h3 class="box-title">Thể loại thường xuyên</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
          <ul class="todo-list">
          <?php
            $categories = $this->Marticle->getPopularOfCategory();
            $i = 1;
            foreach ($categories as $key => $category) {
              // code...
              $cate = get_category_by_id($category['CATEID']);
              echo '<li>
                <span class="handle">'.$i.'</span>
                <a href="'.(base_url('~'.get_id_logged().'/'.convert_url($cate['CATENAME']))).'"><span class="text">'.$cate['CATENAME'].'</span></a>
              </li>';
              $i++;
            }
          ?>
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
          <a type="button" href="<?php echo base_url('canbo/admin/category/');?>" class="btn btn-default pull-right"><i class="fa fa-hand-o-right"></i> Xem thêm</a>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->

</section>
<!-- /.content -->
