<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
      $this->load->helper($this->_theme);
    }

    public function index() {
      //code
      $_data['subview'] = 'mp_admin/components/dashboard';
      $this->load->view('mp_admin/main_layout',$_data);
    }
}
