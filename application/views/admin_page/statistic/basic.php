<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thống kê cơ bản
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
            <?php if(!check_statistic('user') || !check_statistic('year') || !check_statistic('department') || !check_statistic('faculty') || !check_statistic('school') || !check_statistic('type')) {
              echo '<div class="alert alert-info">Vui lòng tìm kiếm thống kê bằng các tiêu chí</div>';
            } else {
              echo '<input type="submit" class="btn btn-danger" name="clear" value="Thống kê lại"/><hr />';
            } ?>
          </form>
          <?php
            if($this->input->post('clear')) {
              $this->session->unset_userdata('search');
              redirect(base_url('canbo/admin/statistic'));
            }
          ?>
          <!-- <form id="change-theme" method="post" action="<?php echo base_url('canbo/admin/statistic/update_themes');?>"> -->
          <form id="change-statistic" name="search" class="form-inline" method="post">
            <div class="form-group">
              <select class="form-control" name="user" id="user" onChange="document.search.submit();">
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
              <select class="form-control" name="year" id="year" onChange="document.search.submit();">
                <option value="null">--Chọn năm--</option>
                <?php
                  $base_year = 1966;
                  for($i=0;$i<=200;$i++) {
                    // code...
                    if(isset($_SESSION['search']['year']) && $_SESSION['search']['year']==($base_year+$i)) {
                      echo '<option value="'.($base_year+$i).'" selected>'.($base_year+$i).'</option>';
                    } else if(date('Y') == ($base_year+$i)) {
                      echo '<option value="'.($base_year+$i).'" selected>'.($base_year+$i).'</option>';
                    } else {
                      echo '<option value="'.($base_year+$i).'">'.($base_year+$i).'</option>';
                    }
                  }
                ?>
              </select>
              <select class="form-control" name="school" id="school" onChange="document.search.submit();">
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
              <select class="form-control" name="faculty" id="faculty" onChange="document.search.submit();">
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
              <select class="form-control" name="department" id="department" onChange="document.search.submit();">
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
              <select class="form-control" name="type" id="type" onChange="document.search.submit();">
                <option value="null">--Chọn loại công bố--</option>
                <!-- Hiển thị kiểu công bố -->
                <option value="isi"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='isi') ? ' selected' : ''; ?>>ISI/Scopus</option>
                <option value="journal"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='journal') ? ' selected' : ''; ?>>Journal, book chapter</option>
                <option value="edited"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='edited') ? ' selected' : ''; ?>>Edited book</option>
                <option value="conference"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='conference') ? ' selected' : ''; ?>>Conference, workshop</option>
                <option value="report"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='report') ? ' selected' : ''; ?>>Technical report</option>
                <option value="thesis"<?=(isset($_SESSION['search']['type']) && $_SESSION['search']['type']=='thesis') ? ' selected' : ''; ?>>Thesis</option>
              </select>
            </div>
          </form>
          <?php
            if($this->input->post('year')) {
              $_SESSION['search']['year'] = $this->input->post('year');
              $_SESSION['search']['user'] = $this->input->post('user');
              $_SESSION['search']['department'] = $this->input->post('department');
              $_SESSION['search']['faculty'] = $this->input->post('faculty');
              $_SESSION['search']['school'] = $this->input->post('school');
              $_SESSION['search']['type'] = $this->input->post('type');
              redirect(base_url('canbo/admin/statistic'));
            }
          ?>
          <?php
            $statistic=null;
            if(check_statistic('user') || check_statistic('year') || check_statistic('department') || check_statistic('faculty') || check_statistic('school') || check_statistic('type')) {
              if(check_statistic('department') || check_statistic('faculty') || check_statistic('school')) {
                if(check_statistic('department') && check_statistic('faculty') && check_statistic('school')) {
                  $find = array(
                    'DEPTID' => $_SESSION['search']['department'],
                    'FACID' => $_SESSION['search']['faculty'],
                    'SCHID' => $_SESSION['search']['school']
                  );
                } else if(check_statistic('department') && check_statistic('faculty')) {
                  $find = array(
                    'DEPTID' => $_SESSION['search']['department'],
                    'FACID' => $_SESSION['search']['faculty']
                  );
                } else if(check_statistic('faculty') && check_statistic('school')) {
                  $find = array(
                    'FACID' => $_SESSION['search']['faculty'],
                    'SCHID' => $_SESSION['search']['school']
                  );
                } else if(check_statistic('department') && check_statistic('school')) {
                  $find = array(
                    'DEPTID' => $_SESSION['search']['department'],
                    'SCHID' => $_SESSION['search']['school']
                  );
                } else if(check_statistic('department')) {
                  $find = array(
                    'DEPTID' => $_SESSION['search']['department']
                  );
                } else if(check_statistic('faculty')) {
                  $find = array(
                    'FACID' => $_SESSION['search']['faculty']
                  );
                } else if(check_statistic('school')) {
                  $find = array(
                    'SCHID' => $_SESSION['search']['school']
                  );
                }
                $id = $this->Musers->getIdWhere($find);
                var_dump($id);
              }
            }
          ?>
          <table class="table table-bordered table-striped" id="datatables">
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

<!-- DataTables 1.10.16 -->
  <!-- Include DataTables 1.10.16 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.css'); ?>"/>
    <script type="text/javascript" src="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.js'); ?>"></script>
  <!-- Include DataTables 1.10.16 -->
  <!-- Using DataTables -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('.datatables').DataTable({
          "language" : {
            "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
        }
      });
    });
    </script>
  <!-- Using DataTables -->
<!-- DataTable 1.10.16 -->
