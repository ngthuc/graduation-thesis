<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Danh sách khoa/viện/phòng ban
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
        <form role="form" id="faculty" method="post">
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
            <div class="form-group">
              <label for="parent">Trực thuộc</label>
              <select class="form-control" name="parent" id="parent" required>
                <?php
                  $schools = $this->Mschool->getList('sort','SCHNICKNAME','ASC');
                  foreach ($schools as $key => $school) {
                    // code...
                    echo '<option value="'.$school['SCHID'].'" selected>'.$school['SCHNAME'].'</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </form>

        <!-- form start -->
        <form role="form" id="delete_faculty" method="post">
          <div class="box-body">
            <table class="table" id="datatables">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên đầy đủ</th>
                  <th>Tên tiếng Anh</th>
                  <th>Tên viết tắt</th>
                  <th>Trực thuộc</th>
                  <th>-</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i = 1;
              foreach (get_unit('faculty') as $key => $value) {
              echo '<tr>
                <td>'.$i.'</td>
                <td>'.$value['FACNAME'].'</td>
                <td>'.$value['FACENGLISHNAME'].'</td>
                <td>'.$value['FACNICKNAME'].'</td>
                <td>'.$value['PARENTID'].'</td>
                <td>
                  <input type="hidden" name="delete" value="'.$value['FACID'].'" />
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
    $("#faculty").submit(function(){
      // alert($("#faculty").serialize());
      var url="<?php echo base_url('canbo/admin/settings/add_faculty')?>";
      var form="#faculty";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });

    $("#delete_faculty").submit(function(){
      // alert($("#delete_faculty").serialize());
      var url="<?php echo base_url('canbo/admin/settings/delete_faculty')?>";
      var form="#delete_faculty";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
