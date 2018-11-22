<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infomation extends CI_Controller {
    public function __construct(){
      parent::__construct();
    }

    public function index() {
      //code
      $_data['subview'] = 'admin_page/infomation/list_info';
      $_data['data_subview'] = array(
        'infomations' => $this->Minfo->getInfo()
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function update_person() {
      //code
      $_data['subview'] = 'admin_page/infomation/update_person';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategoriesInfo(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function update_person_processing() {
      //code
      $_user = $this->session->userdata('user');
      $titles = $this->input->post('title[]');
      $keys = $this->input->post('key[]');
      $contents = $this->input->post('content[]');
      for($i = 0; $i < count($contents); $i++) {
        $key = ($keys[$i] == $titles[$i]) ? 'INFOCONTENT' : $keys[$i];
        $content = $contents[$i];
        $data[$i]['USERID'] = $_user['USERID'];
        $data[$i]['INFOTITLE'] = $titles[$i];
        $data[$i][$key] = $content;
        $data[$i]['INFOPOLICY'] = 'public';
        $data[$i]['INFOTYPE'] = 'person';
      }

      $status = $this->Minfo->updateMultiInfo($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thông tin thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thông tin thất bại!"));
			}
    }

    public function add_time() {
      //code
      $_data['subview'] = 'admin_page/infomation/add_time';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategoriesInfo(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_timeline() {
      //code
      $_data['subview'] = 'admin_page/infomation/add_timeline';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategoriesInfo(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_decentralization() {
      //code
      $_data['subview'] = 'admin_page/infomation/add_decentralization';
      $_data['data_subview'] = array(
        'parent_cate' => $this->Mcategory->returnCategoriesInfo(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $data['USERID'] = get_id_logged();
      $data['CATEID'] = intval($this->input->post('category'));
      $data['INFOIMAGE'] = ($this->input->post('image')) ? $this->input->post('image') : null;
      $data['INFODATE'] = ($this->input->post('to_year')) ? ($this->input->post('time').' - '.$this->input->post('to_year')) : $this->input->post('time');
      $data['INFOTITLE'] = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
      $data['INFODESCRIPTION'] = ($this->input->post('description')) ? $this->input->post('description') : null;
      $data['INFOCONTENT'] = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
      $data['INFOPOLICY'] = $this->input->post('policy');
      $data['INFOTYPE'] = $this->input->post('type');

      $status = $this->Minfo->insertInfo($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm thông tin thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm thông tin thất bại!"));
			}
    }

    public function edit_post($id = null) {
      //code
      $_data['subview'] = 'admin_page/post_type/edit_one_post_type';
      $_data['data_subview'] = array(
        'content' => $this->Mposts->getById($id),
        'categories' => $this->Mcategory->returnCategories(get_id_logged())
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_post_processing() {
      //code
      $ID = intval($this->input->post('post_id'));
      $data['INFOID'] = intval($this->input->post('id'));
      $data['USERID'] = $this->input->post('author');
      $data['CATEID'] = intval($this->input->post('category'));
      $data['INFOIMAGE'] = $this->input->post('avatar_post');
      $data['INFOTITLE'] = $this->input->post('title_post');
      $data['INFODESCRIPTION'] = $this->input->post('description');
      $data['INFOCONTENT'] = $this->input->post('post_content');
      $data['INFOCREATIONDATE'] = $this->input->post('timestamp');
      $data['INFOCOUNT'] = $this->input->post('count');
      $data['INFOTYPE'] = $this->input->post('type');

      $status = $this->Mposts->updateINFO($data,$ID);
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
        $status = $this->Mposts->deleteINFO(intval($this->input->post('post_id')));
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
