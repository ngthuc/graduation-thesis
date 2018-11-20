<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      $data['subview'] = 'admin_page/settings/options';
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_default_processing() {
      //code
      $keys = $this->input->post('key[]');
      $values = $this->input->post('value[]');
      for($i = 0; $i < count($keys); $i++) {
        $data[$i]['SYSTEMTITLE'] = $keys[$i];
        $data[$i]['SYSTEMDATA'] = $values[$i];
        $data[$i]['SYSTEMPOLICY'] = 'public';
        $data[$i]['SYSTEMTYPE'] = 'default';
      }

      $status = $this->Msystem->updateMultiSystem($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function domains() {
      $data['subview'] = 'admin_page/settings/domains';
      $this->load->view('admin_page/main_layout',$data);
    }

    public function add_domain() {
      //code
      $data['SYSTEMLINK'] = $this->input->post('domain');
      $data['SYSTEMPOLICY'] = 'protected';
      $data['SYSTEMTYPE'] = 'domain';

      $status = $this->Msystem->insertSystem($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function delete_domain() {
      //code
      $id = $this->input->post('delete');

      $status = $this->Msystem->deleteSystem($id);
			// Thông báo
			if($status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }
}
