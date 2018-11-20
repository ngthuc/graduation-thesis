<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cài đặt trang web
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
        <div class="box-header with-border">
          <h3 class="box-title">Các tên miền được chấp nhận</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="domain" method="post">
          <div class="box-body">
            <div class="form-group" id="alert-ajax">
              <!-- Alert by Ajax -->
            </div>
            <div class="form-group">
              <label for="domain">Tên miền</label>
              <input type="text" class="form-control" name="domain" id="domain" placeholder="Nhập tên trang web (không có http/https và kết thúc không có dấu '/'). Ví dụ: ctu.edu.vn">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </form>

        <!-- form start -->
        <form role="form" id="delete_domain" method="post">
          <div class="box-body">
            <table class="table" id="datatables">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên miền</th>
                  <th>-</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $i = 1;
              foreach (get_system('domain') as $key => $value) {
              echo '<tr>
                <td>'.$i.'</td>
                <td>'.$value['SYSTEMLINK'].'</td>
                <td>
                  <input type="hidden" name="delete" value="'.$value['SYSTEMID'].'" />
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
    $("#domain").submit(function(){
      // alert($("#domain").serialize());
      var url="<?php echo base_url('canbo/admin/settings/add_domain')?>";
      var form="#domain";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });

    $("#delete_domain").submit(function(){
      // alert($("#delete_domain").serialize());
      var url="<?php echo base_url('canbo/admin/settings/delete_domain')?>";
      var form="#delete_domain";
      var callback="#alert-ajax";
      makeAjaxCall(url, form, callback);
    });
  });
</script>
