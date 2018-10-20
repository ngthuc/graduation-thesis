<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    protected $_data = array();

    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      redirect(base_url($this->lang->line('article')), 'refresh');
    }

    public function language($lang = "") {
        $language = ($lang != "") ? $lang : "vietnamese";
        $this->session->set_userdata('lang', $language);
        redirect(base_url());
    }

    public function login() {
      //code
      // $this->load->view('login_form');
      $this->load->view('mp_site/login_standard/login');
    }

    public function login_processing() {
      $uid = $this->input->post('username');
			$pwd = md5($this->input->post('password'));

      $_UserInput = array(
        'USERID' => $uid,
        'USERPASSWORD' => $pwd
      );
      $_userData = $this->Musers->CheckUser($_UserInput);

      if($_userData) {
        $this->session->set_userdata('user', $_userData);
        echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Đăng nhập thành công!"));
      } else {
        echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Đăng nhập thất bại!"));
      }
    }

    public function logout() {
      //code
      $this->session->unset_userdata('user');	// Unset session of user
      $this->session->unset_userdata('access');	// Unset session of user
      // echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Đăng xuất thành công!"));
      // var_dump(json_encode(array("STATUS"=>"success","MESSAGE"=>"Đăng xuất thành công!")));
      redirect(base_url(), 'refresh');
    }

    public function test($str=null) {
      //code
      if(isset($str)) {
        // var_dump(get_resource($str));

        echo '<form method="post">
        <input type="text" name="txt_test" />
        <button type="submit" name="test">OK</button>
        </form>';

        if(isset($_POST['test'])) {
          // var_dump(get_resource($_POST['txt_test']));
          echo '<video controls="controls" width="300" height="150">
<source src="'.get_resource($_POST['txt_test']).'" /></video>
<iframe width="100%" height="80%" frameborder="0"
        		src="'.get_resource($_POST['txt_test']).'">
        	</iframe>';
        }
      } else var_dump($_SESSION);
    }
}
