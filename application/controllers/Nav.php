<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/menu/list_menu';
      $_data['data_subview'] = array(
        'menu' => $this->Menu->getSortByParent(get_id_logged(),0,null,'MENUPOSITION','ASC')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function update_menu() {
      //code
      $id = $this->input->post('id');
      $data['MENUPOSITION'] = intval($this->input->post('position'));

      $status = $this->Menu->updateMenu($data,$id);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function add_menu() {
      //code
      $_data['subview'] = 'admin_page/menu/add_menu';
      $_data['data_subview'] = array(
        'categories' => $this->Menu->returnCategories()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_menu_processing() {
      //code
      // $_user_logged = $this->session->userdata('user');
      $_parent = intval($this->input->post('parent'));
      $data['USERID'] = get_id_logged();
      $data['MENUPARENT'] = $_parent;
      $data['MENUNAME'] = $this->input->post('name');
      $data['MENULINK'] = $this->input->post('link');
      $data['MENULEVEL'] = ($_parent == 0) ? 1 : $this->Menu->findNodeLevel($_parent)+1;
      $data['MENUPOSITION'] = 1;
      $data['MENUTYPE'] = $this->input->post('type');

      $status = $this->Menu->insertMenu($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm mới thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm mới thất bại!"));
			}
    }

    public function edit_menu($id = null) {
      //code
      $menu = $this->Menu->getById($id);
      if(isset($menu)) {
        $_data['subview'] = 'admin_page/menu/edit_menu';
        $_data['data_subview'] = array(
          'menu' => $menu,
          'menus' => $this->Menu->returnCategories()
        );
        $this->load->view('admin_page/main_layout',$_data);
      } else redirect(base_url('canbo/admin/themes/menu'));
    }

    public function edit_menu_processing() {
      //code
      $_parent = intval($this->input->post('parent'));
      $id = $this->input->post('id');
      $data['USERID'] = get_id_logged();
      $data['MENUPARENT'] = $_parent;
      $data['MENUNAME'] = $this->input->post('name');
      $data['MENULINK'] = $this->input->post('link');
      $data['MENULEVEL'] = ($_parent == 0) ? 1 : $this->Menu->findNodeLevel($_parent)+1;
      $data['MENUTYPE'] = $this->input->post('type');

      $status = $this->Menu->updateMenu($data,$id);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thất bại!"));
			}
    }

    public function delete_menu() {
      //code
      if(isset($_POST)) {
        $status = $this->Menu->deleteMenu(intval($this->input->post('menu_id')));
  			// Thông báo
  			if($status) {
  				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa điều hướng thành công!"));
  			} else {
  				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa điều hướng thất bại!"));
  			}
        redirect(base_url(), 'refresh');
      } else {
        redirect(base_url(), 'refresh');
      }
    }

    public function test() {
      //code
      // var_dump($this->Menu->returnCategories());
    }
}
