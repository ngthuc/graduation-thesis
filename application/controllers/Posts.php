<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->_theme = get_media('theme','theme');      
    }

    public function index() {
      //code
      $_data['subview'] = 'mp_admin/post_type/list_posts';
      $_data['data_subview'] = array(
        'articles' => $this->Mposts->getLatestList()
      );
      $this->load->view('mp_admin/main_layout',$_data);
    }

    public function add_new_article() {
      //code
      $_data['subview'] = 'mp_admin/post_type/add_new_post';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategories()
        // 'parent_cate' => $this->Mcategory->getRecursive()
      );
      $this->load->view('mp_admin/main_layout',$_data);
    }

    public function add_new_page() {
      //code
      $_data['subview'] = 'mp_admin/post_type/add_new_page';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategories()
        // 'parent_cate' => $this->Mcategory->getRecursive()
      );
      $this->load->view('mp_admin/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $_user_logged = $this->session->userdata('user');
      $data['ARTICLEID'] = intval($this->input->post('id'));
      $data['USERID'] = $_user_logged['USERID'];
      $data['CATEID'] = intval($this->input->post('category'));
      $data['ARTICLEIMAGE'] = ($this->input->post('avatar_post') != '') ? $this->input->post('avatar_post') : base_url('public/filemanager/upload/default-image.jpg');
      $data['ARTICLETITLE'] = $this->input->post('title_post');
      $data['ARTICLEDESCRIPTION'] = $this->input->post('description');
      $data['ARTICLECONTENT'] = $this->input->post('post_content');
      $data['ARTICLECREATIONDATE'] = $this->input->post('timestamp');
      $data['ARTICLECOUNT'] = 0;
      $data['ARTICLETYPE'] = $this->input->post('type');

      $status = $this->Mposts->insertArticle($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm bài viết thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm bài viết thất bại!"));
			}
    }

    public function edit_post($id = null) {
      //code
      $_data['subview'] = 'mp_admin/post_type/edit_one_post_type';
      $_data['data_subview'] = array(
        'content' => $this->Mposts->getById($id),
        'categories' => $this->Mcategory->returnCategories()
      );
      $this->load->view('mp_admin/main_layout',$_data);
    }

    public function edit_post_processing() {
      //code
      $ID = intval($this->input->post('post_id'));
      $data['ARTICLEID'] = intval($this->input->post('id'));
      $data['USERID'] = $this->input->post('author');
      $data['CATEID'] = intval($this->input->post('category'));
      $data['ARTICLEIMAGE'] = $this->input->post('avatar_post');
      $data['ARTICLETITLE'] = $this->input->post('title_post');
      $data['ARTICLEDESCRIPTION'] = $this->input->post('description');
      $data['ARTICLECONTENT'] = $this->input->post('post_content');
      $data['ARTICLECREATIONDATE'] = $this->input->post('timestamp');
      $data['ARTICLECOUNT'] = $this->input->post('count');
      $data['ARTICLETYPE'] = $this->input->post('type');

      $status = $this->Mposts->updateArticle($data,$ID);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật bài viết thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật bài viết thất bại!"));
			}
    }

    public function delete_post() {
      //code
      if(isset($_POST)) {
        $status = $this->Mposts->deleteArticle(intval($this->input->post('post_id')));
  			// Thông báo
  			if($status) {
  				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa bài viết thành công!"));
  			} else {
  				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa bài viết thất bại!"));
  			}
        redirect(base_url(), 'refresh');
      } else {
        redirect(base_url(), 'refresh');
      }
    }
}
