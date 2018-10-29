<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filemanager extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
      $this->load->helper($this->_theme);
    }

    public function index() {
      //code
      $_data['subview'] = 'mp_admin/filemanager_view';
      $_data['header'] = array(
        'title' => 'File Manager',
        'keywords' => 'Responsive File Manager, Code Igniter',
        'description' => 'Plugin quản lý các thao tác với tệp/thư mục',
        'url' => base_url('admin/filemanager'),
      );
      $this->load->view('mp_admin/main_layout',$_data);
    }
}
