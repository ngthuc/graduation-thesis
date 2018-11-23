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

		public function analytics() {
			//code
			$_data['subview'] = 'admin_page/components/dashboard';
			$this->load->view('admin_page/main_layout',$_data);
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
