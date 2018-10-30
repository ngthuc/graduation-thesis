<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
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
      $_data['data_subview'] = array(
        'categories' => $this->Mcategory->returnCategories()
        // 'parent_cate' => $this->Mcategory->getRecursive()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $data['USERID'] = $this->input->post('user_id');
      $data['USERPASSWORD'] = md5($this->input->post('password'));
      $data['USERFULLNAME'] = $this->input->post('fullname');
      $data['USERROLE'] = $this->input->post('permissions');

      $status = $this->Musers->insertUser($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm thể loại thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm thể loại thất bại!"));
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
      $data['USERID'] = $uid;
      $data['USERFULLNAME'] = $this->input->post('fullname');
      $data['USEREMAIL'] = $this->input->post('email');
      $data['USERPASSWORD'] = $pwd['USERPASSWORD'];
      $data['USERROLE'] = $this->input->post('permissions');
      $data['USERSTATUS'] = $this->input->post('status');

      $status = $this->Musers->updateUser($data,$uid);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật tài khoản thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật tài khoản thất bại!"));
			}
    }

    public function delete_category($id) {
      //code
      if(isset($_POST)) {
        $status = $this->Mcategory->deleteCate($id);
  			// Thông báo
  			if(!$status) {
  				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa thể loại thành công!"));
  			} else {
  				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa thể loại thất bại!"));
  			}
        redirect(base_url(), 'refresh');
      } else {
        redirect(base_url(), 'refresh');
      }
    }
}
