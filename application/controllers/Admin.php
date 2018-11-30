<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index() {
			//code
			$_data['subview'] = 'admin_page/components/dashboard';
			$this->load->view('admin_page/main_layout',$_data);
		}

		public function profile() {
      $data['subview'] = 'admin_page/profile/default';
      $data['data_subview'] = array(
        'user' => $this->Musers->getById(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$data);
    }

		public function edit_profile() {
      //code
      $uid = $this->input->post('uid');
      $data['USERFULLNAME'] = $this->input->post('fullname');
      $data['USEREMAIL'] = $this->input->post('email');
			$data['SCHID'] = $this->input->post('school');
			$data['FACID'] = $this->input->post('faculty');
      $data['DEPTID'] = $this->input->post('department');

      $status = $this->Musers->updateUser($data,$uid);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật tài khoản thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật tài khoản thất bại!"));
			}
    }

		public function newpwd() {
      $data['subview'] = 'admin_page/profile/newpwd';
      $data['data_subview'] = array(
        'user' => $this->Musers->getById(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$data);
    }

		public function newpwd_processing() {
      //code
      $uid = get_id_logged();
			$newpwd = $this->input->post('newpwd');
			$repeat = $this->input->post('repeat');
			if($repeat == $newpwd) {
				$data['USERPASSWORD'] = md5($newpwd);
			} else {
				$data['USERPASSWORD'] = null;
			}

      $status = $this->Musers->updateUser($data,$uid);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật mật khẩu thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật mật khẩu thất bại!"));
			}
    }

		public function statistic() {
      $data['subview'] = 'admin_page/statistic/basic';
      $data['data_subview'] = array(
        'themes_info' => $this->Msystem->getSystemByType('themes')
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_themes() {
      //code
      $key = 'theme';
      $data['SYSTEMDATA'] = $this->input->post('theme');

      $status = $this->Msystem->updateSystemByKey($data,$key);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

		public function export() {
			//code
			$_data['subview'] = 'admin_page/components/dashboard';
			$this->load->view('admin_page/main_layout',$_data);
		}

		public function export_processing() {
			//code
			$_data['subview'] = 'admin_page/components/dashboard';
			$this->load->view('admin_page/main_layout',$_data);
		}
}
