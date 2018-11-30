<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/post_type/list_posts';
      $_data['data_subview'] = array(
        'articles' => $this->Marticle->getLatestList(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_article() {
      //code
      $_data['subview'] = 'admin_page/post_type/add_new_post';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategories(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_page() {
      //code
      $_data['subview'] = 'admin_page/post_type/add_new_page';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategories(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $data['USERID'] = get_id_logged();
      $data['CATEID'] = intval($this->input->post('category'));
      $data['ARTICLEIMAGE'] = ($this->input->post('avatar_post') != '') ? $this->input->post('avatar_post') : base_url('spsim_media/default-image.jpg');
      $data['ARTICLETITLE'] = $this->input->post('title_post');
      $data['ARTICLEDESCRIPTION'] = $this->input->post('description');
      $data['ARTICLECONTENT'] = $this->input->post('post_content');
      $data['ARTICLECREATIONDATE'] = $this->input->post('timestamp');
      $data['ARTICLECOUNT'] = 0;
      $data['ARTICLEPOLICY'] = $this->input->post('policy');
      $data['ARTICLETYPE'] = $this->input->post('type');

      $status = $this->Marticle->insertArticle($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm bài viết thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm bài viết thất bại!"));
			}
    }

    public function edit_article($id = null) {
      //code
      $_data['subview'] = 'admin_page/post_type/edit_one_post_type';
      $_data['data_subview'] = array(
        'content' => $this->Marticle->getById($id),
        'categories' => $this->Mcategory->returnCategories(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_article_processing() {
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
      $data['ARTICLEPOLICY'] = $this->input->post('policy');
      $data['ARTICLETYPE'] = $this->input->post('type');

      $status = $this->Marticle->updateArticle($data,$ID);
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
        $status = $this->Marticle->deleteArticle(intval($this->input->post('post_id')));
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
