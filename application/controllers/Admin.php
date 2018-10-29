<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		public function __construct(){
			parent::__construct();
			// $this->_theme = get_media('theme','theme');
			// $this->load->helper($this->_theme);
		}

		public function index() {
			//code
			$_data['subview'] = 'admin_page/components/dashboard';
			$this->load->view('admin_page/main_layout',$_data);
		}
}
