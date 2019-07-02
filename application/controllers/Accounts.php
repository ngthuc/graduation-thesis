<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/accounts/list_accounts';
      $_data['data_subview'] = array(
        'accounts' => $this->Musers->getUsers()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new() {
      //code
      $_data['subview'] = 'admin_page/accounts/add_new_account';
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $data['id'] = $this->input->post('user_id');
      $data['fullname'] = ($this->input->post('fullname')) ? $this->input->post('fullname') : '';
      $data['email'] = $this->input->post('email');
      $data['password'] = md5($this->input->post('password'));
      $data['role'] = $this->input->post('permissions');
      $data['accountStatus'] = 'approved';

      $status = $this->Musers->insertUser($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm tài khoản thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm tài khoản thất bại!"));
			}
    }

    public function edit_account($id = null) {
      //code
      $_data['subview'] = 'admin_page/accounts/edit_one_account';
      $_data['data_subview'] = array(
        'account' => $this->Musers->getById($id)
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_account_processing() {
      //code
      $uid = $this->input->post('uid');
      $pwd = $this->Musers->getPasswordById($uid);
      $data['id'] = $uid;
      $data['fullname'] = $this->input->post('fullname');
      $data['email'] = $this->input->post('email');
      $data['password'] = $pwd['password'];
      $data['role'] = $this->input->post('permissions');
      $data['accountStatus'] = $this->input->post('status');

      $status = $this->Musers->updateUser($data,$uid);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật tài khoản thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật tài khoản thất bại!"));
			}
    }

    public function delete_account() {
      //code
      if(isset($_POST)) {
        $status = $this->Musers->deleteUser($this->input->post('uid'));
  			// Thông báo
  			if($status) {
  				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa tài khoản thành công!"));
  			} else {
  				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa tài khoản thất bại!"));
  			}
        redirect(base_url('canbo/admin/accounts'), 'refresh');
      } else {
        redirect(base_url('canbo/admin/accounts'), 'refresh');
      }
    }
}
