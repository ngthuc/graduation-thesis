<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
    }

    public function index() {
      $data['subview'] = 'admin_page/settings/options';
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_options() {
      //code
      $data['site_name'] = $this->input->post('site_name');
      $data['short_name'] = $this->input->post('short_name');
      $data['keywords'] = $this->input->post('keywords');
      $data['description'] = $this->input->post('description');
      $data['url'] = $this->input->post('url');
      $data['version'] = $this->input->post('version');
      $data['favicon'] = $this->input->post('favicon');
      $data['theme'] = $this->input->post('theme');
      $data['limit_per_page'] = $this->input->post('limit_per_page');
      $data['phone'] = $this->input->post('phone');
      $data['email'] = $this->input->post('email');
      $data['address'] = $this->input->post('address');

      $status = $this->Media->updateMediaOptions($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }
}
