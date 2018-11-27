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
        'infomations' => $this->Minfo->getSortInfo(get_id_logged(),'INFOID','DESC')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function update_person() {
      //code
      $_data['subview'] = 'admin_page/infomation/update_person';
      $_data['data_subview'] = array(
        'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info')
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

    public function add_info() {
      //code
      $_data['subview'] = 'admin_page/infomation/add_info';
      $_data['data_subview'] = array(
        'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    // public function add_time() {
    //   //code
    //   $_data['subview'] = 'admin_page/infomation/add_time';
    //   $_data['data_subview'] = array(
    //     'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info')
    //   );
    //   $this->load->view('admin_page/main_layout',$_data);
    // }
    //
    // public function add_timeline() {
    //   //code
    //   $_data['subview'] = 'admin_page/infomation/add_timeline';
    //   $_data['data_subview'] = array(
    //     'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info')
    //   );
    //   $this->load->view('admin_page/main_layout',$_data);
    // }
    //
    // public function add_decentralization() {
    //   //code
    //   $_data['subview'] = 'admin_page/infomation/add_decentralization';
    //   $_data['data_subview'] = array(
    //     'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info')
    //   );
    //   $this->load->view('admin_page/main_layout',$_data);
    // }

    public function add_new_processing() {
      //code
      $type = $this->input->post('type');
      if($type=='research' || $type=='research') {
        $date = get_date_follow_format($this->input->post('time'),'year').' - '.$this->input->post('to_year');
      } else if($type=='journal' || $type=='edited' || $type=='conference' || $type=='report' || $type=='thesis' || $type=='workshop' || $type=='reviewer' || $type=='seminars' || $type=='doctor'){
        $date = get_date_follow_format($this->input->post('time'),'year');
      } else {
        $date = $this->input->post('time');
      }
      $data['USERID'] = get_id_logged();
      $data['CATEID'] = intval($this->input->post('category'));
      $data['INFOIMAGE'] = ($this->input->post('image')) ? $this->input->post('image') : null;
      $data['INFODATE'] = $date;
      $data['INFOTITLE'] = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
      $data['INFODESCRIPTION'] = ($this->input->post('description')) ? $this->input->post('description') : null;
      $data['INFOCONTENT'] = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
      $data['INFOPOLICY'] = $this->input->post('policy');
      $data['INFOTYPE'] = $type;

      $status = $this->Minfo->insertInfo($data);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Thêm thông tin thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Thêm thông tin thất bại!"));
			}
    }

    public function edit_info($id = null) {
      //code
      $_data['subview'] = 'admin_page/infomation/edit_info';
      $_data['data_subview'] = array(
        'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info'),
        'info' => $this->Minfo->getById($id)
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_info_processing() {
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

      $data['USERID'] = get_id_logged();
      $data['CATEID'] = intval($this->input->post('category'));
      $data['INFOIMAGE'] = ($this->input->post('image')) ? $this->input->post('image') : null;
      $data['INFODATE'] = ($this->input->post('to_year')) ? ($this->input->post('time').' - '.$this->input->post('to_year')) : $this->input->post('time');
      $data['INFOTITLE'] = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
      $data['INFODESCRIPTION'] = ($this->input->post('description')) ? $this->input->post('description') : null;
      $data['INFOCONTENT'] = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
      $data['INFOPOLICY'] = $this->input->post('policy');
      $data['INFOTYPE'] = $this->input->post('type');

      $status = $this->Mcategory->updateCate($data,$ID);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thể loại thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thể loại thất bại!"));
			}
    }

    public function delete_info() {
      //code
      if(isset($_POST)) {
        $status = $this->Minfo->deleteInfo(intval($this->input->post('id')));
  			// Thông báo
  			if($status) {
  				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Xóa thông tin thành công!"));
  			} else {
  				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Xóa thông tin thất bại!"));
  			}
        redirect(base_url('canbo/admin/infomation'), 'refresh');
      } else {
        redirect(base_url('canbo/admin/infomation'), 'refresh');
      }
    }
}
