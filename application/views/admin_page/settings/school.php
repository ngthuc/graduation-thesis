<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Danh sách trường học
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Cài đặt</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Quản</h3>
        </div> -->
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="school" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="name">Tên đầy đủ</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên đầy đủ">
            </div>
            <div class="form-group">
              <label for="engname">Tên tiếng Anh (nếu có)</label>
              <input type="text" class="form-control" name="engname" id="engname" placeholder="Nhập tên tiếng Anh">
            </div>
            <div class="form-group">
              <label for="nickname">Tên viết tắt (nếu có)</label>
              <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nhập tên viết tắt (ví dụ: DI)">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </form>

        <!-- form start -->
        <form role="form" id="delete_school" method="post">
          <div class="box-body">
            <table class="table" id="datatables">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên đầy đủ</th>
                  <th>Tên tiếng Anh</th>
                  <th>Tên viết tắt</th>
                  <th>-</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i = 1;
              foreach (get_unit('school') as $key => $value) {
              echo '<tr>
                <td>'.$i.'</td>
                <td>'.$value['SCHNAME'].'</td>
                <td>'.$value['SCHENGLISHNAME'].'</td>
                <td>'.$value['SCHNICKNAME'].'</td>
                <td>
                  <input type="hidden" name="delete" value="'.$value['SCHID'].'" />
                  <button type="submit" class="btn btn-danger">Delete</button>
                </td>
              </tr>';
              $i++;
              }
              ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <!-- <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div> -->
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>

<!-- Load ajax -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#school").submit(function(){
      // alert($("#school").serialize());
      var url="<?php echo base_url('canbo/admin/settings/add_school')?>";
      var form="#school";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });

    $("#delete_school").submit(function(){
      // alert($("#delete_school").serialize());
      var url="<?php echo base_url('canbo/admin/settings/delete_school')?>";
      var form="#delete_school";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
