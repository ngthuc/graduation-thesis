<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filemanager extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/filemanager_view';
      $_data['header'] = array(
        'title' => 'File Manager',
        'keywords' => 'Responsive File Manager, Code Igniter',
        'description' => 'Plugin quản lý các thao tác với tệp/thư mục',
        'url' => base_url('canbo/admin/filemanager'),
      );
      $this->load->view('admin_page/main_layout',$_data);
    }
}
