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

    public function add_person() {
      //code
      $_data['subview'] = 'admin_page/infomation/add_person';
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_info() {
      //code
      $_data['subview'] = 'admin_page/infomation/add_info';
      $_data['data_subview'] = array(
        'cate' => $this->Mcategory->returnCategories(get_id_logged(),'info')
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function add_new_processing() {
      //code
      $publication_or_person = 0;
      $type = $this->input->post('type');
      if($type=='research' || $type=='experience') {
        $cate = intval($this->input->post('category'));
        $name_info = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
        $date = get_date_follow_format($this->input->post('time'),'year').' - '.$this->input->post('to_year');
        $content = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
      } else if($type=='isi' || $type=='journal' || $type=='edited' || $type=='conference' || $type=='report' || $type=='thesis'){
        $cate = intval($this->input->post('category'));
        $name_info = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
        $date = get_date_follow_format($this->input->post('time'),'year');
        $content = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
        $publication_or_person = 1;
      } else if($type=='workshop' || $type=='reviewer' || $type=='seminars' || $type=='doctor') {
        $cate = intval($this->input->post('category'));
        $name_info = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
        $date = get_date_follow_format($this->input->post('time'),'year');
        $content = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
      } else if($type=='dob') {
        $cate = null;
        $name_info = $type;
        $date = $this->input->post('dob');
        $content = null;
        $publication_or_person = 2;
      } else if($type=='gender') {
        $cate = null;
        $name_info = $type;
        $date = null;
        $content = $this->input->post('gender');
        $publication_or_person = 2;
      } else if($type=='email') {
        $cate = null;
        $name_info = $type;
        $date = null;
        $content = $this->input->post('email');
        $publication_or_person = 2;
      } else if($type=='phone' || $type=='website' || $type=='address' || $type=='infomations') {
        $cate = null;
        $name_info = $type;
        $date = null;
        $content = ($this->input->post('content')) ? $this->input->post('content') : null;
        $publication_or_person = 2;
      } else {
        $cate = ($this->input->post('category')) ? $this->input->post('category') : null;
        $name_info = ($this->input->post('name_info')) ? $this->input->post('name_info') : null;
        $date = ($this->input->post('time')) ? $this->input->post('time') : null;
        $content = ($this->input->post('content')) ? $this->input->post('content') : null;
      }
      $data['USERID'] = get_id_logged();
      $data['DEPTID'] = get_org_by_id(get_id_logged(),'dept');
      $data['FACID'] = get_org_by_id(get_id_logged(),'faculty');
      $data['SCHID'] = get_org_by_id(get_id_logged(),'school');
      $data['CATEID'] = $cate;
      $data['INFODATE'] = $date;
      $data['INFOTITLE'] = $name_info;
      $data['INFOCONTENT'] = $content;
      $data['INFOPOLICY'] = $this->input->post('policy');
      $data['INFOTYPE'] = $type;
      $data['INFOPUBLICATIONORPERSON'] = $publication_or_person;

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

    public function edit_person($id = null) {
      //code
      $_data['subview'] = 'admin_page/infomation/edit_person';
      $_data['data_subview'] = array(
        'info' => $this->Minfo->getById($id)
      );
      $this->load->view('admin_page/main_layout',$_data);
    }

    public function edit_info_processing() {
      //code
      $id = $this->input->post('id');
      $publication = 0;
      $type = $this->input->post('type');
      if($type=='research' || $type=='experience') {
        $date = get_date_follow_format($this->input->post('time'),'year').' - '.$this->input->post('to_year');
      } else if($type=='isi' || $type=='journal' || $type=='edited' || $type=='conference' || $type=='report' || $type=='thesis'){
        $date = get_date_follow_format($this->input->post('time'),'year');
        $publication = 1;
      } else if($type=='workshop' || $type=='reviewer' || $type=='seminars' || $type=='doctor') {
        $date = get_date_follow_format($this->input->post('time'),'year');
      } else {
        $date = $this->input->post('time');
      }
      $data['CATEID'] = intval($this->input->post('category'));
      // $data['INFOIMAGE'] = ($this->input->post('image')) ? $this->input->post('image') : null;
      $data['INFODATE'] = $date;
      $data['INFOTITLE'] = $this->input->post('name_info');
      $data['INFOCONTENT'] = ($this->input->post('content')) ? replace_url_paragraph($this->input->post('content')) : null;
      $data['INFOPOLICY'] = $this->input->post('policy');
      $data['INFOTYPE'] = $type;
      $data['INFOPUBLICATION'] = $publication;

      $status = $this->Minfo->updateInfoById($data,$id);
			// Thông báo
			if(!$status) {
				echo json_encode(array("STATUS"=>"success","MESSAGE"=>"Cập nhật thông tin thành công!"));
			} else {
				echo json_encode(array("STATUS"=>"error","MESSAGE"=>"Cập nhật thông tin thất bại!"));
			}
    }

    public function delete_info() {
      //code
      if(isset($_POST)) {
        $status = $this->Minfo->deleteInfo(intval($this->input->post('info_id')));
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
