<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Themes extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      $directory = 'application/views/site_page/themes';
      $template = 'public/themes/';
      $list = scandir($directory);
      $themes_info = array();
      // print_r($entries);
      foreach ($list as $key => $dir) {
        // code...
        if(!(($dir == '.') || ($dir == '..') || ($dir == 'theme_notes.txt'))) {
          $themes_info[] = array(
            'themes_dir' => $dir,
            'themes_screenshot' => $template.$dir.'/screenshot.png'
          );
        }
      }

      if(get_system('theme','theme') == null) {
        $data_theme['SYSTEMTITLE'] = 'theme';
        $data_theme['SYSTEMPOLICY'] = 'protected';
        $data_theme['SYSTEMTYPE'] = 'theme';
        $this->Msystem->insertSystem($data_theme);
      }

      $i=0;
      foreach ($themes_info as $key => $themes) {
        // code...
        $data[$i]['SYSTEMTITLE'] = $themes['themes_dir'];
        $data[$i]['SYSTEMDATA'] = $themes['themes_screenshot'];
        $data[$i]['SYSTEMPOLICY'] = 'protected';
        $data[$i]['SYSTEMTYPE'] = 'themes';
        $i++;
      }
      $this->Msystem->updateMultiTheme($data);

      $data['subview'] = 'admin_page/themes/themes_list';
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
}
