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
