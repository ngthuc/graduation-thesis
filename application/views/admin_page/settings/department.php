<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Danh sách bộ môn/tổ chuyên ngành
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
        <form role="form" id="department" method="post">
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
                  $faculties = $this->Mfaculty->getList('sort','FACNICKNAME','ASC');
                  foreach ($faculties as $key => $faculty) {
                    // code...
                    echo '<option value="'.$faculty['FACID'].'">'.$faculty['FACNAME'].'</option>';
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
        <form role="form" id="delete_department" method="post">
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
              foreach (get_unit('department') as $key => $value) {
              echo '<tr>
                <td>'.$i.'</td>
                <td>'.$value['DEPTNAME'].'</td>
                <td>'.$value['DEPTENGLISHNAME'].'</td>
                <td>'.$value['DEPTNICKNAME'].'</td>
                <td>'.$value['PARENTID'].'</td>
                <td>
                  <input type="hidden" name="delete" value="'.$value['DEPTID'].'" />
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
    $("#department").submit(function(){
      // alert($("#department").serialize());
      var url="<?php echo base_url('canbo/admin/settings/add_department')?>";
      var form="#department";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });

    $("#delete_department").submit(function(){
      // alert($("#delete_department").serialize());
      var url="<?php echo base_url('canbo/admin/settings/delete_department')?>";
      var form="#delete_department";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
