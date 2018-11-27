<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/category/list_category';
      $_data['data_subview'] = array(
        'categories' => $this->Mcategory->returnCategories(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_article() {
      //code
      $_data['subview'] = 'admin_page/category/add_new_article';
      $_data['data_subview'] = array(
        'categories' => $this->Mcategory->returnCategories(get_id_logged(),'article')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_info() {
      //code
      $_data['subview'] = 'admin_page/category/add_new_info';
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $_parent = intval($this->input->post('parent_cate'));
      $data['USERID'] = get_id_logged();
      $data['CAT_CATEID'] = $_parent;
      $data['CATENAME'] = $this->input->post('name_cate');
      $data['CATELEVEL'] = ($_parent == 0) ? 1 : $this->Mcategory->findNodeLevel($_parent)+1;
      $data['CATEHREF'] = ($this->input->post('href')) ? $this->input->post('href') : null;
      $data['CATEPOSITION'] = 1;
      $data['CATEPOLICY'] = $this->input->post('policy');
      $data['CATETYPE'] = $this->input->post('type');

      $status = $this->Mcategory->insertCate($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm thể loại thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm thể loại thất bại!"));
			}
    }

    public function edit_category_article($id = null) {
      //code
      $_data['subview'] = 'admin_page/category/edit_category_article';
      $_data['data_subview'] = array(
        'category' => $this->Mcategory->getById($id),
        'categories' => $this->Mcategory->returnCategories(get_id_logged(),'article')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_category_info($id = null) {
      //code
      $_data['subview'] = 'admin_page/category/edit_category_info';
      $_data['data_subview'] = array(
        'category' => $this->Mcategory->getById($id),
        'categories' => $this->Mcategory->returnCategories(get_id_logged(),'info')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_category_processing() {
      //code
      $ID = intval($this->input->post('id'));
      $data['CATEID'] = intval($this->input->post('id'));
      $data['USERID'] = $this->input->post('user_id');
      $data['CAT_CATEID'] = ($this->input->post('level_cate') == 1) ? 0 : intval($this->input->post('parent_cate'));
      $data['CATENAME'] = $this->input->post('name_cate');
      $data['CATELEVEL'] = $this->input->post('level_cate');
      $data['CATEHREF'] = $this->input->post('href');
      $data['CATEPOLICY'] = $this->input->post('policy');
      $data['CATETYPE'] = $this->input->post('type');

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
      $id = intval($this->input->post('cate_id'));
      $status = $this->Mcategory->deleteCate($id);
      // Thông báo
      if($status) {
        echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa thể loại thành công!"));
        // redirect(base_url('canbo/admin/category'), 'refresh');
      }
      echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa thể loại thất bại! Vui lòng xóa thông tin hoặc bài viết có liên quan trước khi xóa thể loại."));
      // redirect(base_url('canbo/admin/category'), 'refresh');
    }

    public function test() {
      //code
      var_dump($this->Mcategory->returnCategories());
    }
}
