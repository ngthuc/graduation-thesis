<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thống kê cơ bản
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('canbo/admin');?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">Thống kê</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thống kê công bố khoa học</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form name="other" method="post">
            <?php if(check_statistic('user')) {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } else if(check_statistic('year')) {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } else if(check_statistic('type')) {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } else if(check_statistic('school')) {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } else if(check_statistic('faculty')) {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } else if(check_statistic('department')) {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } else {
              echo '<div class="alert alert-info">Vui lòng tìm kiếm thống kê bằng các tiêu chí</div>';
            } ?>
          </form>
          <?php
            if($this->input->post('clear')) {
              $this->session->unset_userdata('search');
              redirect(base_url('canbo/admin/statistic'));
            }
          ?>
          <center>
            <form name="standard" class="form-inline" method="post">
              <div class="form-group">
                <select class="form-control" name="user" id="user" onChange="document.standard.submit();">
                  <option value="null">--Chọn cán bộ--</option>
                  <?php
                    $users = $this->Musers->getUsers();
                    foreach ($users as $key => $user) {
                      // code...
                      if(isset($_SESSION['search']['user']) && $_SESSION['search']['user']==$user['USERID']) {
                        echo '<option value="'.$user['USERID'].'" selected>'.$user['USERFULLNAME'].'</option>';
                      } else {
                        echo '<option value="'.$user['USERID'].'">'.$user['USERFULLNAME'].'</option>';
                      }
                    }
                  ?>
                </select>
                <select class="form-control" name="year" id="year" onChange="document.standard.submit();">
                  <option value="null">--Chọn năm--</option>
                  <?php
                    $base_year = 1966;
                    for($i=0;$i<=200;$i++) {
                      // code...
                      if(isset($_SESSION['search']['year']) && $_SESSION['search']['year']==($base_year+$i)) {
                        echo '<option value="'.($base_year+$i).'" selected>'.($base_year+$i).'</option>';
                      }
                      // else if(date('Y') == ($base_year+$i)) {
                      //   echo '<option value="'.($base_year+$i).'" selected>'.($base_year+$i).'</option>';
                      // }
                      else {
                        echo '<option value="'.($base_year+$i).'">'.($base_year+$i).'</option>';
                      }
                    }
                  ?>
                </select>
                <select class="form-control" name="type" id="type" onChange="document.standard.submit();">
                  <option value="null">--Chọn loại công bố--</option>
                  <!-- Hiển thị kiểu công bố -->
                  <option value="isi"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='isi') ? ' selected' : ''; ?>>ISI/Scopus</option>
                  <option value="journal"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='journal') ? ' selected' : ''; ?>>Journal, book chapter</option>
                  <option value="edited"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='edited') ? ' selected' : ''; ?>>Edited book</option>
                  <option value="conference"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='conference') ? ' selected' : ''; ?>>Conference, workshop</option>
                  <option value="report"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='report') ? ' selected' : ''; ?>>Technical report</option>
                  <option value="thesis"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='thesis') ? ' selected' : ''; ?>>Thesis</option>
                </select>
                <select class="form-control" name="school" id="school" onChange="document.standard.submit();">
                  <option value="null">--Chọn trường--</option>
                  <?php
                    $schools = $this->Mschool->getList('sort','SCHNICKNAME','ASC');
                    foreach ($schools as $key => $school) {
                      // code...
                      if(isset($_SESSION['search']['school']) && $_SESSION['search']['school']==$school['SCHID']) {
                        echo '<option value="'.$school['SCHID'].'" selected>'.$school['SCHNAME'].'</option>';
                      } else {
                        echo '<option value="'.$school['SCHID'].'">'.$school['SCHNAME'].'</option>';
                      }
                    }
                  ?>
                </select>
                <select class="form-control" name="faculty" id="faculty" onChange="document.standard.submit();">
                  <option value="null">--Chọn khoa/viện--</option>
                  <?php
                    if(check_statistic('school')) {
                      $faculties = $this->Mfaculty->getList('where','PARENTID',$_SESSION['search']['school']);
                    } else {
                      $faculties = $this->Mfaculty->getList('sort','FACNICKNAME','ASC');
                    }
                    foreach ($faculties as $key => $faculty) {
                      // code...
                      if(isset($_SESSION['search']['faculty']) && $_SESSION['search']['faculty']==$faculty['FACID']) {
                        echo '<option value="'.$faculty['FACID'].'" selected>'.$faculty['FACNAME'].'</option>';
                      } else {
                        echo '<option value="'.$faculty['FACID'].'">'.$faculty['FACNAME'].'</option>';
                      }
                    }
                  ?>
                </select>
                <select class="form-control" name="department" id="department" onChange="document.standard.submit();">
                  <option value="null">--Chọn bộ môn/tổ chuyên ngành--</option>
                  <?php
                    if(check_statistic('faculty')) {
                      $departments = $this->Mdepartment->getList('where','PARENTID',$_SESSION['search']['faculty']);
                    } else {
                      $departments = $this->Mdepartment->getList('sort','DEPTNICKNAME','ASC');
                    }
                    foreach ($departments as $key => $department) {
                      // code...
                      if(isset($_SESSION['search']['department']) && $_SESSION['search']['department']==$department['DEPTID']) {
                        echo '<option value="'.$department['DEPTID'].'" selected>'.$department['DEPTNAME'].'</option>';
                      } else {
                        echo '<option value="'.$department['DEPTID'].'">'.$department['DEPTNAME'].'</option>';
                      }
                    }
                  ?>
                </select>
              </div>
            </form>
            <hr>
          </center>
          <?php
            if($this->input->post('user') || $this->input->post('type') || $this->input->post('year') || $this->input->post('school') || $this->input->post('faculty') || $this->input->post('department')) {
              $_SESSION['search']['user'] = ($this->input->post('user')=='null') ? null : $this->input->post('user');
              $_SESSION['search']['year'] = ($this->input->post('year')=='null') ? null : $this->input->post('year');
              $_SESSION['search']['type'] = ($this->input->post('type')=='null') ? null : $this->input->post('type');
              $_SESSION['search']['department'] = ($this->input->post('department')=='null') ? null : $this->input->post('department');
              $_SESSION['search']['faculty'] = ($this->input->post('faculty')=='null') ? null : $this->input->post('faculty');
              $_SESSION['search']['school'] = ($this->input->post('school')=='null') ? null : $this->input->post('school');
              redirect(base_url('canbo/admin/statistic'));
            }
            if(isset($_SESSION['search']['user'])) {
              $user = $_SESSION['search']['user'];
            } else $user=null;
            if(isset($_SESSION['search']['year'])) {
              $year = $_SESSION['search']['year'];
            } else $year=null;
            if(isset($_SESSION['search']['type'])) {
              $type = $_SESSION['search']['type'];
            } else $type=null;
            if(isset($_SESSION['search']['school'])) {
              $school = $_SESSION['search']['school'];
            } else $school=null;
            if(isset($_SESSION['search']['faculty'])) {
              $faculty = $_SESSION['search']['faculty'];
            } else $faculty=null;
            if(isset($_SESSION['search']['department'])) {
              $department = $_SESSION['search']['department'];
            } else $department=null;
            $statistic = $this->Minfo->statisticInfo($user,$year,$type,$school,$faculty,$department,1);
          ?>
          <table class="table table-bordered table-striped" id="statics-datatables">
            <thead>
            <tr>
              <th>STT</th>
              <th>Tên cán bộ</th>
              <th>Các tác giả</th>
              <th>Tên công bố</th>
              <th>Năm</th>
              <th>Loại</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(count($statistic)>0){
              $stt = 1;
              foreach ($statistic as $key => $info) {
                // code...
                echo '<tr>
                  <td>'.$stt.'</td>
                  <td>'.get_name($info['USERID']).'</td>
                  <td>'.$info['INFOTITLE'].'</td>
                  <td>'.$info['INFOCONTENT'].'</td>
                  <td>'.$info['INFODATE'].'</td>
                  <td>'.get_publication_name($info['INFOTYPE']).'</td>
                </tr>';
                $stt++;
              }
            }
            ?>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  <!-- /.col -->
  </div>
<!-- /.row -->
</section>

<!-- DataTables 1.10.16 -->.
  <!-- Include DataTables 1.10.16 -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.css'); ?>"/> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>
    <!-- <script type="text/javascript" src="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.js'); ?>"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>

    <!-- Button for datatables -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <!-- End Button for datatables -->
  <!-- Include DataTables 1.10.16 -->
  <!-- Using DataTables -->
    <script type="text/javascript">
    $(document).ready(function () {
        var printCounter = 0;

        // Append a caption to the table before the DataTables initialisation
        // $('#statics-datatables').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');

        var table = $('#statics-datatables').DataTable({
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "language" : {
            "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
          },
          dom: 'Bfrtip',
          buttons: [
            'pageLength',
            'copyHtml5',
            {
                extend: 'excel',
                title: 'Thống kê công bố khoa học',
                messageTop: 'Thông tin trong bảng này thuộc bản quyền của Khoa CNTT&TT, Đại học Cần Thơ.'
            },
            {
                extend: 'pdf',
                title: 'Thống kê công bố khoa học',
                messageBottom: null
            },
            {
                extend: 'print',
                title: 'Thống kê công bố khoa học',
                messageTop: null,
                messageBottom: null
            }
          ]
      });

      table.buttons().container().appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });
    </script>
  <!-- Using DataTables -->
<!-- DataTable 1.10.16 -->
