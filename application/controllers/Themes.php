<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Themes extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_system('theme','theme');
    }

    public function index() {
      $directory = 'application/views/site_page/themes';
      $list = scandir($directory);
      $themes_info = array();
      // print_r($entries);
      foreach ($list as $key => $dir) {
        // code...
        if(!(($dir == '.') || ($dir == '..') || ($dir == 'theme_notes.txt'))) {
          $themes_info[] = array(
            'themes_dir' => $dir,
            'themes_screenshot' => $dir.'/screenshot.png'
          );
        }
      }

      $data['subview'] = 'admin_page/themes/themes_list';
      $data['data_subview'] = array(
        'themes_info' => $themes_info
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function update_theme() {
      //code
      $data['theme'] = $this->input->post('theme');
      // var_dump($data);

      $status = $this->Media->updateMediaOptions($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }
}
