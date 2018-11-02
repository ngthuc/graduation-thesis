<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multimedia extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/multimedia/filemanager_view';
      $_data['header'] = array(
        'title' => 'File Manager',
        'keywords' => 'Responsive File Manager, Code Igniter',
        'description' => 'Plugin quản lý các thao tác với tệp/thư mục',
        'url' => base_url('canbo/admin/filemanager'),
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function pictures() {
      $data['subview'] = 'admin_page/multimedia/pictures';
      $data['data_subview'] = array(
        'lastupdate' => $this->Media->getLatestUpdate('pictures')
      );
      $this->load->view('admin_page/main_layout',$data);
    }

    public function add_picture() {
      //code
      $data['USERID'] = $this->input->post('user');
      $data['MEDIALINK'] = replace_url_media($this->input->post('picture'));
      $data['MEDIAPOLICY'] = $this->input->post('policy');
      $data['MEDIATYPE'] = 'pictures';

      $status = $this->Media->insertMediaOption($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm hình ảnh thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm hình ảnh thất bại!"));
			}
    }

    public function delete_picture() {
      //code
      $list_pictures = $this->input->post('field');
      foreach ($list_pictures as $key => $id) {
        $this->Media->deleteMediaOption($id);
      }

			echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa hình ảnh thành công!"));
    }
}
