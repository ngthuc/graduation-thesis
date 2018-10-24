<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    protected $_data = array();

    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      (isset($_SESSION['user'])) ? redirect(base_url('canbo/test')) : redirect(base_url('canbo/login'));
    }

    public function language($lang = "") {
        $language = ($lang != "") ? $lang : "vietnamese";
        $this->session->set_userdata('lang', $language);
        redirect(base_url());
    }

    public function login() {
      $this->load->view('site_page/login/login_default');
    }

    public function auth() {
      // code
      // var_dump($_POST);
      if(isset($_POST['email'])) {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
  			$uid = get_username($email);

        if(check_domain($email)) {
          if(check_email($email)) {
            if(check_status_of_email($email) == 'approved') {
              $data['USERID'] = $uid;
              $data['USERFULLNAME'] = $name;
              $data['USEREMAIL'] = $email;
              $data['USERROLE'] = check_role_by_email($email);
            }
          }
        }
      } else if(isset($_POST['username'])) {
        $uid = $this->input->post('username');
        $pwd = md5($this->input->post('password'));

        if(check_pass_username($uid,$pwd)) {
          if(check_status_of_username($uid) == 'approved') {
            $data['USERID'] = $uid;
            $data['USERROLE'] = check_role_by_username($uid);
          }
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
      $email = $this->input->post('email');
      $uid = get_username($email);

      if(check_domain($email)) {
        $data['USERID'] = $uid;
        $data['USEREMAIL'] = $email;
        $data['USERPASSWORD'] = null;
        $data['USERROLE'] = 'user';
        $data['USERSTATUS'] = 'pending';
        $this->Musers->insertUser($data);
        echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Success register! Email: ".$email." will be approved by admin!"));
      } else {
        echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Failure register! The domain of email not approved by the system!"));
      }
    }

    public function logout() {
      //code
      $this->session->unset_userdata('user');	// Unset session of user
      // $this->session->unset_userdata('access');	// Unset session of user
      redirect(base_url());
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
          // var_dump($this->Musers->getNumRowsByEmail($_POST['txt_test']));
        }
      } else var_dump($_SESSION);
    }
}
