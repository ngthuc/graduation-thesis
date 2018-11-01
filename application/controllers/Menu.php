<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/category/list_category';
      $_data['data_subview'] = array(
        'categories' => $this->Mcategory->returnCategories()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new() {
      //code
      $_data['subview'] = 'admin_page/category/add_new_category';
      $_data['data_subview'] = array(
        'categories' => $this->Mcategory->returnCategories()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $_user_logged = $this->session->userdata('user');
      $_parent = intval($this->input->post('parent_cate'));
      $data['CATEID'] = intval($this->input->post('id'));
      $data['USERID'] = $_user_logged['USERID'];
      $data['CAT_CATEID'] = $_parent;
      $data['CATENAME'] = $this->input->post('name_cate');
      $data['CATENAME_ENGLISH'] = $this->input->post('eng_name_cate');
      $data['CATELEVEL'] = ($_parent == 0) ? 1 : $this->Mcategory->findNodeLevel($_parent)+1;
      $data['CATESHOWMENU'] = ($this->input->post('show_cate') == 'on') ? 1 : 0;
      $data['CATEPOSITION'] = 1;
      $data['CATETYPE'] = $this->input->post('type_cate');

      $status = $this->Mcategory->insertCate($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm thể loại thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm thể loại thất bại!"));
			}
    }

    public function edit_category($id = null) {
      //code
      $_data['subview'] = 'admin_page/category/edit_one_category';
      $_data['data_subview'] = array(
        'category' => $this->Mcategory->getById($id),
        'categories' => $this->Mcategory->returnCategories()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_category_processing() {
      //code
      $ID = intval($this->input->post('cate_id'));
      $data['CATEID'] = intval($this->input->post('id'));
      $data['USERID'] = $this->input->post('user_id');
      $data['CAT_CATEID'] = ($this->input->post('level_cate') == 1) ? 0 : intval($this->input->post('parent_cate'));
      $data['CATENAME'] = $this->input->post('name_cate');
      $data['CATENAME_ENGLISH'] = $this->input->post('eng_name_cate');
      $data['CATELEVEL'] = $this->input->post('level_cate');
      $data['CATESHOWMENU'] = ($this->input->post('show_cate') == 'on') ? 1 : 0;
      $data['CATETYPE'] = $this->input->post('type_cate');

      $status = $this->Mcategory->updateCate($data,$ID);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thể loại thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thể loại thất bại!"));
			}
    }

    public function delete_category() {
      //code
      if(isset($_POST)) {
        $status = $this->Mcategory->deleteCate(intval($this->input->post('cate_id')));
  			// Thông báo
  			if($status) {
  				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa thể loại thành công!"));
  			} else {
  				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa thể loại thất bại!"));
  			}
        redirect(base_url(), 'refresh');
      } else {
        redirect(base_url(), 'refresh');
      }
    }

    public function test() {
      //code
      var_dump($this->Mcategory->returnCategories());
    }
}
