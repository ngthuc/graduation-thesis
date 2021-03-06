<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    protected $_data = array();

    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      if(isset($_SESSION['user'])) {
        if(check_unit_by_user(get_id_logged())) {
          redirect(base_url('canbo/admin/profile'));
        } else {
          redirect(base_url('canbo/admin'));
        }
      } else {
        redirect(base_url('canbo/login'));
      }
      // (isset($_SESSION['user'])) ? ((check_unit_by_user(get_id_logged())) ? redirect(base_url('canbo/admin/profile')) : redirect(base_url('canbo/admin'))) : redirect(base_url('canbo/login'));
    }

    // public function language($lang = "") {
    //     $language = ($lang != "") ? $lang : "vietnamese";
    //     $this->session->set_userdata('lang', $language);
    //     redirect(base_url());
    // }

    public function check_gsid() {
      $this->load->view('site_page/login/check_google_id');
    }

    public function login() {
      $this->load->view('site_page/login/login_default');
    }

    public function auth() {
      // code
      // var_dump(check_domain($this->input->post('email')));
      if(isset($_POST['email'])) {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $user_data = $this->Musers->getByEmail($email);

        if(check_domain($email)) {
          if(check_email($email)) {
            if(check_status_of_email($email) == 'approved') {
              $data['USERID'] = $user_data['USERID'];
              $data['USERFULLNAME'] = $user_data['USERFULLNAME'];
              $data['USEREMAIL'] = $user_data['USEREMAIL'];
              $data['USERAVATAR'] = $user_data['USERAVATAR'];
              $data['USERROLE'] = $user_data['USERROLE'];
            }
          }
        }
      } else if(isset($_POST['username'])) {
        $uid = $this->input->post('username');
        $pwd = md5($this->input->post('password'));
        $user_data = $this->Musers->getById($uid);

        if(check_pass_username($uid,$pwd)) {
          if(check_status_of_username($uid) == 'approved') {
            $data['USERID'] = $user_data['USERID'];
            $data['USERFULLNAME'] = $user_data['USERFULLNAME'];
            $data['USEREMAIL'] = $user_data['USEREMAIL'];
            $data['USERAVATAR'] = $user_data['USERAVATAR'];
            $data['USERROLE'] = $user_data['USERROLE'];
          }
        }
      }

      if(isset($user_data)) {
        if($user_data['USERROLE'] == 'admin') {
          $subfolder = '';
        } else {
          $subfolder = $user_data['USERID'];
        }
      }

      if(isset($_POST)) {
        if(isset($data)) {
          $this->session->set_userdata('user', $data);
          echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Đăng nhập thành công! ID: ".$data['USERID']));
        } else {
          echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Đăng nhập thất bại!"));
        }
      }
    }

    public function reg() {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $uid = get_username($email);

      if(check_domain($email)) {
        $data['USERID'] = $uid;
        $data['USERFULLNAME'] = $name;
        $data['USEREMAIL'] = $email;
        $data['SUBEMAIL'] = (get_domain_email($email) == 'cit.ctu.edu.vn') ? $uid.'@ctu.edu.vn' : null;
        $data['DEPTID'] = null;
        $data['FACID'] = null;
        $data['SCHID'] = null;
        $data['USERPASSWORD'] = null;
        $data['USERROLE'] = ($uid == 'tmtan') ? 'admin' : 'user'; // in develop
        // $data['USERROLE'] = 'user'; // in deploy
        $data['USERSTATUS'] = ((get_domain_email($email) == 'cit.ctu.edu.vn') || (get_domain_email($email) == 'ctu.edu.vn')) ? 'approved' : 'pending';
        $this->Musers->insertUser($data);
        echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Đăng ký thành công! Email: ".$email." đang trong hàng chờ kích hoạt!"));
      } else {
        echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Đăng ký thất bại! Tên miền chưa được cấp phép!"));
      }
    }

    public function logout() {
      //code
      $this->session->unset_userdata('user');	// Unset session of user
      redirect(base_url());
    }

    public function checkFileSSID() {
      // code...
      $this->load->view('site_page/login/check_file_ssid');
    }

    public function sendFileSSID() {
      // code...
      if(get_role_logged() == 'admin') {
        $data['sub_folder'] = '';
      } else {
        $data['sub_folder'] = get_id_logged();
      }
      $this->load->view('site_page/login/send_file_ssid',$data);
    }

    public function destroyFileSSID() {
      // code...
      $this->load->view('site_page/login/destroy_file_ssid');
    }

    public function test($str = null) {
      //code
      if(isset($str)) {
        echo '<form method="post">
        <input type="text" name="txt_test" />
        <button type="submit" name="test">OK</button>
        </form>';

        if(isset($_POST['test'])) {
          // var_dump(get_resource($_POST['txt_test']));
          // var_dump(check_email($_POST['txt_test']));
          var_dump(check_status($_POST['txt_test']));
          // var_dump(check_domain($_POST['txt_test']));
          // var_dump($this->Musers->getNumRowsByEmail($_POST['txt_test']));
        }
      } else var_dump($_SESSION);
    }
}
