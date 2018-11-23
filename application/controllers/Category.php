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

    public function add_new() {
      //code
      $_data['subview'] = 'admin_page/category/add_new_category';
      $_data['data_subview'] = array(
        'categories' => $this->Mcategory->returnCategories(get_id_logged())
      );
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
