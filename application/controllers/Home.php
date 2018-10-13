<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    protected $_data = array();

    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      $this->load->view('site_page/login_standard/login');
    }

    public function language($lang = "") {
        $language = ($lang != "") ? $lang : "vietnamese";
        $this->session->set_userdata('lang', $language);
        redirect(base_url());
    }

    public function login() {
      $uid = $this->input->post('username');
			$pwd = md5($this->input->post('password'));

      $_UserInput = array(
        'USERID' => $uid,
        'USERPASSWORD' => $pwd
      );
      var_dump($_UserInput);
      // $_userData = $this->Musers->CheckUser($_UserInput);
      //
      if(isset($_UserInput)) {
        // $this->session->set_userdata('user', $_userData);
        echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Đăng nhập thành công!"));
      } else {
        echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Đăng nhập thất bại!"));
      }
    }

    public function logout() {
      //code
      $this->session->unset_userdata('user');	// Unset session of user
      $this->session->unset_userdata('access');	// Unset session of user
      redirect(base_url(), 'refresh');
    }

    public function test() {
      //code
      var_dump($_SESSION);
    }
}
