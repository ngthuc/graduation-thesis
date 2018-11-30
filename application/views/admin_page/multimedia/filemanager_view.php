<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Quản lý tập tin
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Quản lý tập tin</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<iframe width="100%" height="700" frameborder="0"
		src="<?php echo base_url('public/filemanager/dialog.php?type=0');?>">
	</iframe>
</section>

<script type="text/javascript">
  $(document).ready(function(){
    window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#/';
            window.location.reload();
        }
    }
  });
</script>
